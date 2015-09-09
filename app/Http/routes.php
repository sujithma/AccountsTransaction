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
	 // header("Access-Control-Allow-Origin: *");
	echo $password = Hash::make('123456');exit;
    return Response::json(['name' => 'Sujith']);

});

Route::group(['middleware' => 'cors'], function()
{
    Route::get('/login','Auth\AuthController@login');
    Route::post('/logind','Auth\AuthController@postLogin');
    Route::post('/loginAuth','Auth\AuthController@authLogin');
	Route::get('/loginAuth2','testController@logtest');

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
 // Route::post('/logind',function(){
 // 	 header("Access-Control-Allow-Origin: *");
 // 	 return Response::json(['name' => 'Sujith']);
 // });
