<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::group(['prefix' => 'users', 'as' => 'users'], function () {
    Route::get('/',[UserController::class,'users']);
    Route::post('/load-table', [UserController::class,'index'])->name('.load-table');
    Route::post('/save-data', [UserController::class,'store'])->name('.store-data');
    Route::post('/delete-data',[UserController::class,'delete'])->name('.delete-data');
    Route::post('/load-update-form',[UserController::class,'updateform'])->name('.load-update-form');
    Route::post('/update-data', [UserController::class,'update'])->name('.update-data');
    Route::post('/search-data', [UserController::class,'search'])->name('.search-data');
});


