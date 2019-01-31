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
use Illuminate\http\Request;
use App\Task;

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::delete('/tasks/delete/{id}', 'TaskController@delete');

Route::resource('/tasks', 'TaskController')->middleware('auth');
