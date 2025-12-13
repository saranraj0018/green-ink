<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'amount', 'order_id', 'payment_id', 'status','other'];

    protected $casts = [
        'other' => 'array'
    ];
}
