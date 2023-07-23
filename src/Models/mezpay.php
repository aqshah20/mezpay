<?php

namespace MezPay\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mezpay extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'order_id',
        'order_secret_key',
        'order_url',
    ];


    public static function fillOut(array $data)
    {
        mezpay::create($data);
    }

    public static function getOrderKey($orderId)
    {
        return mezpay::where('order_id',$orderId)->first()->order_secret_key ?? null;
    }

}
