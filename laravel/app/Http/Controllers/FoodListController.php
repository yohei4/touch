<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodListController extends Controller
{
    public function index()
    {
        return view('app.food_list');
    }
}
