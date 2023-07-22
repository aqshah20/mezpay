<?php

namespace MezPay\Helpers;

class MezPayUrls
{
    public static function getRegisterUrl()
    {
        return 'https://acquiring.meezanbank.com/payment/rest/register.do';
    }

    public static function getOrderStatusUrl()
    {
        return 'https://acquiring.meezanbank.com/payment/rest/getOrderStatusExtended.do';
    }
}
