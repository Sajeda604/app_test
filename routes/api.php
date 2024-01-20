<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestourantController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SanctumAuthController;


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
Route::post('regester',[SanctumAuthController::class,'register']);
Route::post('login',[SanctumAuthController::class,'login']);
Route::post('logout',[SanctumAuthController::class,'logout'])
  ->middleware('auth:sanctum');
//  Restourant Routes
Route::get('resturant/index',[RestourantController::class,'index']);
Route::post('resturant/search',[RestourantController::class,'search']);
Route::get('resturant/show/{id}',[ResturantController::class,'show']);
Route::get('order/index',[OrderController::class,'index']);
Route::post('order/add/{id}',[OrderController::class,'create']);
Route::post('order/update/{id}',[OrderController::class,'update']);
Route::post('order/delete/{id}',[OrderController::class,'destroy']);
