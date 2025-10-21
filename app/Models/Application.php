<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'name',
        'date_of_incident',
        'time_of_incident',
        'description'
    ];
}
