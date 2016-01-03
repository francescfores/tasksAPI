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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('task','TaskController');
Route::resource('tag','TagController');

//API
Route::get('task','TaskController@index');
Route::get('task/{id}','TagController@show');
Route::post('task','TagController@store');
Route::put('task/{id}','TagController@update');
Route::delete('task/{id}','TagController@destroy');
