<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Food;
use Illuminate\Support\Facades\DB;

class TotalController extends Controller
{   
    /**
    * 
    *  
    * @param int $id 
    * @return array 検索結果
    */
    public function index()
    {
        // 商品情報をデータベースから所得
        $orderss = Order::where('status', 1)->orWhere('status', 2)->orWhere('status', 3)->Where('restaurant_id', $_POST['restaurant_id'])->where('table_number', $_POST['table_number'])->get();
        dd(session()->all());
        foreach ($orderss as $order) {
            if ($order->restaurant_id == $_POST['restaurant_id'] && $order->table_number == $_POST['table_number']) {
                $orders[] = $order;
            }
        }
        $foods = Food::where('restaurant_id', $_POST['restaurant_id'])->get();
        // オーダーしていない時
        if (empty($orders)) {
            return view('total_page')->with('flash_message', '何も登録されていません');
        }
        // テーブル番号
        $table_number = $_POST['table_number'];
        return view(
            'total_page',
            [
                'orders' => $orders,
                'products' => $foods,
                'table_number' => $table_number
            ]
        );
    }

    /**
    * 
    *  
    * @param int $id 
    * @return array 検索結果
    */
    public function change_finish()
    {
        foreach ($_POST as $key => $value) {
            if (is_int($key)) {
                $id = $key;
                // $status_id = Management::find($id);
                // if ($status_id['status'] == "creating") {
                //     exit;
                //     return back()->with('flash_message', 'まだ届いていない商品があります。');
                // }
                // statusを4に変更
                Order::where('id', $id)->update(['status' => 4]);
            }
        }
        return view(
            'end_page',
            [
                'totalfee' => $_POST['totalfee']
            ]
        );
    }
}
