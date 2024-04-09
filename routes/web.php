<?php

use App\Models\Proveedor;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PuntoController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\WebcamController;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;

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

Route::get('/qr', [QrCodeController::class, 'show']);

Route::middleware(['auth'])->group(function () {

    /* Admin routes */

    Route::get('admin', function () {
        return view('admin.index');
    });

    Route::get('show-riders', [RiderController::class,'showRiders']);
    Route::get('show-providers', [ProveedorController::class,'showProviders']);
    Route::get('show-centro', [CentroController::class,'showCentro']);
    Route::get('show-puntos', [PuntoController::class,'showPuntos']);
    Route::resource('puntos', PuntoController::class);

    Route::get('addLocation', function () {
        return view('addLocation');
    });

    /* rider routes */

    // Route::get('rider', function () {
    //     return view('rider.index');
    // });

    Route::get('ordersRider', function () {
        return view('rider.ordersRider');
    });

    Route::get('statsRider', function () {
        return view('rider.statsRider');
    });

    // Route::get('edit-rider', function () {
    //     return view('rider.edit-rider');
    // });

    Route::get('addLocation', function () {
        return view('addLocation');
    });

    Route::get('getOrders', function () {
        return view('rider.menu_selection');
    });

    Route::resource('rider', RiderController::class);


    // Routes Provider

    Route::get('orders', function () {
        return view('provider.orders');
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

    Route::resource('proveedor', ProveedorController::class);

    Route::resource('menu', MenuController::class);



    /* Social Center routes */

    Route::get('stats', function () {
        return view('SCenter.stats');
    });

    Route::resource('centro', CentroController::class);

    /** QR VIEWS */

    Route::get('/camera', [WebcamController::class, 'index']);

    // Route::get('/qr', [QrCodeController::class, 'show']);

    /** CONTACT VIEW */
    Route::get('/contact', function () {
        return view('contact.index');
    });


    Route::resource('usuario', UsuarioController::class);

    // Route::get('rider-menu-selection/{long}/{lat}', [RiderController::class,'showFavoritesNearBy']);
    Route::get('rider-menu-selection', [RiderController::class,'showFavoritesNearBy']);

    Route::resource('pedido', PedidoController::class);

    Route::get('/logout', [UsuarioController::class,'logout']);

    Route::get('instructions', function () {
        return view('instructions');
    });
});

