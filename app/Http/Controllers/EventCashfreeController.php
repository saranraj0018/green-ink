<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\EventRegistration;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\PaymentInvoiceMail;

class EventCashfreeController extends Controller
{
    public function payment(Request $request)
    {
        // ✅ Validation for EVENT
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

        // ✅ Get Event
        $event = Event::find($request->event_id);

        if (!$event || $event->fee_type !== 'paid') {
            return response()->json([
                'status' => 400,
                'message' => 'Invalid paid event',
            ], 400);
        }

        $amount = $event->amount;
        $orderId = 'order_' . time();

        // ✅ Cashfree URL
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
            "order_amount" => $amount,
            "order_currency" => "INR",
            "customer_details" => [
                "customer_id" => "order_" . $event->id,
                "customer_name" => $request->name,
                "customer_email" => $request->email,
                "customer_phone" => $request->phone,
            ],
            "order_meta" => [
                "return_url" => route('cashfree.success') . "?order_id={order_id}",
            ],
        ]);

        // 🔥 CURL CALL
        $curl = curl_init($url);
        curl_setopt_array($curl, [
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $data,
        ]);

        $response = curl_exec($curl);
        curl_close($curl);

        $responseData = json_decode($response, true);

        if (!isset($responseData['payment_link'])) {
           Log::error('Cashfree Error', [
    'response' => $responseData
]);
            return response()->json([
                'status' => 500,
                'message' => 'Payment gateway error'
            ], 500);
        }

        // ✅ Save Payment
        Payment::create([
            'order_id' => $orderId,
            'amount'   => $amount,
            'status'   => 0,
            'name'     => $request->name,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'other'    => json_encode([
                'type' => 'event',
                'event_id' => $event->id,
                'event_title' => $event->title,
            ]),
        ]);

        return redirect()->away($responseData['payment_link']);
    }

    // =======================================================

    public function success(Request $request)
    {
        $orderId = $request->query('order_id');

        if (!$orderId) {
            return redirect('/')->with('error', 'Order ID missing');
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
        $latest = collect($payments)->last();

        $payment = Payment::where('order_id', $orderId)->first();

        if (!$payment) {
            return redirect('/failure/payment/page');
        }

         $otherData = json_decode($payment->other, true);
       $eventId = $otherData['event_id'] ?? null;
       
        $status = $latest['payment_status'] ?? 'FAILED';

        $payment->update([
            'status' => $status === 'SUCCESS' ? 1 : 0,
            'payment_id' => $latest['cf_payment_id'] ?? null,
            'payment_method' => $latest['payment_method'] ?? null,
            'other' => json_encode(array_merge($otherData, [
            'cashfree' => $latest
        ])),
        ]);
 if ($status === 'SUCCESS' && $eventId) {

        $alreadyRegistered = EventRegistration::where('event_id', $eventId)
            ->where('email', $payment->email)
            ->exists();

        if (!$alreadyRegistered) {
            EventRegistration::create([
                'event_id' => $eventId,
                'name'     => $payment->name,
                'email'    => $payment->email,
                'phone'    => $payment->phone,
            ]);
        }

        Mail::to($payment->email)->send(new PaymentInvoiceMail($payment));

        return redirect('/success/payment/page')
            ->with('success', 'Event Registered Successfully');
    }

    return redirect('/failure/payment/page')
        ->with('error', 'Payment Failed');
}

}
