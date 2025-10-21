<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_shopping_cart extends Model
{
    protected $fillable = [
        'id_user',
        'id_product',
        'quantity_product',
        'amount_to_pay'
    ];
}
