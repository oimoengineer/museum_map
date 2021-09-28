<?php

Route::get('/museums', 'MuseumController@index')->name('museum.list');
Route::get('/museum/new', 'MuseumController@create')->name('museum.new');
Route::post('/museum', 'MuseumController@store')->name('museum.store');
Route::get('/museum/edit/{id}', 'MuseumController@edit')->name('museum.edit');
Route::post('/museum/edit/{id}', 'MuseumController@update')->name('museum.update');

Route::get('/museum/{id}', 'MuseumController@show')->name('museum.detail');
Route::delete('/museum/{id}', 'MuseumController@destroy')->name('museum.destroy');

Route::get('/', function () {
    return redirect('/museums');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
