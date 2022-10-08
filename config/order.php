<?php
return [
    'paypal' => [
        'payment_mode' => env('PAYPAL_MODE', 'sandbox'),
        'client_id' => env('PAYPAL_CLIENT_ID'),
        'secret' => env('PAYPAL_SECRET'),
    ],
    'VNPay' => [
        'vnp_TmnCode' => env('vnp_TmnCode'),
        'vnp_HashSecret' => env('vnp_HashSecret'),
        'vnp_apiUrl' => env('vnp_apiUrl'),
        'vnp_Returnurl' => env('APP_URL') . env('vnp_Returnurl')
    ],
    'momo' => [
        'partnerCode' => env('partnerCode'),
        'accessKey' => env('accessKey'),
        'secretKey' => env('secretKey'),
        'endpoint' => env('endpoint'),
        'ipnUrl' => env('APP_URL') . env('ipnUrl'),
        'redirectUrl' => env('APP_URL') . env('redirectUrl'),
    ],
];
