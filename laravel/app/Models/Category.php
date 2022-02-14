<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable =
    [
        'id',
        'restaurant_id',
        'parent_id',
        'name'
    ];
}
