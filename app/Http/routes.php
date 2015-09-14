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
	 
	echo "hiii this is index";
});

Route::group(['middleware' => 'cors'], function()
{
    Route::get('/login','Auth\AuthController@login');
    Route::post('/logind','Auth\AuthController@postLogin');
    Route::post('/loginAuth','Auth\AuthController@authLogin');
	Route::get('/logout','Auth\AuthController@getLogout');
	Route::get('/role_view','Admin\AdminController@viewRoles');
	Route::post('/role_add','Admin\AdminController@addRoles');

	

});




Route::post('/log','Auth\AuthController@postLogin');
Route::get('/log',function(){
	return View::make('login');
});
Route::get('/loginAuth','testController@logtest');
Route::get('/logout','Auth\AuthController@getLogout');

Route::get('/test', function() {
	echo "User Id : " . Auth::id();
});


Route::get('/reg',function(){
	return View::make('register');
});
Route::post('/register','Auth\AuthController@postRegister');

Route::group(array('middleware' => 'auth'), function()
{
	Route::get('/home',function(){

		return View::make('home');
	});
	Route::post('/addcat','CategoryController@addCategory');
});