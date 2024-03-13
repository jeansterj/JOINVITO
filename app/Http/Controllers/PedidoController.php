<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
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
        $pedido = new Pedido();


        $pedido->id_rider = $request->id_rider;
        $pedido->id_menu = $request->id_menu;
        $pedido->cantidad_packs = $request->cantidad;
        $pedido->fecha = date('y-m-d');
        $pedido->entregado_a_rider = false;

        $pedido->save();

        return redirect('rider-menu-selection');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
