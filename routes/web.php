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

Route::get('/', function () {
    return view('home');
});

Route::resource('/tasks', 'TaskController')->middleware('auth');

Auth::routes();

Route::get('/', 'TaskController@index');

Route::post('store', 'TaskController@store');

Route::post('update', 'TaskController@update');

Route::post('destroy', 'TaskController@destroy');
