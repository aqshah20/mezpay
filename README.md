## MezPay: A Laravel Payment Gateway Package for Meezan Bank

[![License](https://img.shields.io/badge/License-MIT-blue.svg)](https://github.com/aqshah20/mezpay/blob/master/LICENSE)

## Introduction

MezPay is a seamless Laravel payment gateway package that empowers secure Meezan Bank payment processing. It simplifies the integration process with Meezan Bank's E-commerce Payment Gateway, allowing you to perform effortless and secure transactions.

This package is proudly developed by AQ Shah, a full-stack Laravel developer, with a passion for creating efficient and reliable solutions for payment processing in Laravel applications.

## How to Set Up

### Step 1: Install Package

You can install the MezPay package via Composer. Open your terminal and run the following command:

```bash
composer require aqshah20/mezpay
```

### Step 2: Register MezPay Service Provider
After installing the package, you need to register the MezPay service provider in your Laravel application. Open config/app.php and add the following line to the providers array:

```php
'providers' => [
    // Other service providers...
    MezPay\MezPayServiceProvider::class,
]
```

### Step 3: Publish Configuration and Migrations:
To publish the configuration and migrations for the MezPay package, run the following Artisan commands in your terminal:

```bash
php artisan vendor:publish --tag=config
php artisan vendor:publish --tag=mezpay-migrations --ansi
php artisan migrate
```
After publishing, you can set your API credentials in the generated configuration file located at config/mezpay.php:

```php
return [
    'username' => env('MEZPAY_USERNAME', ''),
    'password' => env('MEZPAY_PASSWORD', ''),
    'success_callback' => env('MEZPAY_SUCCESS_CALLBACK', ''),
    'failed_callback' => env('MEZPAY_FAILED_CALLBACK', ''),
];
```
### Configuration
You can customize the package by adjusting the following settings in the config/mezpay.php file:

```php
return [
    'username' => env('MEZPAY_USERNAME', ''),
    'password' => env('MEZPAY_PASSWORD', ''),
    'success_callback' => env('MEZPAY_SUCCESS_CALLBACK', 'success'),
    'failed_callback' => env('MEZPAY_FAILED_CALLBACK', 'failed'),
];
```
## Handling Payment Callbacks

After configuring the MezPay package, you need to create routes to handle the payment success and failure callbacks.

### Step 1: Create Routes

In your `routes/web.php` file, add the following routes to handle the payment success and failure callbacks:

```php
use App\Http\Controllers\OrdersController;

Route::get('/success/{orderId?}', [OrdersController::class, 'orderSucceeded'])->name('success');
Route::get('/failed/{orderId?}', [OrdersController::class, 'orderFailed'])->name('failed');
```
### Step 2: Implement Controller Methods
Next, create the OrdersController if you haven't already. In the controller, implement the orderSucceeded and orderFailed methods to process the payment callback responses:

```php
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdersController extends Controller
{
    public function orderSucceeded(Request $request)
    {
        // Get the orderId from the URL parameter or any other source as needed
        $orderId = $request->orderId;

        // Perform actions for successful payment
        // For example, update order status, send notifications, etc.

        // You can also pass the $orderId to a view if needed
        return view('success', compact('orderId'));
    }

    public function orderFailed(Request $request)
    {
        // Get the orderId from the URL parameter or any other source as needed
        $orderId = $request->orderId;

        // Perform actions for failed payment
        // For example, update order status, send notifications, etc.

        // You can also pass the $orderId to a view if needed
        return view('failed', compact('orderId'));
    }
}

```


## How to Use:
To use MezPay, follow these steps:

### Step 1: Import MezPayFacade
Import the MezPayFacade at the top of the controller or model file where you want to use it:
```php
use MezPay\Facade\MezPayFacade;
```

### Step 2: Register an Order:
Register an order with the minimum required parameters using the registerOrder method:
```php
$paymentGateway = MezPayFacade::registerOrder([
    'order_id' => 152,
    'currency' => 586, // 586 = PKR | 540 = USD
    'amount' => 2000,
]);
```

### Order Registration and Payment
After a user successfully registers an order, they will be redirected to a checkout screen where they can enter their card details to proceed with the payment. An example of this checkout screen can be seen in the following image: 

<img src="https://aqssoft.com/mezpay/images/checkout.png"  />


### Payment Status Redirection
Upon completing the checkout and submitting their payment details:

- If the payment is successful, the user will be automatically redirected to the success route, where they will receive a confirmation message and any additional relevant information.
- In the event of a payment failure, the user will be redirected to the failed route, where they will receive a notification and further instructions.
- It is essential to properly configure these redirection routes in your application to handle the payment status and provide the appropriate responses to the user based on the outcome of the payment process.

Ensure that the redirection routes are correctly set up to provide a seamless and user-friendly payment experience for your users.


### How to Get Order Status:
To obtain the order status, simply call the  **getOrderStatus(152)**  method with the  **orderId** as a parameter.
```php
// Call getOrderStatus method with orderId
$response = MezPayFacade::getOrderStatus(152);

// Dump the response for debugging
dd($response);
```

After making the call, you will receive the result as an array, similar to the following:
```php
array:17 [
  "errorCode" => "0"
  "errorMessage" => "Success"
  "orderNumber" => "152"
  "orderStatus" => 2
  "actionCode" => 0
  "actionCodeDescription" => "Request processed successfully"
  "amount" => 2000
  "currency" => "586"
  "date" => 1689879175356
  "ip" => "39.57.43.95"
  "merchantOrderParams" => array:3 [▶]
  "attributes" => array:1 [▶]
  "cardAuthInfo" => array:3 [▶]
  "authDateTime" => 1689879256478
  "terminalId" => "10007077"
  "authRefNum" => "000025936268"
  "fraudLevel" => 0
]
```





### License
This MezPay package is open-source software licensed under the MIT License. See the [LICENSE](https://github.com/spatie/laravel-permission/blob/main/LICENSE.md) file for more information.
### Contributions and Feedback
Contributions, issues, and feedback are welcome! If you encounter any problems or have suggestions for improvements, please feel free to create an issue on  [GitHub](https://github.com/aqshah20/mezpay)

Thank you for choosing MezPay to simplify your integration with Meezan Bank's payment gateway. We hope this package streamlines your payment processing and enhances the security of your transactions. If you have any questions or need further assistance, please don't hesitate to reach out. Happy coding!












