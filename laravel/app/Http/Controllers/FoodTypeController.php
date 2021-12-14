<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoodTypeRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\FoodType;
use Illuminate\Support\Facades\DB;

class FoodTypeController extends Controller
{
    /**
    * 
    *  
    * @param int $id 
    * @return array 検索結果
    */
    public function index()
    {
        //変数定義
        $row = 0;
        $food_types = array();
        $output_types = array();

        //複合主キーから店のIDを取得
        $primarykey = Auth::id();
        $restaurant_id = explode('|', $primarykey, 2)[0];
        
        //kindモデルからデータを取得
        $food_types = FoodType::where('restaurant_id', $restaurant_id)->get();

        //kindモデルから取得したデータを繰り返し処理し、アウトプットするための配列に代入
        if(isset($food_types)) {
            foreach ($food_types as $food_type) {
                $row++;
                $output_types[] = array('row' => $row, 'name' => $food_type->name, 'id' => $food_type->id);
            }
        }
        
        return view(
            'type_page',
            ['types' => $output_types]
        );
    }

    /**
    * 
    *  
    * @param int $id 
    * @return array 検索結果
    */
    public function store(FoodTypeRequest $request)
    {
        //複合主キーから店のIDを取得
        $primarykey = Auth::id();
        $restaurant_id = explode('|', $primarykey, 2)[0];

        // 商品情報を取得
        $inputs = $request->all();
        $inputs = array_merge($inputs, array('restaurant_id' => $restaurant_id));
        
        //データベース接続
        DB::beginTransaction();
        try {
            FoodType::create($inputs);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }

        return back()->with('name', $inputs['name']);
    }
}
