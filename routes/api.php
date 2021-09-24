<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::resource('react-api', TaskController::class);    
    Route::post("filter",[App\Http\Controllers\TaskController::class,'showData']);

    Route::put("filter/{req}",[App\Http\Controllers\TaskController::class,'filter']);
});

Route::post("login",[App\Http\Controllers\TaskController::class,'login']);
Route::post("register",[App\Http\Controllers\TaskController::class,'register']);



