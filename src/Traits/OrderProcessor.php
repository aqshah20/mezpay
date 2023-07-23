<?php

// MyTrait.php
namespace MezPay\Traits;

use GuzzleHttp\Client;
use MezPay\Models\MezPay;
use MezPay\Helpers\MezPayUrls;

trait OrderProcessor
{

    public function getOrderPaymentStatus($orderid)
    {
        // API credentials
        $apiURL     = MezPayUrls::getOrderStatusUrl();
        $userName   = config('mezpay.username');
        $password   = config('mezpay.password');
        $orderKey   = MezPay::getOrderKey($orderid);
        
        // Prepare the request data
        $postInput = [
            'userName' => $userName,
            'password' => $password,
            'orderNumber'  => $orderid,
        ];

        try {
            // Make the API request using GuzzleHttp
            $client = new Client();
            $response = $client->post($apiURL, ['form_params' => $postInput]);

            // Get the response status code and body
            $statusCode = $response->getStatusCode();
            $responseBody = json_decode($response->getBody(), true);
            
            $status = "";
            // Check for success response (errorCode = 0)
            if (isset($responseBody['errorCode']) && $responseBody['errorCode'] == 0) {
                return $responseBody;
            } else {
                // Handle error response
                return $responseBody['errorCode'];
            }

        } catch (\Exception $e) {

            // Handle API request exception
            return $e->getMessage();
        }

    }

    public function redirectTo($redirectUrl)
    {
        header('Location: ' . $redirectUrl);exit; 
    }

}
