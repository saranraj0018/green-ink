<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Payment;
use Dflydev\DotAccessData\Data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
                "customer_name" => "SARAN",
                "customer_email" => "saran@gmail.com",
                "customer_phone" => "9629035372",
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

        if (!isset($responseData['payment_session_id'])) {
            dd($responseData); // debug if order fails
        }

        return response()->json($responseData);
    }


    public function success(Request $request)
    {
        $orderId = $request->input('order_id');

        if (!$orderId) {
            return redirect('/')->with('error', 'Payment verification failed: Missing order ID');
        }

        // Verify payment status with Cashfree API
        $url = (env('CASHFREE_ENV') === 'sandbox'
                ? "https://sandbox.cashfree.com/pg/orders/"
                : "https://api.cashfree.com/pg/orders/$orderId/payments");

        $headers = [
            "Content-Type: application/json",
            "x-api-version: 2022-01-01",
            "x-client-id: ".env('CASHFREE_APP_ID'),
            "x-client-secret: ".env('CASHFREE_SECRET_KEY')
        ];

        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return redirect('/')->with('error', 'Payment verification failed: '.$err);
        }

        $responseData = json_decode($response);

        //dd($responseData);

        // Update payment status in database
        $payment = Payment::where('order_id', $orderId)->first();

        if ($payment) {
            Log::info('API Request:', ['test' => $responseData]);
            $status = ($responseData->order_status === 'PAID') ? 1 : 0;

            $payment->update([
                'status' => $status,
                'other' => $responseData,
                'payment_id' => $responseData->cf_order_id ?? null,
                'payment_method' => $responseData->payment_method ?? null
            ]);

            if ($status === 1) {
                return redirect('/')->with([
                    'success' => 'Payment Successful!',
                    'payment' => $payment,
                ]);
            }
        }

        return redirect('/')->with('error', 'Payment verification failed for Order ID: ' . $orderId);

    }

}
