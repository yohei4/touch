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
        'address_4',
        'tel',
        'logo',
        'table_count',
        'comment',
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
     * 住所を取得
     * @return int テーブル数
     */
    public function getAddress()
    {
        return $this->attributes['address_1'] . $this->attributes['address_2'] . $this->attributes['address_3'] . $this->attributes['address_4'];
    }

    /**
     * 店舗名を取得
     * @return string 店舗名
     */
    public static function getName()
    {
        $restaurant_id = null;
        $restaurant_id = auth()->user()->restaurant_id;

        if (empty($restaurant_id)) {
            return null;
        }

        return Restaurant::where('id', auth()->user()->restaurant_id)->first()->restaurant_name;
    }

    /**
     * 店舗名を取得
     * @return string 店舗名
     */
    public static function getMyData()
    {
        // ログイン中のユーザーから店舗idを取得
        $restaurant_id = auth()->user()->restaurant_id;

        // 店舗情報をデータベースから所得

        if (empty($restaurant_id)) {
            return null;
        }

        return Restaurant::where('id', $restaurant_id)->first();
    }
}
