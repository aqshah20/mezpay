<?php

namespace MezPay\Controllers;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use MezPay\Helpers\MezPayUrls;
use MezPay\Traits\OrderProcessor;

use Illuminate\Http\Request;

class PaymentController
{
    
    use OrderProcessor;
    
    public function handleCallback(Request $request)
    {
        if( $request->has('orderid') ) {

            $order_id =  $request->query('orderid');

            // Retrieve the success route from the configuration
            $successRoute = config('mezpay.success_callback');
            $failedRoute = config('mezpay.failed_callback');

            try {
                $redirectedURL = "";
                $response =  $this->getOrderPaymentStatus($order_id);
                if (isset($response['errorCode']) && $response['errorCode'] == 0) {
                    if( $response['orderStatus'] == 2 ) // Payment was successfull.
                    {
                        $redirectedURL = $successRoute;
                    }else{
                        $redirectedURL = $failedRoute;
                    }
                } else {
                    $redirectedURL = $failedRoute;
                }

                $url = URL::to($redirectedURL);
                $redirectUrl = $url.'/'.$order_id;
                
                $this->redirectTo($redirectUrl);

            } catch (\Exception $e) {
                // Handle API request exception
                dd($e->getMessage());
            }
            

        }    

    }
    
}
