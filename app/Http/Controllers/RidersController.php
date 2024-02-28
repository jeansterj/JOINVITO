<?php

namespace App\Http\Controllers;

use App\Models\Riders;
use Illuminate\Http\Request;

class RidersController extends Controller
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
    public function show(Riders $riders)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Riders $riders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Riders $riders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Riders $riders)
    {
        //
    }

    public function showFavorites(){

        //$favoritos = Favoritos::select('id_menu','bebida','plato1','plato2','cantidad_packs')->join('Proveedores','Proveedores.id_prov','=','id_prov')->join('Menus','Proveedores.id_prov','=','Menus.id_prov')->where('id_rider','=',1)->distinct()->get();

        // $favoritos = Riders::select('id_menu','bebida','plato1','plato2','cantidad_packs')->join('Proveedores','Proveedores.id_prov','=','id_prov')->join('Menus','Proveedores.id_prov','=','Menus.id_prov')->where('id_rider','=',1)->distinct()->get();

        $favoritos = Riders::where('id_rider','=',1)->with('menus')->distinct()->get();

        var_dump($favoritos[0]);
        die();

        return view('rider.menu_selection',compact('favoritos'));
    }
}
