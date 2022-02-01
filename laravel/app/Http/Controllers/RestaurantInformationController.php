<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use App\Models\Prefectures;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\RestaurantdataResource;
use App\Http\Resources\LogoResource;
use Illuminate\Support\Facades\Storage;


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
            compact(
                'restaurant',
                'prefectures'
            )
        );
    }

    /**
    * 更新処理
    * @param RestaurantRequest $request
    * @return
    */
    public function update(RestaurantRequest $request)
    {
        $inputs = $request->input();

        $file = $request->file('logo');
        dd($file);

        //データベース接続
        DB::beginTransaction();
        try {
            Restaurant::where('id', Auth::user()->restaurant_id)->update($inputs);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }
    }

    public function deleteLogo($file, $restaurant_id) {

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

    public function getRestaurntData()
    {
        $disk_name = 'local';
        $data = Restaurant::find(Auth::user()->restaurant_id);
        $file_name = 'public/' . $data->logo;

        $exists = Storage::disk($disk_name)->exists($file_name);

        if ($exists) {
            $file = Storage::disk($disk_name)->get($file_name);
            // $data->file_data = 'data:image/jpeg;base64,' . base64_encode($file);
            $data->file_base64 = base64_encode($file);
        } else {
            $data->file_base64 = '';
        }

        return new RestaurantdataResource($data);
    }

    public function getLogo()
    {
        $disk_name = 'local';
        if (Auth::check()) {

            $data = Restaurant::find(Auth::user()->restaurant_id);
            $file_name = 'public/' . $data->logo;

            $exists = Storage::disk($disk_name)->exists($file_name);

            if ($exists) {
                $file = Storage::disk($disk_name)->get($file_name);
                $data->file_base64 = base64_encode($file);
            } else {
                $data->file_base64 = '';
            }
        }

        return new LogoResource($data);
    }
}
