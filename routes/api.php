<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\ChartController;
use App\Http\Controllers\Api\PuntoController;
use App\Http\Controllers\Api\RiderController;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\QrCodeController;
use App\Http\Controllers\Api\EntregaController;



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


// Route::post('qrCode/{id}', function ($id) {

// });
Route::apiResource('qrCode', QrCodeController::class);
// Route::get('qrCode/{idRider}/{idProv}', [QrCodeController::class, 'show']);
// Route::get('qrCode', [QrCodeController::class,'show']);
Route::put('pedidos/{id_rider}/{id_provider}', [RiderController::class,'markAsCollected']);
Route::apiResource('menu', MenuController::class);

Route::get('bar-chart/{userType}/{userId}/{year}', [ChartController::class, 'barChart']);
