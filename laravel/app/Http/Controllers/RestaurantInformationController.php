<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class RestaurantInformationController extends Controller
{
    /**
    *
    * @return array
    */
    public function index()
    {
        $restaurant_id = Auth::user()->restaurant_id;

        // 店舗情報をデータベースから所得
        $restaurant = Restaurant::where('id', $restaurant_id)->first();

        return view(
            'app.restaurant_information',
            compact('restaurant')
        );
    }
}
