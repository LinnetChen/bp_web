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



// 事前預約
// Route::get('/', function () {
//     return view('front/prereg');
// });



Route::get('/index', 'indexController@index')->name('index');
Route::get('/', 'indexController@index');


Route::post('ckeditor/upload','CkeditorUploadController@uploadImage');
Route::post('filepath', 'CkeditorUploadController@getImage')->name('filePath');
