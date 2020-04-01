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

/*
Route::get('/', function () {
    //return view('welcome');
    return 'Hellow world';
});

Route::get('users/{id}/{name}', function($id, $name) {
    return 'This is user id ' .$id. ' Name ' .$name;
});

*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');


Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

/* Resources */
Route::resource('empresas', 'EmpresasController');


/* Estudo
Route::get('/form', function(){
    return view('upload.form');
});
Route::post('upload', 'UploadController@upload')->name('upload');

*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route:: resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
});







