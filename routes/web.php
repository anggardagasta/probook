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

Route::get('home', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::get('search_list', 'HomeController@searchList');
Route::post('search', 'HomeController@search');
# Signup
Route::post('signup', 'HomeController@signup');

# Signout
Route::get('signout', 'HomeController@signout');

Route::group(['middleware' => 'guest'], function () {
    # Home
    Route::get('/', ['as' => 'login', 'uses' => 'HomeController@index']);
    # Signin
    Route::post('signin', 'HomeController@signin');
});
# Admin
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('admin')->group(function () {
        Route::get('user', ['as' => 'admin_user', 'uses' => 'AdminController@user']);
        Route::get('book', ['as' => 'admin_book', 'uses' => 'AdminController@book']);
    });
});

# Property
Route::post('property/add', 'PropertyController@add');
Route::delete('property/{id}', 'PropertyController@delete');

# Images
Route::post('images/{property_id}', 'ImagesController@add');