<?php

namespace App\Http\Controllers\Api;

use App\Models\Punto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PuntoResource;

class PuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puntos = Punto::all()->where('fecha_baja','=',null);

        return PuntoResource::collection($puntos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $punto = new Punto();


        $punto->direccion = $request->direccion;
        $punto->latitud = $request->latitud;
        $punto->longitud = $request->longitud;
        $punto->cantidad_personas = $request->cantidad_personas;
        $punto->fecha_inactivo = $request->fecha_inactivo;
        $punto->fecha_alta = $request->fecha_alta;
        $punto->fecha_baja = $request->fecha_baja;
        $punto->puntos = $request->puntos;
        $punto->tipo = $request->tipo;
        $punto->id_usu = $request->id_usu;

        $punto->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Punto $punto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Punto $punto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Punto $punto)
    {
        //
    }
}
