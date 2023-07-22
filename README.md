# MezPay: A Laravel Payment Gateway Package for Meezan Bank

[![License](https://img.shields.io/badge/License-MIT-blue.svg)](https://github.com/aqshah20/mezpay/blob/master/LICENSE)

## Introduction

MezPay is a seamless Laravel payment gateway package that empowers secure Meezan Bank payment processing. It simplifies the integration process with Meezan Bank's E-commerce Payment Gateway, allowing you to perform effortless and secure transactions.

## How to Set Up

### Step 1: Install Package

You can install the MezPay package via Composer. Open your terminal and run the following command:

```bash
composer require aqshah20/mezpay

### Step 2: Register MezPay Service Provider
After installing the package, you need to register the MezPay service provider in your Laravel application. Open config/app.php and add the following line to the providers array:

```bash
'providers' => [
    // Other service providers...
    MezPay\MezPayServiceProvider::class,
]

## Step 3: Publish Configuration and Migrations:
To publish the configuration and migrations for the MezPay package, run the following Artisan commands in your terminal:

```bash
php artisan vendor:publish --tag=config
php artisan vendor:publish --tag=mezpay-migrations --ansi
