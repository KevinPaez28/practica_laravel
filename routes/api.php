<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\perfiles\perfilesController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\programa\programacontroller;
use App\Http\Controllers\Api\ficha\fichaController;
Route::get('/user', function (Request $request) {
    return $request->user();
}); 

Route::prefix('User')->group(function () {
    Route::get('/', [UserController::class,'index']);
    Route::post('/create', [UserController::class,'store']);
    Route::delete   ('/create', [UserController::class,'destroy']);
});


Route::prefix('Perfiles')->group(function () {
    Route::post('/create', [perfilesController::class,'store']);
});

Route::prefix('Programa')->group(function () {
    Route::post('/create', [programacontroller::class,'store']);
});

Route::prefix('ficha')->group(function () {
    Route::post('/create', [fichaController::class,'store']);
});
