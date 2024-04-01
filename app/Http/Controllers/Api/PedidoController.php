<?php

namespace App\Http\Controllers\Api;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PedidoResource;

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
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $pedido->id_pedido = $request->id_pedido;
        $pedido->id_rider = $request->id_rider;
        $pedido->id_menu = $request->id_menu;
        $pedido->cantidad_packs = $request->cantidad_packs;
        $pedido->fecha = $request->fecha;
        $pedido->entregado_a_rider = $request->entregado_a_rider;

        $pedido->save();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
    }

    public function getOrdersRider($riderId)
    {

        $pedidos = Pedido::where('id_rider',$riderId)->where('cantidad_packs','>',0)->get();

        return PedidoResource::collection($pedidos);

    }

}
