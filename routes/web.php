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
	//echo Hash::make('agent');
    return view('welcome');
});

# Property
Route::post('property/add', 'PropertyController@add');
Route::delete('property/{id}', 'PropertyController@delete');