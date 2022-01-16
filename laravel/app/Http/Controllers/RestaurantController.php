<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RestaurantRequest;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //
    public function save(RestaurantRequest $request)
    {
        $user = null;
        $user_id = null;
        $restaurant_id = null;

        $inputs = $request->input();
        $file = $request->file('logo');

        // データベース接続
        DB::beginTransaction();
        try {
            // レストランの情報を保存
            $restaurant_id = Restaurant::create($inputs)->id;

            // 店舗IDを保存
            $user_id = Auth::id();
            $user = User::find($user_id);
            $user->restaurant_id = $restaurant_id;
            $user->save();

            // コミット
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }

        //画像の保存
        if (!empty($file)) {
            $this->saveLogo($file);
        }

        return true;
    }

    public function saveLogo($file)
    {
        $id =  User::getRestaurantId();
        $path = $file->storeAs(
            'images/' . $id,
            'logo.' . $file->extension(),
            'public'
        );

        // データベース接続
        DB::beginTransaction();
        try {
            // 店舗テーブルにpathを保存
            $target = Restaurant::find($id);
            $target->logo = $path;
            $target->save();

            // コミット
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }
    }
}
