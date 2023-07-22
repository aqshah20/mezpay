<?php

namespace MezPay\Facade;

use Illuminate\Support\Facades\Facade;

class MezPayFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mezpay'; 
    }
}
