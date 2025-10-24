<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;
    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function application_acceptance()
    {
        return $this->hasMany(Application_Acceptance::class);
    }

    public function order() {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function user_shopping_cart()
    {
        return $this->hasMany(User_shopping_cart::class);
    }
}
