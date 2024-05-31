<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);

Route::get('/items',[ItemController::class,'index']);
Route::get('/items/{id}',[ItemController::class,'show']);
Route::get('/items/search/{name}',[ItemController::class,'search']);

Route::group(['middleware' => ['auth:sanctum']],function(){
        Route::post('/items',[ItemController::class,'store']); 
        Route::put('/items/{id}',[ItemController::class,'update']);
        Route::delete('/items/{id}',[ItemController::class,'destroy']);
        Route::patch('/items/{id}/claim', [ItemController::class, 'updateStatus']);
        Route::post('logout',[UserController::class,'logout']);
});