<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #fff;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .header {
            background: url('{{ asset('images/background.png') }}') no-repeat center;
            background-size: cover;
            padding: 40px 0;
            text-align: center;
            font-size: 26px;
            font-weight: bold;
            color: #333;
        }
        .success-section {
            flex: 1;
            background: #fff;
            text-align: center;
            padding: 60px 0;
        }
        .success-icon {
            width: 150px;
        }
        .message {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }
        /* Footer Styling */
        .footer {
            background: #000;
            color: #ddd;
            padding: 40px 20px 10px;
        }
        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: 0 auto;
        }
        .footer-section {
            flex: 1 1 220px;
            margin: 10px;
        }
        .footer-section h3 {
            color: #7ac943;
            font-size: 18px;
            margin-bottom: 10px;
        }
        .footer-section.about h4 {
            color: #7ac943;
        }
        .footer-logo {
            width: 120px;
            margin-bottom: 10px;
        }
        .footer-section p,
        .footer-section ul li a {
            color: #ccc;
            font-size: 14px;
        }
        .footer-section ul {
            list-style: none;
            padding: 0;
        }
        .footer-section ul li {
            margin-bottom: 6px;
        }
        .footer-section ul li a {
            text-decoration: none;
        }
        .footer-section ul li a:hover {
            color: #7ac943;
        }
        .social-icons a {
            display: block;
            color: #ccc;
            margin-bottom: 6px;
            text-decoration: none;
        }
        .social-icons a i {
            margin-right: 6px;
            color: #7ac943;
        }
        .footer-bottom {
            text-align: center;
            border-top: 1px solid #222;
            margin-top: 20px;
            padding-top: 10px;
            font-size: 13px;
            color: #888;
        }
    </style>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="header">Payment</div>

<div class="success-section">
    <img src="{{ asset('images/success.png') }}" class="success-icon" alt="Success">
    <div class="message">Payment Successful</div>
</div>

<x-partials.footer />

</body>
</html>
