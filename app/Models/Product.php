<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'color',
        'quantity_product',
        'creator',
        'price',
        'description',
        'component_of_the_product'
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function user_shopping_cart()
    {
        return $this->hasMany(User_shopping_cart::class);
    }
}
