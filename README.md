## MezPay: A Laravel Payment Gateway Package for Meezan Bank

[![License](https://img.shields.io/badge/License-MIT-blue.svg)](https://github.com/aqshah20/mezpay/blob/master/LICENSE)

### Introduction

MezPay is a seamless Laravel payment gateway package that empowers secure Meezan Bank payment processing. It simplifies the integration process with Meezan Bank's E-commerce Payment Gateway, allowing you to perform effortless and secure transactions.

This package is proudly developed by AQ Shah, a full-stack Laravel developer, with a passion for creating efficient and reliable solutions for payment processing in Laravel applications.

### How to Set Up

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
    'success_callback' => env('MEZPAY_SUCCESS_CALLBACK', 'success'),
    'failed_callback' => env('MEZPAY_FAILED_CALLBACK', 'field'),
];
```

### How to Use:
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
    'order_id' => 1000,
    'currency' => 586, // 586 = PKR | 540 = USD
    'amount' => 1000,
]);
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
### License
This MezPay package is open-source software licensed under the MIT License. See the [LICENSE](https://github.com/spatie/laravel-permission/blob/main/LICENSE.md) file for more information.
### Contributions and Feedback
Contributions, issues, and feedback are welcome! If you encounter any problems or have suggestions for improvements, please feel free to create an issue on  [GitHub](https://github.com)

Thank you for choosing MezPay to simplify your integration with Meezan Bank's payment gateway. We hope this package streamlines your payment processing and enhances the security of your transactions. If you have any questions or need further assistance, please don't hesitate to reach out. Happy coding!












