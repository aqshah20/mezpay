<?php

namespace MezPay\Controllers;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

use Illuminate\Http\Request;

class PaymentController
{
    public function handleCallback(Request $request)
    {
        if( $request->has('orderid') ) {

            $order_id =  $request->query('orderid');
            $tempOrderData = Session::get('temp_order_data_'.$order_id);
            
            $apiURL = 'https://acquiring.meezanbank.com/payment/rest/getOrderStatusExtended.do';

            // API credentials
            $userName   = config('mezpay.username');
            $password   = config('mezpay.password');
            $returnURL  = config('mezpay.callbackURL');

            // Prepare the request data
            $postInput = [
                'userName' => $userName,
                'password' => $password,
                'orderId'  => $order_id,
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
                    $orderStatus = $responseBody['orderStatus'];
                    $status = $orderStatus == '3' ? 'Paid' : 'Failed';

                } else {
                    // Handle error response
                    //dd($responseBody['errorCode']);
                    $status =  'Failed';
                }

                // Construct the URL with parameters
                $url = URL::to($apiURL);
                $query = http_build_query([
                    'orderid' => $orderid,
                    'status' => $status,
                ]);
                $redirectUrl = $url . '?' . $query;

                // Perform the redirect using the header() function
                header('Location: ' . $redirectUrl);
                exit; // Ensure no further code is executed after the redirect

            } catch (\Exception $e) {
                // Handle API request exception
                dd($e->getMessage());
            }
            

        }    

    }
    
}
