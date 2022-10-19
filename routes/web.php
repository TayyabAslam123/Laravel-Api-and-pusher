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
Route::get('get-result', function(){
    $items = App\Item::Orderby('id', 'DESC')->limit('10')->get();
    $arr1=[]; // For Left Side
    $arr2=[]; // For Righ Side
    for($i=0; $i<10; $i++){
        // make array for left side data
        if($i<5 && isset($items[$i])){
            $arr1[]= $items[$i];
        }
        // make array for right side data
        if($i>4 && $i<10 && isset($items[$i]))
        {
            $arr2[]=$items[$i];
        }
    }
    
    return view('result',compact('arr1', 'arr2'));
});

## For Geting  data on front-end after API is called and event is triggered 
Route::get('get-data','ItemController@getTopResult');

## New Draw Page Design
Route::get('draw', function(){
    return view('new-draw-page');
});



