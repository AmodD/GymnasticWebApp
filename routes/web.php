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


// Route::get('/', function () {
//     return view('welcome');
// });

// GET	/photo	index	photo.index
// GET	/photo/create	create	photo.create
// POST	/photo	store	photo.store
// GET	/photo/{photo}	show	photo.show
// GET	/photo/{photo}/edit	edit	photo.edit
// PUT/PATCH	/photo/{photo}	update	photo.update
// DELETE	/photo/{photo}	destroy	photo.destroy


Route::get('/', function () {
    return view('home');
});

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/centres/{centre}/batches', 'CentreController@batches');
Route::get('/centres/{centre}/batches/{batch}/students', 'CentreController@batchStudents');

Route::resource('batches','BatchController');

Route::get('/batches/{batch}/students','BatchController@getStudentsOfBatch');
Route::get('/batches/{batch}/students','StudentController@index');


Route::post('/attendances','AttendanceController@store');
// /batch/2/students/72372

// /students XXXXX

// /batch/2/students/23343/attendances
// /batch/2students/2323/attendance/27-1-19  /today     

