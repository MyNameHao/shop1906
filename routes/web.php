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

Route::get('/test','UserController@test');
Route::get('user/findpwd','UserController@findpwd');
Route::post('user/findpwd1','UserController@findpwd1');
Route::get('user/send','UserController@send');
Route::get('user/verfind','UserController@verfind');
Route::post('user/verfinds','UserController@verfinds');