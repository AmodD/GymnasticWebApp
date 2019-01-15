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

Route::get('/user','UserController@index')->name('indexing');
Route::get('/user/create','UserController@create');
Route::post('/user','UserController@store')->middleware('auth');
Route::get('/user/{user}','UserController@show');
Route::get('/user/{user}/edit','UserController@edit');
Route::patch('/user/{user}','UserController@index');
Route::delete('/user/{user}','UserController@index');

Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');

Route::resource('institutes','InstituteController');