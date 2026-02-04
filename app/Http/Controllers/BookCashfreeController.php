<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Mail\PaymentInvoiceMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class BookCashfreeController extends Controller
{
    public function payment(Request $request)
    {
        $validator = Validator::make($request->all(), [
           'event_id' => 'required|exists:events,id',
            'name'     => 'required|string',
            'email'    => 'required|email',
            'phone'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 409,
                'message' => $validator->errors()->first(),
            ], 409);
        }


        $bookIds = explode(',', $request->book_ids);

        $books = Book::whereIn('id', $bookIds)->get();

        if ($books->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'Books not found',
            ], 404);
        }
        $totalAmount = 0;
        foreach ($books as $book) {
            $price = $book->sale_price ?? $book->regular_price;
            $totalAmount += $price;
        }

        $orderId = 'order_' . time();

        $url = env('CASHFREE_ENV') === 'sandbox'
            ? "https://sandbox.cashfree.com/pg/orders"
            : "https://api.cashfree.com/pg/orders";

        $headers = [
            "Content-Type: application/json",
            "x-api-version: 2022-01-01",
            "x-client-id: " . env('CASHFREE_APP_ID'),
            "x-client-secret: " . env('CASHFREE_SECRET_KEY'),
        ];

        $data = json_encode([
            "order_id" => $orderId,
            "order_amount" => $totalAmount,
            "order_currency" => "INR",
            "customer_details" => [
                "customer_id" => "1",
                "customer_name" => $request->name,
                "customer_email" => $request->email,
                "customer_phone" => $request->phone,
            ],
            "order_meta" => [
                "return_url" => route('cashfree.success') . "?order_id={order_id}",
            ],
        ]);

        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $data,
        ]);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            return back()->with('error', curl_error($curl));
        }

        curl_close($curl);

        $responseData = json_decode($response, true);

        if (!isset($responseData['payment_link'])) {
            dd($responseData); // debug
        }

        Payment::create([
            'order_id' => $orderId,
            'amount'   => $totalAmount,
            'status'   => 0,
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'other'    => json_encode([
                'book_ids' => $bookIds
            ]),
        ]);

        return redirect()->away($responseData['payment_link']);
    }

    // =====================================================

    public function success(Request $request)
    {
        $orderId = $request->query('order_id');

        if (!$orderId) {
            return redirect('/')->with('error', 'Missing order ID');
        }

        $url = env('CASHFREE_ENV') === 'sandbox'
            ? "https://sandbox.cashfree.com/pg/orders/{$orderId}/payments"
            : "https://api.cashfree.com/pg/orders/{$orderId}/payments";

        $headers = [
            "Content-Type: application/json",
            "x-api-version: 2022-01-01",
            "x-client-id: " . env('CASHFREE_APP_ID'),
            "x-client-secret: " . env('CASHFREE_SECRET_KEY'),
        ];

        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $payments = json_decode($response, true);

        Log::info('Cashfree Payments Response', $payments);

        if (empty($payments) || !is_array($payments)) {
            return redirect('/failure/payment/page')
                ->with('error', 'No payment found');
        }

        $latestPayment = collect($payments)->last();
        $paymentStatus = $latestPayment['payment_status'] ?? 'FAILED';

        $payment = Payment::where('order_id', $orderId)->first();

        if (!$payment) {
            return redirect('/failure/payment/page')
                ->with('error', 'Payment record not found');
        }

        $payment->update([
            'status' => $paymentStatus === 'SUCCESS' ? 1 : 0,
            'payment_id' => $latestPayment['cf_payment_id'] ?? null,
            'payment_method' => $latestPayment['payment_method'] ?? null,
            'other' => json_encode($latestPayment),
        ]);

        if ($paymentStatus === 'SUCCESS') {
            try {
                Mail::to($payment->email)
                    ->send(new PaymentInvoiceMail($payment));
            } catch (\Exception $e) {
                Log::error('Invoice mail failed', ['error' => $e->getMessage()]);
            }

            return redirect('/success/payment/page')
                ->with('success', 'Payment Successful');
        }

        return redirect('/failure/payment/page')
            ->with('error', 'Payment Failed');
    }
}
