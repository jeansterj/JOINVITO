<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class CentroController extends Controller
{

    public function index()
    {
        $id_user = Auth::user()->id_usu;
        
        $centro = Centro::where('id_centro', '=' , $id_user)->first() ;

        return view('SCenter.index', compact('centro'));
    }

    /**
     * Display a listing of the resource.
     */
    public function showCenter(Request $request)
    
    {
        $id_user = Auth::user()->id_usu;
        
        $centros = Centro::where('id_centro', '=' , $id_user)->get() ;

        return view('SCenter.edit-center', compact('centros'));
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
    public function show(Centro $centro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centro $centro)
    {
        $rol = Auth::user()->id_rol;
        $centerRol = 3;
        $adminRol = 1;

        switch($rol){
            case $centerRol:
                        return view('SCenter.edit-center', compact('centro'));
                        break;

            case $adminRol:
                return view('admin.editCentroAdmin', compact('centro'));
                        break;
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centro $centro)
    {
        
        $centro->nombre=$request->input('nombre');
        $centro->direccion=$request->input('direccion');
        $centro->piso=$request->input('piso');
        $centro->ciudad=$request->input('ciudad');
        $centro->cp=$request->input('cp');
        $activo = $request->has('estado');

        if ($activo === true) {
            $centro->usuario->estado = 1;
        } else {
            $centro->usuario->estado= 0;
        }

        try 
        {
            $centro->save();
            $centro->usuario->save();

            $rol = Auth::user()->id_rol;
            $centerRol = 3;
            $adminRol = 1;
    
            switch($rol){
                case $centerRol:
                    $response = redirect()->action([CentroController::class,'index']);
                            break;
    
                case $adminRol:
                    $response = redirect()->action([CentroController::class,'showCentro']);
                            break;
            }
        } catch (QueryException $ex)
        {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([CentroController::class, 'index'])->withInput();
        }
        
        return $response;
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centro $centro)
    {
        //
    }

    public function showCentro() {
       
        $centros = Centro::with('usuario.rol')->get();

        return view('admin.centros',compact('centros'));
    
    }
}
