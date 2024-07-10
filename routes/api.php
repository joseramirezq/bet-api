<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\PremioSorteoController;
use App\Http\Controllers\SorteoController;
use App\Http\Controllers\GanadorController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatisticsController;


use Illuminate\Support\Facades\Route;

//Usuarios

Route::put('usuarios/desactivar/{id}', [UsuarioController::class, 'desactivar']);
Route::get('usuarios/activos', [UsuarioController::class, 'usuariosActivos']);
Route::get('usuarios/admin', [UsuarioController::class, 'usuariosAdministradores']);
Route::apiResource('usuarios', UsuarioController::class);

Route::put('premios/desactivar/{id}', [PremioController::class, 'desactivar']);
Route::get('premios/activos', [PremioController::class, 'premiosActivos']);
Route::apiResource('premios', PremioController::class);

Route::get('premiossorteos/activos', [PremioSorteoController::class, 'premiossorteosActivos']);
Route::apiResource('premiossorteos', PremioSorteoController::class);

Route::apiResource('sorteos', SorteoController::class);
Route::apiResource('ganadores', GanadorController::class);

Route::put('suscripciones/desactivar/{id}', [SuscripcionController::class, 'desactivar']);
Route::apiResource('suscripciones', SuscripcionController::class);

Route::apiResource('pagos', PagoController::class);

Route::put('sliders/desactivar/{id}', [SliderController::class, 'desactivar']);
Route::get('sliders/activos', [SliderController::class, 'slidersActivos']);
Route::apiResource('sliders', SliderController::class);


Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);
Route::get('/user', [AuthController::class, 'user'])->middleware('auth');

Route::get('/statistics', [StatisticsController::class, 'getStatistics']);