<?php

Route::get('/museums', 'MuseumController@index')->name('museum.list');
Route::get('/museum/new', 'MuseumController@create')->name('museum.new');
Route::get('/museum', 'MuseumController@store')->name('museum.store');

Route::get('/museum/{id}', 'MuseumController@show')->name('museum.detail');

Route::get('/', function () {
    return redirect('/museums');
});

