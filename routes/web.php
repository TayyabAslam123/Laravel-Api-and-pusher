<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/get-result', function () {
    $items = App\Item::Orderby('id', 'DESC')->get();
    return view('result',compact('items'));
});

Route::get('get-data','ItemController@getData');