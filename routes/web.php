<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* main routes */


Route::get('/', function () {
    return view('index');
});

Route::get('instructions', function () {
    return view('instructions');
});

Route::get('/register', function () {
    return view('register.index');
});

Route::get('login', function () {
    return view('login.index');
});

/* rider routes */

Route::get('rider', function () {
    return view('rider.index');
});

Route::get('rider-menu', function () {
    return view('rider.menu');
});

Route::get('statsRider', function () {
    return view('rider.statsRider');
});

Route::get('edit-rider', function () {
    return view('rider.edit-rider');
});

Route::get('addLocation', function () {
    return view('rider.addLocation');
});

/* SUPPLIER routes */

Route::get('provider-menu', function () {
    return view('provider.menuProvider');
});

Route::get('orderList', function () {
    return view('provider.orderList');
});

/* Social Center routes */



Route::resource('puntos', PuntoController::class);

Route::resource('usuario', UsuarioController::class);

Route::get('rider/1/{lat?}/{long?}/update', [RiderController::class,'updateLocation'])->name('rider.updateLocation');

Route::get('rider-menu-selection', [RiderController::class,'showFavoritesNearBy']);

Route::resource('pedido', PedidoController::class);

