<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
    'id_product',
    'quantity',
    'order_sum',
    'delivery'
];
}
