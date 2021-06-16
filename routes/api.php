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

Route::post('/generate-token', 'App\Http\Controllers\ChatController@getnerateToken');

Route::post('/leave-channel', 'ChatController@leaveChannel');
Route::get('/get-users', 'App\Http\Controllers\ChatController@getUsers');