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


Route::resource('users', 'UserController');
Auth::routes();
Route::get('/dashboard', 'UserController@index')->name('dashboard');
