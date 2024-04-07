<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id_user = Auth::user()->id_usu;
        
        $proveedor = Proveedor::where('id_prov', '=' , $id_user)->first() ;

        return view('provider.index', compact('proveedor'));    }

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
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        return view('provider.edit-provider', compact('proveedor'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
 
        $proveedor->nombre=$request->input('nombre');
        $proveedor->primer_apellido=$request->input('primer_apellido');
        $proveedor->nombre_negocio=$request->input('nombre_negocio');
        $proveedor->direccion=$request->input('direccion');
        $proveedor->piso=$request->input('piso');
        $proveedor->ciudad=$request->input('ciudad');
        $proveedor->cp=$request->input('cp');



        $proveedor->save();
        return redirect()->action([ProveedorController::class,'index']);    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }
}
