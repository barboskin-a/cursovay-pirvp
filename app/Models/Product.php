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
}
