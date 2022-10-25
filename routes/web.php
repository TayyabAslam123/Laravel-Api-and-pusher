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

## Main Page Front End Page
Route::get('draw-result', function(){
    $items = App\Item::Orderby('id', 'DESC')->limit('10')->get();   
    $date = Date('d M Y');
    return view('new-draw-page',compact('items','date'));
});

## For Geting  data on front-end after API is called and event is triggered 
Route::get('get-data','ItemController@getTopResult');



