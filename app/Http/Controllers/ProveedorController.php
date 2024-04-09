<?php

namespace App\Http\Controllers;

use App\Clases\Utilitat;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;


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
        $rol = Auth::user()->id_rol;
        $providerRol = 4;
        $adminRol = 1;

        switch($rol){
            case $providerRol:
                return view('provider.edit-provider', compact('proveedor'));
                        break;

            case $adminRol:
                        return view('admin.editProviderAdmin', compact('proveedor'));
                        break;
        }
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

        // $proveedor->save();

        // $rol = Auth::user()->id_rol;
        // $providerRol = 4;
        // $adminRol = 1;


        try {
            $proveedor->save();

            $rol = Auth::user()->id_rol;
            $providerRol = 4;
            $adminRol = 1;

            switch($rol){
                case $providerRol:
                            $response = redirect()->action([ProveedorController::class,'index']);    
                            break;
    
                case $adminRol:
                            $response = redirect()->action([ProveedorController::class,'showProviders']); 
                            break;
            }
        } catch (QueryException $ex)
        {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([ProveedorController::class, 'index']);
        }

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proveedor $proveedor)
    {
        //
    }

    public function showProviders() {
       
        $providers = Proveedor::with('usuario.rol')->get();

        return view('admin.providers',compact('providers'));
    
    }
}
