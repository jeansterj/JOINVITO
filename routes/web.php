<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PuntosController;

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
Route::get('/register2', function () {
    return view('registerSupplier');

});

Route::get('rider-home', function () {
    return view('rider.rider_home');
});
Route::get('login', function () {
    return view('login.index');
});

Route::resource('puntos', PuntosController::class);
