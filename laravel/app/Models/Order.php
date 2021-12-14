<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public const STATUS_CREATE = 1;
    public const STATUS_MADE = 2;
    public const STATUS_SEND = 3;
    public const STATUS_FINISHED = 4;

    protected $fillable =
    [
        'restaurant_id',
        'table_number',
        'id',
        'price_id',
        'count',
        'status'
    ];
}
