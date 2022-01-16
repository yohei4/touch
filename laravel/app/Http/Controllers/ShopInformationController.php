<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopInformationController extends Controller
{
    /**
    *
    * @return array
    */
    public function index()
    {
        //複合主キーから店のIDを取得
        $primarykey = Auth::id();
        $restaurant_id = explode('|', $primarykey, 2)[0];

        // 商品情報をデータベースから所得
        $orders = Order::where('restaurant_id', $restaurant_id)->get();
        $products = Food::where('restaurant_id', $restaurant_id)->get();
        return view(
            'management_page',
            ['orders' => $orders,'products' => $products]
        );
    }
}
