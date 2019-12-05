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
/*
Route::get('/', function () {
    return view('welcome');
});*/

/*Route::controller('/', 'TodoController');*/
Route::get('/', 'TodoController@getIndex');

/** add the task ***/
Route::get('add_task','TodoController@postAdd');
Route::get('edit_task','TodoController@editTask');
Route::get('delete_task','TodoController@deleteTask');
Route::get('update_status','TodoController@updateStatus');
