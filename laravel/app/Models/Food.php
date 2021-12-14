<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    protected $fillable =  
    [
        'restaurant_id',
        'type_id',
        'id',
        'name',
        'price'
    ];
}
