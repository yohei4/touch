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

            //画像の保存
            if (!empty($file)) {
                $this->saveLogo($file, $restaurant_id);
            }

            // コミット
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }


        return true;
    }

    public function saveLogo($file, $restaurant_id)
    {
        // 画像をstorageに保存
        $path = $file->storeAs(
            'images/' . $restaurant_id,
            'logo.' . $file->extension(),
            'public'
        );

        // 店舗テーブルにpathを保存
        $target = Restaurant::find($restaurant_id);
        $target->logo = $path;
        $target->save();
    }
}
