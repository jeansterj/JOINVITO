<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\WebcamController;
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


Route::get('/register', function () {
    return view('register.index');
});
Route::get('/camera', function () {
    return view('register.cameraPage');
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

Route::get('provider', function () {
    return view('provider.index');
});

Route::get('provider-menu', function () {
    return view('provider.menuProvider');
});

Route::get('edit-provider', function () {
    return view('provider.editProvider');
});
Route::get('orderList', function () {
    return view('provider.orderList');
});
Route::get('create-menu', function () {
    return view('provider.createMenu');
});
Route::get('modify-menu', function () {
    return view('provider.modifyMenu');
});

/* Social Center routes */

Route::get('/camera', [WebcamController::class, 'index']);

// Route::get('/qr', [QrCodeController::class, 'show']);

Route::resource('usuario', UsuarioController::class);

Route::get('rider-menu-selection', [RiderController::class,'showFavoritesNearBy']);

Route::resource('pedido', PedidoController::class);

Route::get('scenter-menu', function () {
    return view('SCenter.menuSCenter');
});

Route::get('stats', function () {
    return view('SCenter.stats');
});

Route::get('edit-rider', function () {
    return view('SCenter.edit-rider');
});

Route::get('addLocation', function () {
    return view('rider.addLocation');
});

Route::get('social-center', function () {
    return view('SCenter.index');
});


Route::get('/login', [UsuarioController::class,'showLogin'])->name('login');
Route::post('/login', [UsuarioController::class,'login']);
Route::get('/logout', [UsuarioController::class,'logout']);

Route::middleware(['auth'])->group(function () {

    Route::get('instructions', function () {
        return view('instructions');
    });
});