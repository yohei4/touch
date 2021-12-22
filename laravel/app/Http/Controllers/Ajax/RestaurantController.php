<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RestaurantRequest;

class RestaurantController extends Controller
{
    //
    public function ajaxSave(RestaurantRequest $request)
    {
        $inputs = $request->all();
        dd($inputs);

        //データベース接続
        DB::beginTransaction();
        try {
            Restaurant::create($inputs);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }

        // return true;
    }
}
