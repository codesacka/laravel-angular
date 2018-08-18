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
    return view('welcome');
});


Route::get('Task/index', ['as' => 'Tasks.index', 'uses' => 'TaskController@index']);
Route::get('Task/{id}/show', ['as' => 'Tasks.show', 'uses' => 'TaskController@show']);
Route::get('Task/{id}/edit', ['as' => 'Tasks.edit', 'uses' => 'TaskController@edit']);
Route::get('Task/create', ['as' => 'Tasks.create', 'uses' => 'TaskController@create']);
Route::post('Task/store', ['as' => 'Tasks.store', 'uses' => 'TaskController@store']);
Route::put('Task/{id}', ['as' => 'Tasks.update', 'uses' => 'TaskController@update']);
Route::delete('Task/{id}',['as'=>'Tasks.destroy','uses'=>'TaskController@destroy']);
