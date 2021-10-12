<?php

Route::get('/welcome', 'MuseumController@welcome')->name('museum.welcome');
Route::get('/museums', 'MuseumController@index')->name('museum.list');
Route::get('/search', 'MuseumController@search');
Route::get('/mypage', 'MuseumController@setting')->name('user.setting');
Route::get('/mypage/edit', 'MuseumController@setting_edit')->name('user.edit');
Route::post('/mypage/edit', 'MuseumController@setting_update')->name('user.update');
Route::post('/mypage', 'MuseumController@setting_store')->name('user.store');
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


