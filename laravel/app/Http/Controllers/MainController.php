<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    /**
    * 
    *  
    * @param int $id 
    * @return array 検索結果
    */
    public function index()
    {
        return redirect()->route('login');
    }
}
