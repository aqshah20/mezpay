<?php

namespace MezPay\Handlers;

class ErrorResponseHandler
{
    const STATUS_BAD_REQUEST = 400;
    const STATUS_NOT_FOUND = 404;
    const STATUS_INTERNAL_SERVER_ERROR = 500;

    public static function errorResponse($errorCode, $message = null)
    {
        $errorMessages = [
            0 => 'No system error.',
            1 => 'Order with given order number has already been processed or the childId is incorrect. Order with this number was registered, but was not paid. Submerchant is blocked or deleted.',
            3 => 'Unknown currency.',
            4 => 'Order number is not specified. Merchant user name is not specified. Amount is not specified. Return URL cannot be empty. Password cannot be empty.',
            5 => 'Incorrect value of a request parameter. Incorrect value in the Language parameter.',
            6 => 'Access is denied. Merchant must change the password. Invalid jsonParams[].',
            7 => 'System error.',
            14 => 'PaymentWay is invalid.',
            
        ];

        $errorMessage = $errorMessages[$errorCode] ?? 'Unknown error.';

        return response()->json(['error' => $message ?? $errorMessage], self::STATUS_BAD_REQUEST);
    }
}
