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

Route::get('/home', function () {
    return view('welcome');
});

Auth::routes();


Auth::routes();

//HomeController
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/insertcategory','HomeController@insertcat')->name('insertcategory');
Route::post('/doInsert','HomeController@insertProduct')->name('doInsert'); //ini kenapa ada dua ya
Route::post('/doInsert','HomeController@insertProduct'); //ini kenapa ada dua ya
Route::get('/doDelete/{id}','HomeController@deletecategory');
Route::get('/viewcategory','HomeController@viewcategory')->name('viewcategory');
Route::get('/formUpdateCategory/{id}','HomeController@formUpdateCategory');
Route::post('/doUpdate','HomeController@updateCategory');
Route::get('/viewupdate','HomeController@updateview');

//PhotoController
Route::get('/MyPost/{id}', 'PhotoController@MyPost');
Route::get('/InsertPhoto','PhotoController@InsertPhoto');
Route::post('/doInsertPhoto','PhotoController@doInsertPhoto');

Route::get('/PostDetail/{id}','PhotoController@PostDetail');
Route::post('/doComment','PhotoController@Comment');

//ProfileController
Route::get('/profile','ProfileController@profile');
Route::post('doUpdateProfile','ProfileController@doUpdateProfile');
Route::get('/categories','ProfileController@categories');

//search
Route::get('/doSearch','HomeController@searchPhoto');

//CartController
route::post('/insertToCart','CartController@insertToCart');
route::get('/viewCart','CartController@viewCart');
route::post('/insertTransaction', 'CartController@insertTransaction');