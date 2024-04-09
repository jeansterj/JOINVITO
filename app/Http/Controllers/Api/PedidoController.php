<?php

namespace App\Http\Controllers\Api;

use App\Models\Pedido;
use App\Models\Entrega;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PedidoResource;
use Illuminate\Database\QueryException;

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

        try 
        {
            $pedido->save();

            $entrega = new Entrega();

            $entrega->id_pedido = $request->id_pedido;
            $entrega->id_punto = $request->id_punto;
            $entrega->cantidad_packs = $request->entregados;
            $entrega->fecha = $request->fecha;
            $entrega->entregado = true;

            $entrega->save();
            $response = (new PedidoResource($pedido))
                        ->response()
                        ->setStatusCode(201);
        } catch (QueryException $ex)
        {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = \response()
                        ->json(['error' => $mensaje], 400);
            // $response = redirect()->action([CiclesController::class, 'create'])->withInput();
        }
        
        return $response;


        

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

        $pedidos = Pedido::with('menu.proveedor')->where('id_rider',$riderId)->where('cantidad_packs','>',0)->get();

        return PedidoResource::collection($pedidos);

    }

}
