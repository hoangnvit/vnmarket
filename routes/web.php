<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','Group@index')->name('home');
Route::get('/group/{id}', 'Group@show');

Route::get('/article/show/{id}','Article@show');
Route::get('/article/showbyuser','Article@showbyuser');
//Route::view('/article/form', 'articles\form');

Route::get('/article/create', 'Article@create'); 
Route::post('/article', 'Article@store')->name('create');
Route::get('/article/search', 'Article@search');
//Route::post('/article/search1', ')->name('SearchRequest');

Route::post('/article/search1', 'Article@searchPost');
//Route::post('ajaxRequest', 'Article@searchPost')->name('ajaxRequest.post');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::post('ckeditor/image_upload', 'CKEditor@upload')->name('upload');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
