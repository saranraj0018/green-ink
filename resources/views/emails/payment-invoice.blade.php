<!DOCTYPE html>
<html>
<body style="font-family: Arial">

<h2>Payment Successful 🎉</h2>

<p>Hello {{ $payment->name }},</p>

<p>Thank you for your payment. Here are your invoice details:</p>

<table cellpadding="8" cellspacing="0" border="1">
    <tr>
        <td><b>Order ID</b></td>
        <td>{{ $payment->order_id }}</td>
    </tr>
    <tr>
        <td><b>Amount</b></td>
        <td>₹{{ number_format($payment->amount, 2) }}</td>
    </tr>
    <tr>
        <td><b>Payment ID</b></td>
        <td>{{ $payment->payment_id }}</td>
    </tr>
    <tr>
        <td><b>Payment Method</b></td>
        <td>{{ $payment->payment_method }}</td>
    </tr>
    <tr>
        <td><b>Status</b></td>
        <td>SUCCESS</td>
    </tr>
</table>

<p>Thanks,<br>
    <b>{{ config('app.name') }}</b></p>

</body>
</html>
