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
}
