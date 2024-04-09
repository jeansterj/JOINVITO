<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\PuntoController;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\EntregaController;
use App\Http\Controllers\Api\RiderController;



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

Route::get('menus/provider/{provId}', [MenuController::class,'getMenusProvider']);
Route::get('orders/provider/{provId}', [MenuController::class,'getOrdersProvider']);
Route::get('orders/rider/{riderId}', [PedidoController::class,'getOrdersRider']);

Route::apiResource('puntos', PuntoController::class);
Route::apiResource('entregas', EntregaController::class);
Route::apiResource('pedidos', PedidoController::class);
Route::put('pedidos/{id_rider}/{id_provider}', [RiderController::class,'markAsCollected']);
