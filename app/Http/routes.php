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
    return Response::json(['name' => 'Sujith']);
});

Route::group(['middleware' => 'cors'], function()
{
    Route::get('/login','Auth\AuthController@login');


   
});

 Route::post('/logind',function(){
 	 //header("Access-Control-Allow-Origin: x-requested-with");
 	 // return Response::json(['name' => 'Sujith']);
 	 return response(['name' => 'Sujith22'])
 	 			->header('Access-Control-Allow-Origin', 'x-requested-with');
 });
