<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SummaryMenu extends Model
{
    protected $table = 'summary_menu';

    protected $fillable =  
    [
        'summary_menu_name',
        'class_name'
    ];

    protected $hidden = 
    [
        'id'
    ];

    /**
     * メインメニュー名を取得
     *
     * @return int メインメニュー名
     */
    public function getSummaryMenuName()
    {
        return $this->attributes['summary_menu_name'];
    }

    /**
     * メインメニュー名を取得
     *
     * @return int メインメニュー名
     */
    public function getClassName()
    {
        return $this->attributes['class_name'];
    }
}
