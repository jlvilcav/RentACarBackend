<?php

use App\Http\Controllers\Vehiculo\MarcaVehiculoController;
use App\Http\Controllers\Vehiculo\ModeloVehiculoController;
use App\Http\Controllers\Vehiculo\CaracteristicaController;
use App\Http\Controllers\Vehiculo\VehiculoController;
use App\Http\Controllers\Maestros\TablaMaestraController;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Afiliado\AfiliadoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rutas para MarcaVehiculo
Route::apiResource('marcas-vehiculos', MarcaVehiculoController::class);

// Rutas ModeloVehiculo
Route::apiResource('modelos-vehiculos', ModeloVehiculoController::class);

// Rutas Tablas Maestras
Route::apiResource('tablas-maestras', TablaMaestraController::class);

// Rutas Clientes
Route::apiResource('clientes', ClienteController::class);

// Rutas Afiliados
Route::apiResource('afiliados', AfiliadoController::class);

// Rutas Vehiculo
Route::apiResource('vehiculos', VehiculoController::class);

// Ritas Caracteristicas
Route::apiResource('caracteristicas', CaracteristicaController::class);
