<?php

namespace App\Http\Controllers\Ajax;

use \App\Models\Food;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function index()
    {
        return Food::where('user_id',Auth::id())->get();
    }
}
