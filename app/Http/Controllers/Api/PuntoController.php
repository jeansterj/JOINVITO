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
