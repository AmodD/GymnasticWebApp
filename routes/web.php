<?php

Route::get('/', function () { return view('home'); });

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::resource('centres','CentreController');
Route::resource('batches','BatchController');
Route::resource('students','StudentController');

Route::get('/getstudents', 'StudentController@getStudents');

Route::get('/centres/{centre}/batches', 'CentreController@batches');
Route::get('/centres/{centre}/batches/create', 'BatchController@create');
Route::get('/centres/{centre}/batches/{batch}/edit', 'BatchController@edit');

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
Route::get('/fees/centres/{centre}/reports','FeeController@reports');
Route::get('/fees/centres/{centre}/reports/period','FeeController@centrePeriod');

Route::get('/archives', function () {
	$centresTrashed = App\Centre::onlyTrashed()->get();
	$batchesTrashed = App\Batch::onlyTrashed()->get();
	$studentsTrashed = App\Student::onlyTrashed()->get();

	$centresActive = App\Centre::all();
	$batchesActive = App\Batch::all();
	//dd($centres);
        return view('archives',compact('centresTrashed','batchesTrashed','studentsTrashed','centresActive','batchesActive'));
});
Route::post('/archives','HomeController@archives');

Route::get('mailable', function () {
    $fee = App\Fee::find(3);

    return new App\Mail\Receipt($fee);
});
