<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
	 
	echo  Hash::make('sujith');
});

Route::group(['middleware' => 'cors'], function()
{
    Route::get('/login','Auth\AuthController@login');
    Route::post('/logind','Auth\AuthController@postLogin');
    Route::post('/loginAuth','Auth\AuthController@authLogin');
	Route::get('/logout','Auth\AuthController@getLogout');

	Route::get('/users','Admin\AdminController@viewUsers');
	Route::post('/user_add','Admin\AdminController@addUsers');
	Route::post('/user_delete','Admin\AdminController@deleteUser');

	Route::get('/categories','CategoryController@viewCategories');
	Route::post('/categories/add','CategoryController@addCategory');


	Route::get('/role_view','Admin\AdminController@viewRoles');
	Route::post('/role_add','Admin\AdminController@addRoles');
	Route::post('/role_delete','Admin\AdminController@deleteRole');
	Route::post('/role_edit','Admin\AdminController@editRole');
	Route::post('/role_find','Admin\AdminController@findRole');


	


});

