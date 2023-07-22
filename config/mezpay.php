<?php


return [
    'username' => env('MEZPAY_USERNAME', ''),
    'password' => env('MEZPAY_PASSWORD', ''),
    'callbackURL' => env('MEZPAY_SUCCESS_CALLBACK', 'success'),
];

