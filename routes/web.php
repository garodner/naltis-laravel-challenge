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

Route::get('/', 'VehicleController@index')->name('home');
Route::get('/create','VehicleController@create')->name('create');
Route::get('/edit/{id}','VehicleController@edit');
Route::get('/increment/{id}','VehicleController@like');
Route::post('/store','VehicleController@store')->name('store');
Route::post('/update/{id}','VehicleController@update')->name('update');
Route::post('/remove/{id}','VehicleController@remove')->name('remove');
