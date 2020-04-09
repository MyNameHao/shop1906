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


Route::get('/login/login','UserController@login');                      //登录视图
Route::post('/login/login_do','UserController@loginDo');                 //登录视图

//找回密码
Route::get('/test','UserController@test');
Route::get('user/findpwd','UserController@findpwd');
Route::post('user/findpwd1','UserController@findpwd1');
Route::get('user/send','UserController@send');
Route::get('user/verfind','UserController@verfind');

Route::post('user/verfinds','UserController@verfinds');
Route::post('user/verfinds','UserController@verfinds');

//注册
Route::get('/register','UserController@register'); //注册视图
Route::post('/regDo','UserController@regDo'); //注册编辑


Route::prefix('change')->group(function(){
    Route::any('index','Changepwd\UserController@index');
    Route::any('ass','Changepwd\UserController@ass');
    Route::any('sele','Changepwd\UserController@sele');
    Route::any('upda','Changepwd\UserController@upda');
    Route::any('update','Changepwd\UserController@update');



});

