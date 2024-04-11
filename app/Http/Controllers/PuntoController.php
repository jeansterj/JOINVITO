<?php

namespace App\Http\Controllers;

use App\Models\Punto;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class PuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puntos = Punto::all()->where('fecha_baja','=',null);

        return $puntos;
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
    public function show(Punto $punto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Punto $punto)
    {
        return view('admin.editPunto', compact('punto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Punto $punto)
    {
        $punto->direccion=$request->input('direccion');
        $punto->personas=$request->input('cantidad_personas');
        $punto->alta=$request->input('fecha_alta');
        $punto->inactivo=$request->input('fecha_baja');
        
        $punto->tipo=$request->input('tipo');
        $activo = $request->has('estado');

        if ($activo === true) {
            $punto->estado = 1;
        } else {
            $punto->estado= 0;
        }
                
        try {
            $punto->save();
            $response = redirect()->action([PuntoController::class,'showPuntos']);
                           
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([PuntoController::class, 'update'])->withInput();
        }
        
        return $response;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Punto $punto)
    {
        //
    }

    public function showPuntos()
    {
        $puntos = Punto::all()->where('fecha_baja','=',null);

        return view('admin.puntos', compact('puntos'));
    }

}
