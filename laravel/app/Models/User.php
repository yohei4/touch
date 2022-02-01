<?php

namespace App\Models;

use Brick\Math\BigInteger;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use \Illuminate\Database\Eloquent\Builder;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable;
    use HasApiTokens, Notifiable;
    // use \LaravelTreats\Model\Traits\HasCompositePrimaryKey;

    protected $primaryKey = 'id';

    // public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'restaurant_id', 'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'role', 'remember_token'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    /**
     * 店舗IDを取得
     * @return string restaurant_id
     */
    public static function getRestaurantId() {
        return User::where('id', auth()->user()->id)->restaurant_id;
    }

    // /**
    //  * Get the primary key for the model.
    //  *
    //  * @return array
    //  */
    // public function getKeyName()
    // {
    //     return $this->primaryKey;
    // }

    // /**
    //  * Get the name of the unique identifier for the user.
    //  *
    //  * @return array
    //  */
    // public function getAuthIdentifierName()
    // {
    //     return $this->getKeyName();
    // }

    // /**
    //  * Get the unique identifier for the user.
    //  *
    //  * @return mixed
    //  */
    // public function getAuthIdentifier()
    // {
    //     //初期設定
    //     $restaurant_id = $this->restaurant_id;
    //     $id = $this->id;

    //     //トークン作成用
    //     $strPrimaryley = $restaurant_id . "|" . $id;

    //     return $strPrimaryley;
    // }

    // /**
    //  * Get the primary key value for a save query.
    //  *
    //  * @return mixed
    //  */
    // protected function getKeyForSaveQuery()
    // {
    //     $primaryKeyName = $this->getKeyName();

    //     $restaurant_id = $primaryKeyName[0];
    //     $id = $primaryKeyName[1];

    //     $orignalKeyName[] = $this->original[$restaurant_id];
    //     $orignalKeyName[] = $this->original[$id];

    //     return $orignalKeyName ?? $this->getKey();
    // }

    // /**
    //  * Set the keys for a save update query.
    //  *
    //  * @param  \Illuminate\Database\Eloquent\Builder  $query
    //  * @return \Illuminate\Database\Eloquent\Builder
    //  */
    // protected function setKeysForSaveQuery(Builder $query)
    // {
    //     $columns = $this->getAuthIdentifierName();

    //     $restaurant_id = $columns[0];
    //     $id = $columns[1];

    //     return $query->whereRaw($restaurant_id . ' = ? and ' . $id .' = ?', $this->getKeyForSaveQuery());
    // }
}
