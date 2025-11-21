<?php

use App\Http\Controllers\Api\asistencia\asistenciaController;
use App\Http\Controllers\Api\eventos\eventosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\perfiles\perfilesController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\programa\programacontroller;
use App\Http\Controllers\Api\ficha\fichaController;
use App\Http\Controllers\Api\horarios\horariosController;
use App\Http\Controllers\Api\jornadas\jornadasController;
use App\Http\Controllers\Api\motivos\motivosController;
use App\Http\Controllers\Api\salas\salascontroller;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('User')->group(function () {
    Route::get('/', [UserController::class, 'index']);
    Route::post('/create', [UserController::class, 'store']);
    Route::delete('/', [UserController::class, 'destroy']);
});

Route::prefix('Perfiles')->group(function () {
    Route::post('/create', [perfilesController::class, 'store']);
    Route::get('/', [perfilesController::class, 'index']);
    Route::delete('/delete/{id}', [perfilesController::class, 'deleteficha']);
});

Route::prefix('Programa')->group(function () {
    Route::get('/', [programacontroller::class, 'index']);
    Route::post('/create', [programacontroller::class, 'store']);
    Route::delete('/delete/{id}', [programacontroller::class, 'destroy']);
});

Route::prefix('ficha')->group(function () {
    Route::get('/', [FichaController::class, 'index']);
    Route::post('/create', [fichaController::class, 'store']);
    Route::delete('/delete/{id}', [FichaController::class, 'destroy']);
});

Route::prefix('horarios')->group(function () {
    Route::get('/', [horariosController::class, 'index']);
    Route::post('/create', [horariosController::class, 'store']);
    Route::delete('/delete/{id}', [horariosController::class, 'destroy']);
});

Route::prefix('jornadas')->group(function () {
    Route::get('/', [jornadasController::class, 'index']);
    Route::post('/create', [jornadasController::class, 'store']);
    Route::delete('/delete/{id}', [jornadasController::class, 'destroy']);
});

Route::prefix('motivos')->group(function () {
    Route::get('/', [motivosController::class, 'index']);
    Route::post('/create', [motivosController::class, 'store']);
    Route::delete('/delete/{id}', [motivosController::class, 'destroy']);
});

Route::prefix('salas')->group(function () {
    Route::get('/', [salascontroller::class, 'index']);
    Route::post('/create', [salascontroller::class, 'store']);
    Route::delete('/delete/{id}', [salascontroller::class, 'destroy']);
});

Route::prefix('eventos')->group(function () {
    Route::get('/', [eventosController::class, 'index']);
    Route::post('/create', [eventosController::class, 'store']);
    Route::delete('/delete/{id}', [eventosController::class, 'destroy']);
});

Route::prefix('asistencia')->group(function () {
    Route::get('/', [asistenciaController::class, 'index']);
    Route::get('/total', [asistenciaController::class, 'total']);
    Route::post('/create', [asistenciaController::class, 'store']);
    Route::delete('/delete/{id}', [asistenciaController::class, 'destroy']);
});
