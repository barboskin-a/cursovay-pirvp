<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application_acceptance extends Model
{
    protected $fillable = [
        'id_application',
        'id_user'
    ];

    public function application() {
        return $this->belongsTo(Application::class, 'id_application');
    }

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
