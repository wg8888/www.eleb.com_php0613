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
//显示商家分类
Route::get('shopcategorie/Add','category\ShopCategorieController@Add')->name('shopcategorie.Add');
//提交数据添加到数据库
Route::post('shopcategorie/AddTo','category\ShopCategorieController@AddTo')->name('shopcategorie.AddTo');
//显示分类列表
Route::get('shopcategorie/List','category\ShopCategorieController@List')->name('shopcategorie.List');
//回显分类
Route::get('shopcetegorie/Edit/{shopcategorie}','category\ShopCategorieController@Edit')->name('shopcategorie.Edit');
//保存修改
Route::post('shopcetegorie/Update/{shopcategorie}','category\ShopCategorieController@Update')->name('shopcategorie.Update');
//删除分类
Route::get('shopcetegorie/Delete/{shopcategorie}','category\ShopCategorieController@Delete')->name('shopcategorie.Delete');
//显示审核信息
Route::get('shop/Mation','information\ShopController@Mation')->name('shop.Mation');
Route::post('shop/Update/{shop}','information\ShopController@Update')->name('shop.Update');
//查看商家分类详情
Route::get('shopcategorie/Look/{shopcategorie}','category\ShopCategorieController@Look')->name('shopcategorie.Look');
//后台直接添加商户
Route::get('shopcategorie/ShopAdd','category\ShopCategorieController@ShopAdd')->name('shopcategorie.ShopAdd');
//提交数据
Route::post('shopcategorie/ShopKeep','category\ShopCategorieController@ShopKeep')->name('shopcategorie.ShopKeep');
//创建管理员
Route::get('admin/Add','admines\AdminController@Add')->name('admin.add');
//提交添加
Route::post('admin/AddTo','admines\AdminController@AddTo')->name('admin.addto');
//显示登录界面
Route::get('admin/Login','admines\AdminController@Login')->name('admin.Login');
//提交登录
Route::post('admin/ToLogin','admines\AdminController@ToLogin')->name('admin.ToLogin');
//注销功能
Route::get('admin/LogOut','admines\AdminController@LogOut')->name('admin.LogOut');
//展示管理员列表
Route::get('admin/List','admines\AdminController@List')->name('admin.List');
//修改回显
Route::get('admin/Edit/{admin}','admines\AdminController@Edit')->name('admin.Edit');
//显示商户登录信息
Route::get('user/ShopAdmin','admines\UserController@ShopAdmin')->name('user.ShopAdmin');
//重置商户密码并显示旧数据
Route::get('user/NewPwd/{user}','admines\UserController@NewPwd')->name('user.NewPwd');
//实现重置密码功能
Route::post('user/Update/{user}','admines\UserController@Update')->name('user.Update');