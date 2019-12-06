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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('entries')->middleware('auth')->group(function() {

    Route::get('/','EntryController@index');
    Route::get('create','EntryController@create');
    Route::post('store','EntryController@store')->name('entries.store');
    
    Route::get('search','EntryController@search');
    Route::get('/{entry}','EntryController@show');
    Route::get('/{entry}/edit','EntryController@show');
});
