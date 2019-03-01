<?php

Route::get('/', function () { return view('home'); });

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('centres','CentreController');
Route::resource('batches','BatchController');
Route::resource('students','StudentController');

Route::get('/centres/{centre}/batches', 'CentreController@batches');
Route::get('/batches/{batch}/students','BatchController@students');
Route::get('/batches/{batch}/attendances','BatchController@students');

Route::post('/attendances','AttendanceController@store');
Route::get('/attendances/batches','AttendanceController@batches');
Route::get('/attendances/batches/{batch}','AttendanceController@batch');
Route::get('/attendances/batches/{batch}/students','AttendanceController@students');

Route::get('/fees/centres','FeeController@centres');
Route::get('/fees/centres/{centre}','FeeController@centre');
Route::post('/fees','FeeController@store');
Route::get('/fees/{fee}/sendreceipt','FeeController@sendreceipt');


Route::get('mailable', function () {
    $fee = App\Fee::find(12);

    return new App\Mail\Receipt($fee);
});
