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

Route::get('/', function () {
    return view('welcome');
});
Route::post('zipcode/edit/{id}', 'ZipController@update');
Route::post('zipcode/delete/{id}', 'ZipController@destroy');
Route::resource('zipcode', 'ZipController')->names([
	'update' => 'zipcode.update',
]);