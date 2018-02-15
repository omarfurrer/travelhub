<?php

use App\Entities\Roles;

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


Auth::routes();

Route::get('/', 'PagesController@getLanding');

Route::get('/home', 'PagesController@getHome');


Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'role:' . Roles::ADMIN])->group(function () {
    Route::get('/', 'PagesController@getDashboard');
    Route::resource('users', 'UsersController');
    Route::resource('agencies', 'AgenciesController');
});
