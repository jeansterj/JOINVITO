<?php

namespace App\Http\Controllers\Api;

use App\Models\Rider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RiderResource;
use App\Models\Pedido;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $riders = Rider::with(['favoritos.proveedor.menus'])->get();


        return RiderResource::collection($riders);
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rider $rider)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rider $rider)
    {
        //
    }

    public function markAsCollected($id_rider,$id_provider)
    {
    
        $listaPedidos = Pedido::where('id_provider',$id_provider)->where('id_rider',$id_rider)->get();

        foreach ($listaPedidos as $pedido) {

            $pedido->entregado_a_rider = 1;

            $pedido->save();
        }

    }
}
