<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RestaurantRequest;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //
    public function save(RestaurantRequest $request)
    {
        $inputs = $request->file('logo');
        return $inputs;

        //データベース接続
        // DB::beginTransaction();
        // try {
        //     Restaurant::create($inputs);
        //     DB::commit();
        // } catch (\Throwable $e) {
        //     DB::rollback();
        //     abort(500);
        // }

        // return true;
    }
}
