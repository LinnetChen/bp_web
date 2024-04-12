<?php

use App\Http\Controllers\API\preregController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('prereg', 'API\preregController@index')->name('event.prereg');
Route::post('announcement', 'API\announcementController@index');
Route::post('content', 'API\announcementController@content');
Route::post('digeamIndexNews', 'API\DigeamController@IndexNews')->name('IndexNews');
