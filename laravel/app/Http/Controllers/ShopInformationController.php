<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;

class ShopInformationController extends Controller
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
            'app.shop_information',
            compact('restaurant')
        );
    }
}
