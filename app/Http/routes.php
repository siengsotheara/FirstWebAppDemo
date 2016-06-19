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


/**
 * user route
 * 
 */
Route::group(['middleware' => ['web']], function () {
    Route::get ( '/customer', 'CustomerController@index' );
    Route::post ( '/customer/store', 'CustomerController@store' );
    Route::post ( '/customer/update', 'CustomerController@update' );
    Route::get ( '/customer/edit/{id}', 'CustomerController@edit' );
    Route::get ( '/customer/delete/{id}', 'CustomerController@destroy' );
});

// Route::group(['middleware' => ['web']], function () {
// 	Route::auth();
//     Route::get ('/', 'HomeController@index');
// });


Route::auth();

Route::get('/home', 'HomeController@index');
