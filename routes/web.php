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

Route::get('/', function () {
    return view('index');
});

Route::get('/register', function () {
    return view('register.index');
});

Route::get('login', function () {
    return view('login.index');
});
Route::get('rider', function () {
    return view('rider.index');
});

Route::resource('puntos', PuntoController::class);

Route::resource('usuario', UsuarioController::class);

Route::get('rider/1/{lat?}/{long?}/update', [RiderController::class,'updateLocation'])->name('rider.updateLocation');

Route::get('rider-menu-selection', [RiderController::class,'showFavoritesNearBy']);

Route::resource('pedido', PedidoController::class);

Route::get('rider-menu', function () {
    return view('rider.menu');
});

Route::get('stats', function () {
    return view('rider.stats');
});

Route::get('edit-rider', function () {
    return view('rider.edit-rider');
});

Route::get('addLocation', function () {
    return view('rider.addLocation');
});