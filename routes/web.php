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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/article', 'HomeController@addarticle')->name('addarticle');
Route::post('/article', 'HomeController@postarticle')->name('postarticle');
// ADD article
Route::get('/article/add', 'HomeController@tambaharticle')->name('tambaharticle');

// detail article
Route::get('/detail/article/{id}', 'HomeController@detailarticle')->name('detailarticle');
Route::get('/edit/article/{id}', 'HomeController@editarticle')->name('editarticle');
Route::post('/edit/article/{id}', 'HomeController@posteditarticle')->name('posteditarticle');

// 
Route::get('/people', 'HomeController@people')->name('people');
Route::get('/peopletable', 'HomeController@peopletable')->name('peopletable');
Route::post('/people/detail/{id}', 'HomeController@peopledetail')->name('peopledetail');
Route::post('/people/edit/{id}', 'HomeController@peopleedit')->name('peopleedit');
Route::post('/people/add', 'HomeController@addpeople')->name('addpeople');
Route::delete('/people/delete/{id}', 'HomeController@deletepeople')->name('deletepeople');
