<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
* トップページ
*/
Route::get('/', 'MainController@index')->name('top_page');


/**
* 店舗情報登録(モーダル)
*/
Route::post('/restaurant/ajax/save', 'RestaurantController@save')->name('restaurantAjaxSave');
Route::post('/restaurant/ajax/validation1', 'Ajax\ModalController@ajaxCheck')->name('ajaxValidation');

/**
* 店舗情報
*/
Route::get('/info/restaurant-information', 'RestaurantInformationController@index')->name('restaurant_information');
Route::post('/info/restaurant-information/update', 'RestaurantInformationController@update')->name('restaurant_information/update');

/**
* QRコードページ
*/
Route::get('tableCount_page', 'QRcodeController@tableCount')->name('tableCount_page');
Route::get('tableCountUp', 'QRcodeController@tableCountUp')->name('tableCountUp');
Route::post('QRcode_page', 'QRcodeController@store')->name('QRcode_page');
Route::post('QRcode', 'QRcodeController@store')->name('QRcode_page');
Route::post('QRcode/save', 'QRcodeContrroller@save')->name('QRcode_save');

/**
* 商品種類登録ページ
*/
Route::get('/info/food-type', 'FoodTypeController@index')->name('type_page');
// 商品種類登録
Route::post('/info/food-type/store', 'FoodTypeController@store')->name('type_store');
// 商品種類削除
Route::post('/info/food-type/delete', 'Ajax\FoodTypeController@delete')->name('type_delete');

/**
* 商品登録ページ
*/
Route::get('/info/food-page', 'FoodController@index')->name('food_page');
// 商品登録
Route::post('/info/food-store', 'FoodController@store')->name('food_store');

/**
* 注文ページ
*/
Route::get('/order_page/restaurant_id={restaurant_id}&table={id}', 'OrderController@index')->name('order_page');
// 注文登録
Route::post('order_register', 'OrderController@register')->name('order_register');

/**
* 確認ページ
*/
Route::post('confirm_page', 'OrderController@confirm')->name('confirm_page');

/**
* 管理ページ
*/
Route::get('management_page', 'ManagementController@index')->name('management_page');
// 管理ページAjaxRouting
Route::get('Ajax/Order', 'Ajax\OrderController@index')->name('Ajax/Order');
Route::get('Ajax/Food', 'Ajax\FoodController@index')->name('Ajax/food');
Route::post('Ajax/Change_made', 'Ajax\ChangeController@made')->name('Ajax/Change_made');
Route::post('Ajax/Change_send', 'Ajax\ChangeController@send')->name('Ajax/Change_send');

/**
* totalページ
*/
Route::post('total_page', 'TotalController@index')->name('total_page');
Route::post('change_finish', 'TotalController@change_finish')->name('change_finish');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
