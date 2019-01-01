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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/MyPost', 'Photo@MyPost');

Route::get('/InsertPhoto','Photo@InsertPhoto');

Route::post('/doInsert','Photo@doInsert');
Route::get('/insertcategory','HomeController@insertcat')->name('insertcategory');
Route::post('/doInsert','HomeController@insertProduct');
Route::get('/doDelete/{id}','HomeController@deletecategory');

Route::get('/viewcategory','HomeController@viewcategory')->name('viewcategory');
Route::get('/formUpdateCategory/{id}','HomeController@formUpdateCategory');
Route::post('/doUpdate','HomeController@updateCategory');
Route::get('/viewupdate','HomeController@updateview');