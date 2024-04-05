<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\CentroController;
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

Route::get('/login', [UsuarioController::class,'showLogin'])->name('login');
Route::post('/login', [UsuarioController::class,'login']);
Route::get('/register', function () { return view('register.index'); });

Route::get('/camera', function () {
    return view('register.cameraPage');
});
Route::middleware(['auth'])->group(function () {

    /* Admin routes */

    Route::get('admin', function () {
        return view('admin.index');
    });

    Route::get('show-users', [RiderController::class,'index']);


    Route::get('addLocation', function () {
        return view('addLocation');
    });

    /* rider routes */

    Route::get('rider', function () {
        return view('rider.index');
    });

    Route::get('ordersRider', function () {
        return view('rider.ordersRider');
    });

    Route::get('statsRider', function () {
        return view('rider.statsRider');
    });

    Route::get('edit-rider', function () {
        return view('rider.edit-rider');
    });

    Route::get('addLocation', function () {
        return view('addLocation');
    });

    Route::get('getOrders', function () {
        return view('rider.menu_selection');
    });

    /* SUPPLIER routes */

    Route::get('provider', function () {
        return view('provider.index');
    });

    Route::get('orders', function () {
        return view('provider.orders');
    });

    Route::get('edit-provider', function () {
        return view('provider.edit-provider');
    });
    Route::get('menusList', function () {
        return view('provider.menusList');
    });
    Route::get('createMenu', function () {
        return view('provider.createMenu');
    });
    Route::get('modifyMenu', function () {
        return view('provider.modifyMenu');
    });

    /* Social Center routes */

    Route::get('stats', function () {
        return view('SCenter.stats');
    });

    Route::resource('centro', CentroController::class);

    /** QR VIEWS */

    Route::get('/camera', [WebcamController::class, 'index']);

    Route::get('/qr', [QrCodeController::class, 'show']);

    /** CONTACT VIEW */
    Route::get('/contact', function () {
        return view('contact.index');
    });


    Route::resource('usuario', UsuarioController::class);

    Route::get('rider-menu-selection/{long}/{lat}', [RiderController::class,'showFavoritesNearBy']);

    Route::resource('pedido', PedidoController::class);

    Route::get('/logout', [UsuarioController::class,'logout']);

    Route::get('instructions', function () {
        return view('instructions');
    });
});

