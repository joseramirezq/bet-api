<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\SorteoController;
use App\Http\Controllers\GanadorController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
//Usuarios

Route::put('usuarios/desactivar/{id}', [UsuarioController::class, 'desactivar']);
Route::get('usuarios/activos', [UsuarioController::class, 'usuariosActivos']);
Route::apiResource('usuarios', UsuarioController::class);

Route::apiResource('premios', PremioController::class);
Route::apiResource('sorteos', SorteoController::class);
Route::apiResource('ganadores', GanadorController::class);
Route::apiResource('suscripciones', SuscripcionController::class);
Route::apiResource('pagos', PagoController::class);
Route::apiResource('sliders', SliderController::class);

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
