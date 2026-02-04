<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Payment;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Mail\PaymentInvoiceMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CashfreeController extends Controller
{
    public function payment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'course_id' => 'required|integer',
        ]);

        // Check if validation failed
        if ($validator->fails()) {
            return response()->json([
                'status' => 409,
                'message' => $validator->errors()->first(),
            ], 409);
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

        $course = Course::find($request['course_id']);

        $data = json_encode([
            "order_id" => $orderId,
            "order_amount" => $course->amount ?? 1,
            "order_currency" => "INR",
            "customer_details" => [
                "customer_id" => "1",
                "customer_name" => $request['name'],
                "customer_email" => $request['email'],
                "customer_phone" => $request['phone'],
            ],
            "order_meta" => [
                "return_url" => route('cashfree.success') . "?order_id={order_id}&order_token={order_token}",
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

        if (!isset($responseData['order_token'])) {
            dd($responseData); // debug if order fails
        }

            Payment::create([
            'order_id' => $orderId,
            'amount' => $course->amount,
            'status' => 0,
            'name' =>  $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
        ]);

        return redirect()->away($responseData['payment_link']);

    }


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

    $payments = json_decode($response, true); // ✅ decode as array

    Log::info('Cashfree Payments Response', $payments);

    if (empty($payments) || !is_array($payments)) {
        return redirect('/failure/payment/page')
            ->with('error', 'No payment found for this order');
    }

    // ✅ Take latest payment
    $latestPayment = collect($payments)->last();

    $paymentStatus = $latestPayment['payment_status'] ?? 'FAILED';

    $payment = Payment::where('order_id', $orderId)->first();

    if (!$payment) {
        return redirect('/failure/payment/page')
            ->with('error', 'Payment record not found');
    }

    // ✅ Update DB
    $payment->update([
        'status' => $paymentStatus === 'SUCCESS' ? 1 : 0,
        'payment_id' => $latestPayment['cf_payment_id'] ?? null,
        'payment_method' => $latestPayment['payment_method'] ?? null,
        'other' => json_encode($latestPayment),
    ]);

    // ✅ SUCCESS
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

    // ❌ FAILED
    return redirect('/failure/payment/page')
        ->with('error', 'Payment Failed');
}


}
