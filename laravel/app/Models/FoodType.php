<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    protected $table = 'food_types';

    protected $fillable =  
    [
        'id',
        'restaurant_id',
        'name'
    ];
}
