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

	Route::get('/categories','Admin\CategoryController@viewCategories');
	Route::get('/categories/trash','Admin\CategoryController@viewTrash');
	Route::post('/categories/add','Admin\CategoryController@addCategory');
	Route::post('/categories/delete','Admin\CategoryController@deleteCategory');
	Route::post('/categories/forceDelete','Admin\CategoryController@forceDeleteCategory');
	Route::post('/categories/restore','Admin\CategoryController@restoreCategory');


	Route::get('/roles/view','Admin\RolesController@viewRoles');
	Route::post('/roles/add','Admin\RolesController@addRoles');
	Route::post('/roles/delete','Admin\RolesController@deleteRole');
	Route::post('/roles/edit','Admin\RolesController@editRole');
	Route::post('/roles/role_find','Admin\RolesController@findRole');
	Route::get('/roles/trash','Admin\RolesController@viewTrash');
	Route::post('roles/restore','Admin\RolesController@restoreRole');
	Route::post('/roles/forceDelete','Admin\RolesController@PermanentDeleteRole');

	Route::get('/transactions','TransactionController@viewTransactions');
	Route::get('/transactions/trash','TransactionController@viewTrash');
	Route::post('/transactions/add','TransactionController@addTransaction');
	Route::post('/transactions/delete','TransactionController@deleteTransaction');
	Route::post('/transactions/restore','TransactionController@restoreTransaction');
	Route::post('/transactions/forceDelete','TransactionController@PermanentDeleteTransaction');
	


});

