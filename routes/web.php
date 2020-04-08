<?php

use Illuminate\Support\Facades\Route;

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

//修改密码
Route::prefix('change')->group(function(){
    Route::any('index','Changepwd\UserController@index');
    Route::any('ass','Changepwd\UserController@ass');
    Route::any('sele','Changepwd\UserController@sele');
    Route::any('upda','Changepwd\UserController@upda');
    Route::any('update','Changepwd\UserController@update');



});
