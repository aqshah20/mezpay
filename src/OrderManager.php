<?php

namespace MezPay;

use MezPay\Contracts\PaymentGateway;
use MezPay\Helpers\MezPayUrls;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;
use MezPay\Handlers\ErrorResponseHandler;
use MezPay\Controllers\PaymentController;
use Carbon\Carbon;
use Redirect;
use InvalidArgumentException;
use MezPay\Models\MezPay;


class OrderManager implements PaymentGateway
{

    public function registerOrder(array $request)
    {
        
        if (!is_array($request)) {
            throw new InvalidArgumentException('Invalid data type for $request. Expected array.');
        }

        $validator = Validator::make($request, [
            'order_id'              => 'required|numeric|min:1',
            'amount'                => 'required|numeric|min:20',
            'currency'              => 'required|digits:3',
            'description'           => 'nullable|string|max:512',
            'language'              => 'nullable|string|size:2',
            'clientId'              => 'nullable|string|max:255',
            'email'                 => 'nullable|email',
            'phone'                 => 'nullable|string|max:255',
            'jsonParams'            => 'nullable|array|max:1024',
            'sessionTimeoutSecs'    => 'nullable|integer',
            'expirationDate'        => 'nullable|date_format:Y-m-d\TH:i:s',
            'bindingId'             => 'nullable|string|max:255',
            'features'              => 'nullable|string',
            'paymentWay'            => 'nullable|string|max:32',
            'recurrenceType'        => 'required_if:paymentWay,Recurrent|string',
            'recurrenceFrequency'   => 'nullable|required_if:recurrenceType,AUTO|string',
            'recurrenceStartDate'   => 'nullable|required_if:recurrenceType,AUTO|date_format:Ymd',
            'recurrenceEndDate'     => 'nullable|required_if:recurrenceType,AUTO|date_format:Ymd',
            'threeDS2Params'        => 'nullable|array',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
           return ['errors' => $validator->errors()];
           //return view('mezpay::error', ['error' => $validator->errors()]);
        }

        // Retrieve validated data
        $orderNumber = $request['order_id'];
        $Currency = $request['currency'];
        $amount = intval($request['amount'])."00";
        
        // Retrieve API credentials from the configuration
        $apiUserName = config('mezpay.username');
        $apiPassword = config('mezpay.password');
        
        // Retrieve the success route from the configuration
        $successRoute = config('mezpay.success_callback');

        // Build the complete success URL using the retrieved success route and the order ID
        $returnUrl = URL::to($successRoute, ['orderid' => $orderNumber]);
 

        // Prepare the API request parameters using the retrieved credentials
        $apiURL =  MezPayUrls::getRegisterUrl();
        $postInput = [
            'userName'      => $apiUserName,
            'password'      => $apiPassword,
            'orderNumber'   => $orderNumber,
            'amount'        => $amount,
            'currency'      => $Currency, 
            'returnUrl'     => URL::to("payment-callback?orderid=".$orderNumber),
        ];
        
        // Send the API request using Guzzle HTTP client
        $client = new Client();
        $response = $client->post($apiURL, ['form_params' => $postInput]);

        // Get the status code and response body from the API response
        $statusCode = $response->getStatusCode();
        $responseBody = json_decode($response->getBody(), true);

        // Check if the API response contains an error code and handle accordingly
        if ( isset($responseBody['errorCode']) && $responseBody['errorCode'] == 0 ) {
            
            MezPay::create([
                'order_id'          => $orderNumber,
                'order_secret_key'  => $responseBody['orderId'],
                'order_url'         => $responseBody['formUrl'],
            ]);
           
            //return redirect($responseBody['formUrl']);
            header('Location: ' . $responseBody['formUrl']);exit();
        } else {

            //return ErrorResponseHandler::errorResponse($responseBody['errorCode']);
            return $responseBody;
            //return view('mezpay::error', ['error' => $responseBody]);
        }
    }

    public function getOrderStatus(string $orderId)
    {

    }
    public function processPayment(string $orderId){

    }
    public function createPaymentRequest(string $orderId){

    }
    public function updateOrderStatus(string $orderId){

    }
    public function reverseOrder(string $orderId){
        
    }
}
