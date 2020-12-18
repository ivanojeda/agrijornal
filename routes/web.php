<?php


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/usuarios', 'UserController')->middleware('auth');

Route::resource('/jornadas', 'JornalController')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

