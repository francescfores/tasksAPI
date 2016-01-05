<?php
header("Access-Control-Allow-Origin: *");
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
//get all tasks
Route::get('task','TaskController@index');
//get one tasks
Route::get('task/{id}','TaskController@show');
//create task
Route::post('task','TaskController@store');
//update task
Route::put('task/{id}','TaskController@update');
//delete task
Route::delete('task/{id}','TaskController@destroy');
