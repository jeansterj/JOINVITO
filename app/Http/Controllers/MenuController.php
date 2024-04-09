<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;
use App\Http\Controllers\ProveedorController;

class MenuController extends Controller
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
        return view('provider.createMenu');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        $menu = new Menu();
        $id_user = Auth::user()->id_usu;

        $menu->nombre_menu = $request->input('nombre_menu');
        $menu->bebida = $request->input('drink');
        $menu->plato1 = $request->input('plate1');
        $menu->plato2 = $request->input('plate2');
        $menu->cantidad_packs = $request->input('amount');
        $menu->id_prov = $id_user;
        $menu->fecha_alta = date("Y-m-d");

    
        // $menu->save();

        try 
        {
            $menu->save();
            $response = redirect()->action([ProveedorController::class, 'index']);
        } catch (QueryException $ex)
        {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([ProveedorController::class, 'index'])->withInput();
        }
        


        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(Menus $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        return view('provider.modifyMenu', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menus $menu)
    {

        
        $menu->nombre_menu = $request->input('nombre_menu');
        $menu->bebida = $request->input('drink');
        $menu->plato1 = $request->input('plate1');
        $menu->plato2 = $request->input('plate2');
        $menu->cantidad_packs = $request->input('amount');

        try 
        {
            $menu->save();
            $response = redirect()->action([ProveedorController::class, 'index']);
        } catch (QueryException $ex)
        {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([ProveedorController::class, 'index'])->withInput();
        }
        
    
        // $menu->save();

        return $response;    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menus $menu)
    {
        //
    }
}
