<?php

namespace App\Http\Controllers\Ajax;

use \App\Models\Food;
use \App\Models\FoodType;
use App\Http\Controllers\Controller;

class FoodTypeController extends Controller
{
    public function delete()
    {
        $id = $_POST['id'];
        // 指定したidを削除
        FoodType::where('id', $id)->delete();
        Food::where('type_id', $id)->delete();
    }
}
