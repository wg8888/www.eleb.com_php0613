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
//商户注册
Route::get('user/Add','register\UserController@Add')->name('user.Add');
//提交商户注册信息
Route::post('user/Keep','register\UserController@Keep')->name('user.Keep');
//显示登录页面
Route::get('user/Login','register\UserController@Login')->name('user.Login');
//提交登录
Route::post('user/ToLogin','register\UserController@ToLogin')->name('user.ToLogin');
//退出功能
Route::get('user/LogOut','register\UserController@LogOut')->name('user.LogOut');


//菜品分类
//显示添加菜品
Route::get('menucategories/FoodAdd','food\MenuCategoriesController@FoodAdd')->name('menucategories.FoodAdd');
//添加分类到数据库
Route::post('menucategories/FoodUpdate','food\MenuCategoriesController@FoodUpdate')->name('menucategories.FoodUpdate');
Route::get('menucategories/FoodList','food\MenuCategoriesController@FoodList')->name('menucategories.FoodList');

//菜品
//显示菜品添加
Route::get('menus/Add','food\MenusController@Add')->name('menus.Add');
//添加菜品到数据库
Route::post('menus/Update','food\MenusController@Update')->name('menus.Update');
//显示菜品列表
Route::get('menus/List','food\MenusController@List')->name('menus.List');
//查看分类下面菜品
Route::get('menus/LookFood/{menus}','food\MenusController@LookFood')->name('menus.LookFood');
//删除分类
Route::get('menucategories/Delete/{menucategories}','food\MenuCategoriesController@Delete')->name('menucategories.Delete');
//添加活动表单、
Route::get('activity/Add','register\ActivityController@Add')->name('activity.Add');

//接口路由
Route::domain('www.eleb.com')->group(function(){
    //展示首页路由
    Route::get('shop/List','User\ShopController@List');
    //展示店铺下面所属菜品
    Route::get('shop/Business','User\ShopController@Business');
    //注册用户
    Route::post('member/Begister','User\MemberController@Begister');
    //验证码
    Route::get('member/Sms','User\MemberController@Sms');
    //登录
    Route::post('member/Login','User\MemberController@Login');
});

