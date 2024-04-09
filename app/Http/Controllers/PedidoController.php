<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Pedido;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
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
        
        $menu = new Menu();
 
        DB::beginTransaction();

        try{

            $pedido = Pedido::where('id_menu',$request->id_menu)->first();

            if($pedido != null){
                $pedido->id_rider = $request->id_rider;
                $pedido->id_provider = $request->id_provider;
                $pedido->id_menu = $request->id_menu;
                $pedido->cantidad_packs = $pedido->cantidad_packs + $request->cantidad;
                $pedido->fecha = date('y-m-d');
                $pedido->entregado_a_rider = false;
            }else{
                
                $pedido = new Pedido();

                $pedido->id_rider = $request->id_rider;
                $pedido->id_provider = $request->id_provider;
                $pedido->id_menu = $request->id_menu;
                $pedido->cantidad_packs = $request->cantidad;
                $pedido->fecha = date('y-m-d');
                $pedido->entregado_a_rider = false;
            }

            

            $pedido->save();

            $menu = Menu::find($pedido->id_menu);
            

            $menu->nombre_menu = $menu->nombre_menu;
            $menu->bebida = $menu->bebida;
            $menu->plato1 = $menu->plato1;
            $menu->plato2 = $menu->plato2;
            $menu->cantidad_packs = ($menu->cantidad_packs - $pedido->cantidad_packs);
            $menu->id_prov = $menu->id_prov;
            $menu->fecha_alta = $menu->fecha_alta;

            $menu->save();
            DB::commit();
            // $response = redirect('ordersRider');

        }
        catch(QueryException $ex){
            DB::rollback();
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            // $response = redirect('ordersRider');
        }
        

        return redirect('ordersRider');;
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
