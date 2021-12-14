<?php

namespace App\Http\Controllers;

use App\Models\FoodType;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
    * 
    *  
    * @param int $id 
    * @return array 検索結果
    */
    public function index($id, $table_number)
    {
        //変数定義
        $restaurant_id = $id;

        // 商品情報をデータベースから取得
        $foods = Food::where('restaurant_id', $restaurant_id)->get();
        $types = FoodType::where('restaurant_id', $restaurant_id)->get();

        return view(
            'order_page',
            compact('foods', 'types', 'table_number', 'restaurant_id')
        );
    }

    /**
    * 
    *  
    * @param int $id 
    * @return array 検索結果
    */
    public function confirm(Request $request)
    {
        //初期値
        $datas = array();
        $orders = $request->get('orders');
        $table_number = $request->get('table_number');
        $restaurant_id = $request->get('restaurant_id');

        // 注文0の場合
        if (empty($orders)) {
            return back()->with('flash_message', '何も登録されていません');
        }

        // 商品ごとのデータを取得し、2次元配列へ
        foreach ($orders as $order) {

            $food_id = $order['food_id'];
            $foodType_id = $order['type_id'];

            //データの取得
            $food = Food::whereRaw('restaurant_id = ? and id = ? and type_id = ?', [$restaurant_id, $food_id, $foodType_id])->first();
            $type = FoodType::whereRaw('restaurant_id = ? and id = ?', [$restaurant_id, $foodType_id])->first();

            $order_data = array(
                'food_id' => $food_id,
                'type' => $type->name,
                'name' => $food->name,
                'price' => $food->price
            );

            $datas[] = array_merge($order, $order_data);
        }

        // 合計金額を計算
        $total_fee = array();
        foreach ($datas as $data) {
            $single_price = $data['price'];
            $count = $data['count'];
            $multiple_price = $single_price * $count;
            $totalfee_box[] = $multiple_price;
        }
        $sum = 0;
        foreach ($totalfee_box as $value) {
            $sum += $value;
        }
        $total_fee = $sum;

        $request->session()->put('orders', $datas);

        // 確認ページへ
        return view('confirm_page', compact('datas', 'total_fee', 'restaurant_id', 'table_number'));
    }

    /**
    * 
    *  
    * @param int $id 
    * @return array 検索結果
    */
    public function register(Request $request)
    {
        $orders = $request->session()->get('orders');
        $restaurant_id = $request->get('restaurant_id');
        $table_number = $request->get('table_number');

        foreach($orders as $order){
            $data = array(
                'restaurant_id' => $restaurant_id,
                'table_number'  => $table_number,
                'food_id'       => $order['food_id'],
                'count'         => $order['count']
            );
            $datas[] = $data;
        };
        
        $PHurl = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] ;
        $url = $PHurl."/order_page/restaurant_id=" . $restaurant_id . "&table=" . $table_number;

        // 注文情報をデータベースへ保存
        //データベース接続
        DB::beginTransaction();
        try {
            foreach ($datas as $order) {
                Order::create($order);
            }
            DB::commit();
            $request->session()->pull('orders');;
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }

        return view(
            'OK_page',
            [
                'table_number' => $table_number,
                'restaurant_id' => $restaurant_id,
                'url' => $url
            ]
        );
    }
}
