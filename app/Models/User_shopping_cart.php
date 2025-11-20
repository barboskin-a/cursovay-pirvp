<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_shopping_cart extends Model
{

    protected $table = 'users_shopping_cart';
    public $timestamps = false;

    protected $fillable = [
        'id_user',
        'id_product',
        'quantity_product',
        'amount_to_pay'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
