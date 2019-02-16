<?php

Route::get('/', function () { return view('home'); });

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('centres','CentreController');
Route::resource('batches','BatchController');
Route::resource('students','StudentController');

Route::get('/centres/{centre}/batches', 'CentreController@batches');
Route::get('/batches/{batch}/students','BatchController@students');
Route::post('/attendances','AttendanceController@store');
