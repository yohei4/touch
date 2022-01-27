<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use App\Models\Prefectures;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RestaurantRequest;

class RestaurantInformationController extends Controller
{
    /**
    *
    * @return array
    */
    public function index()
    {
        // ユーザーのデータを取得
        $restaurant = Restaurant::getMyData();

        // 都道府県を取得
        $prefectures = Prefectures::all();

        return view(
            'app.restaurant_information',
            compact('restaurant', 'prefectures')
        );
    }

    public function update(RestaurantRequest $request)
    {
        $data = $request->all();

        dd($data);

        //データベース接続
        DB::beginTransaction();
        try {
            Restaurant::where('id', Auth::user()->restaurant_id)->update($data);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }

    }
}
