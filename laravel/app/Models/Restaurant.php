<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';

    protected $fillable =  
    [
        'id',
        'name',
        'table_count'
    ];

    /**
     * テーブル数を取得
     *
     * @return int テーブル数
     */
    public function getTableCount()
    {
        return $this->attributes;
    }
}
