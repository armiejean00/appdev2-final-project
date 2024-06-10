<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClaimedItemController;
use App\Http\Controllers\LocationController;
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

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});

Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login');

// Route::get('/users', [UserController::class, 'index']);
// Route::get('/users/{id}', [UserController::class, 'show']);
// Route::get('/users/search/{firstname}', [UserController::class, 'search']);

// Route::get('/items', [ItemController::class, 'index']);
// Route::get('/items/{id}', [ItemController::class, 'show']);
// Route::get('/items/search/{name}', [ItemController::class, 'search']);

Route::middleware(['auth:sanctum'])->group(function () {


    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/users/search/{firstname}', [UserController::class, 'search']);

    Route::get('/items', [ItemController::class, 'index']);
    Route::get('/items/{id}', [ItemController::class, 'show']);
    Route::get('/items/search/{name}', [ItemController::class, 'search']);
        
    Route::middleware(['admin'])->group(function () {
        Route::post('/items', [ItemController::class, 'store']);
        Route::put('/items/{id}', [ItemController::class, 'update']);
        Route::delete('/items/{id}', [ItemController::class, 'destroy']);

        Route::apiResource('categories', CategoryController::class);
        Route::apiResource('locations', LocationController::class);

       
      
    });

    Route::middleware(['user'])->group(function () {
        Route::patch('/items/{id}/claim', [ItemController::class, 'updateStatus']);
        Route::get('/claimed-items', [ClaimedItemController::class, 'getClaimedItems']);

    });

     Route::post('logout', [UserController::class, 'logout']);
});