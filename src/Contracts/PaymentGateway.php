<?php

namespace MezPay\Contracts;

interface PaymentGateway
{
    public function registerOrder(array $request);
    public function getOrderStatus(int $orderId);
    public function processPayment(string $orderId);
    public function createPaymentRequest(string $orderId);
    public function updateOrderStatus(string $orderId);
    public function reverseOrder(string $orderId);
    
}
