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

Route::group(['prefix'=>'admin'],function(){

	Route::get('/','Admin\LoginController@Login' );
	Route::get('/Index','Admin\IndexController@Index' );
	Route::get('/IndexPage','Admin\IndexController@IndexPage' );
	//错误页面
	Route::get('errors/{message}/{url}/{ActionName}',function($message,$url,$ActionName){
	$url                                   = url( str_replace('-','/',$url) );
	return view('errors.Error', ['message' => $message,'url' => $url,'ActionName' => $ActionName]);
	});
	
	Route::get('Info/{message}/{url}/{ActionName}',function($message,$url,$ActionName){
	$url                                   = url( str_replace('-','/',$url) );
	return view('errors.Info', ['message'  => $message,'url' => $url,'ActionName' => $ActionName]);
	});
	
	//登录路由
	Route::get('Login', 'Admin\LoginController@Login');
	Route::get('LoginOut', 'Admin\LoginController@LoginOut');
	Route::post('Login', 'Admin\LoginController@LoginPost');
	//用户
	Route::get('UserList/', 'Admin\userController@UserList');
	Route::get('User/{id}', 'Admin\userController@User');
	Route::match(['get','post'],'UserAdd/', 'Admin\userController@UserAdd');
	Route::post('User/{id}', 'Admin\userController@UserEdit');
	//管理员
	Route::get('AdminList/', 'Admin\AdminController@AdminList');
	Route::get('Admin/{id}', 'Admin\AdminController@Admin');
	Route::post('Admin/Add', 'Admin\AdminController@AdminAdd');
	//Route::put('Admin/{id}', 'Admin\AdminController@AdminEdit');
	Route::put('Admin/{id}', function($id){
	echo 'admin'.$id;
	die;
	});
	Route::delete('Admin/{id}', 'Admin\AdminController@AdminDelete');
	
	//系统配置
	Route::get('SysInfo', 'Admin\SystemController@Config');

  
});