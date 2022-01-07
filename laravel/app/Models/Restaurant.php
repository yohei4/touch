<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';

    protected $fillable =
    [
        'id',
        'restaurant_name',
        'postal_code',
        'address_1',
        'address_2',
        'address_3',
        'tel',
        'logo',
        // 'table_count',
        // 'comment',
    ];

    /**
     * テーブル数を取得
     * @return int テーブル数
     */
    public function getTableCount()
    {
        return $this->attributes['table_count'];
    }

    /**
     * テーブル数を取得
     * @return int テーブル数
     */
    public function getAddress()
    {
        return $this->attributes['address_1'] . $this->attributes['address_2'] . $this->attributes['address_3'];
    }
}
