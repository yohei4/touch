<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\FoodType;
use App\Http\Requests\FoodRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use app\Models\User;

class FoodController extends Controller
{
    /**
    *
    *
    * @param int $id
    * @return array 検索結果
    */
    public function index()
    {
        $row = 0;
        $type_name = "";
        $foods = array();
        $food_types = array();
        $output_foods = array();

        $id = Auth::id();
        $restaurant_id = User::getRestaurantId($id);

        //モデルからデータ取得
        // $food_types = FoodType::where('restaurant_id', $restaurant_id)->get();
        // $foods = Food::where('restaurant_id', $restaurant_id)->get();
        $foods = DB::table('food_types as A')
            ->leftJoin('foods as B', function($join){
                $join->on('A.restaurant_id', '=', 'B.restaurant_id');
                $join->on('A.id', '=', 'B.type_id');
            })
            ->select(
                'A.name as type_name',
                'B.name as food_name',
                'B.price as price',
            )
            ->where('restaurant_id', '=', $restaurant_id)
            ->get();

        return view(
            'food',
            [
                'types' => $foods[],
                'foods' => $output_foods
            ]
        );
    }

    /**
    *
    *
    * @param int $id
    * @return array 検索結果
    */
    public function store(FoodRequest $request)
    {
        $id = Auth::id();
        $restaurant_id = User::getRestaurantId($id);

        // 商品情報を取得
        $inputs = $request->all();
        $type = FoodType::where('name', $inputs['type'])->first();
        $inputs = array_merge($inputs, array('restaurant_id' => $restaurant_id, 'type_id' => $type->id));
        unset($inputs['type']);

        //データベース接続
        DB::beginTransaction();
        try {
            Food::create($inputs);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            abort(500);
        }

        return back()->with('type', $type['name'])->with('name', $inputs['name'])->with('price', $inputs['price']);
    }
}
