<?php

namespace App\Http\Controllers;

use App\Models\Punto;
use App\Models\Rider;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rider $rider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rider $rider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rider $rider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rider $rider)
    {
        //
    }

    public function showFavoritesNearBy(Rider $rider){

        $riderId = Auth::user()->id_usu;

        $favoritosMenus = Rider::with(['favoritos.proveedor.menus'])->find($riderId);

        $favoritosMenus = $favoritosMenus->favoritos;

        $latIni = 41.3888845 - 0.01;
        $latFin = 41.3888845 + 0.01;
        $longIni = 2.1706315 - 0.01;
        $longFin = 2.1706315 + 0.01;

        $data = Usuario::where('id_rol',4)->get();

        $usuarios = array();

        foreach ($data as $userId) {
            array_push($usuarios,$userId->id_usu);
        }

        $cercanosMenus = Punto::whereIn('id_usu',$usuarios)->with('usuario.proveedor.menus')->whereBetween('latitud', [$latIni, $latFin])->whereBetween('longitud', [$longIni, $longFin])->get();


        return view('rider.menu_selection',compact('favoritosMenus','cercanosMenus'));
    }

    public function updateLocation(Rider $rider){

        
    }
}
