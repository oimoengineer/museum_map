<?php

use App\Http\Controllers\MuseumController;

Route::get('/welcome', 'MuseumController@welcome')->name('museum.welcome');

Route::get('/museums', 'MuseumController@index')->name('museum.list');
Route::get('/search', 'MuseumController@search');

Route::get('/mypage', 'UseController@index')->name('user.setting');
Route::delete('/mypage', 'UseController@destroy')->name('user.destroy');
Route::post('/mypage', 'UseController@store')->name('user.store');

Route::get('/mypage/edit', 'UseController@edit')->name('user.edit');
Route::post('/mypage/edit', 'UseController@update')->name('user.update');


Route::get('/museum/new', 'MuseumController@create')->name('museum.new');
Route::post('/museum', 'MuseumController@store')->name('museum.store');

Route::get('/museum/edit/{id}', 'MuseumController@edit')->name('museum.edit');
Route::post('/museum/edit/{id}', 'MuseumController@update')->name('museum.update');

Route::get('/museum/{id}', 'MuseumController@show')->name('museum.detail');
Route::delete('/museum/{id}', 'MuseumController@destroy')->name('museum.destroy');

// resetPassword
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('/', function () {
    return redirect('/welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

