<?php

use Illuminate\Support\Facades\Route;
use MezPay\Controllers\PaymentController;

Route::GET('/payment-callback', [PaymentController::class, 'handleCallback'])->name('payment.callback');
