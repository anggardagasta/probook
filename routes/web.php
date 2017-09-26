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

//echo Hash::make('agent');


Route::get('search_list', 'HomeController@searchList');
Route::post('search', 'HomeController@search');
# Signup
Route::post('signup', 'HomeController@signup');

# Signout
Route::get('signout', 'HomeController@signout');

Route::group(['before' => 'guest'], function () {
    # Home
    Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
    # Signin
    Route::post('signin', 'HomeController@signin');
});
# Admin
Route::group(['before' => 'auth'], function () {
    Route::get('admin/user', ['as' => 'admin_user', 'uses' => 'AdminController@user']);
    Route::get('admin/book', ['as' => 'admin_book', 'uses' => 'AdminController@book']);
});

# Property
Route::post('property/add', 'PropertyController@add');
Route::delete('property/{id}', 'PropertyController@delete');

# Images
Route::post('images/{property_id}', 'ImagesController@add');