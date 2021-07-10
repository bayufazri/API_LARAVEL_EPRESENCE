<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/login', 'Api\AuthController@login')->name('auth.login');
Route::get('epresences', 'Api\EpresenceController@getAllEpresences');
Route::get('epresences/{id}', 'Api\EpresenceController@getEpresence');
Route::post('epresences', 'Api\EpresenceController@createEpresence');
Route::put('epresences/{id}', 'Api\EpresenceController@updateEpresence');
Route::delete('epresences/{id}','Api\EpresenceController@deleteEpresence');

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
Route::post('/logout', 'Api\AuthController@logout');