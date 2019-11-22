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
    return redirect('/books');
});

Route::resource('/users', 'UserController')->middleware('auth');

Route::resource('/books', 'BookController')->middleware('auth');

Route::post('/readings', 'ReadingController@store');
Route::post('/readings/delete', 'ReadingController@destroy');

Route::post('/wishes', 'WishController@store');
Route::post('/wishes/delete', 'WishController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home')
    ->middleware('auth');
