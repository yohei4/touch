<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use App\Models\Prefectures;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RestaurantRequest;
use App\Http\Resources\RestaurantdataResource;
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

    public function update(RestaurantRequest $request)
    {
        $data = $request->all();

        dd($file = $request->file('logo'));

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
}
