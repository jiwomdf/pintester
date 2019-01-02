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
use App\MsPhoto;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/MyPost/{id}', 'PhotoController@MyPost');

Route::get('/InsertPhoto','PhotoController@InsertPhoto');

Route::post('/doInsertPhoto','PhotoController@doInsertPhoto');
Route::get('/insertcategory','HomeController@insertcat')->name('insertcategory');
Route::post('/doInsert','HomeController@insertProduct')->name('doInsert');

Route::get('/PostDetail/{id}','PhotoController@PostDetail');