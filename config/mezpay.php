<?php

return [
    'username' => env('MEZPAY_USERNAME', ''),
    'password' => env('MEZPAY_PASSWORD', ''),
    'success_callback' => env('MEZPAY_SUCCESS_CALLBACK', 'success'),
    'failed_callback' => env('MEZPAY_FAILED_CALLBACK', 'failed'),
];

