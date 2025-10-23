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
    public function product() {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
