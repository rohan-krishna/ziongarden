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
    
    Route::get('/edit/{entry}','EntryController@edit')->name('entries.edit');
    Route::post('/{entry}/update','EntryController@update')->name('entries.update');
    
    Route::get('delete/{entry}','EntryController@destroy');

    Route::get('search','EntryController@search');
    Route::get('/{entry}','EntryController@show');

});
