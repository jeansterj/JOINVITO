<?php

namespace App\Http\Controllers;

use App\Models\Punto;
use Illuminate\Http\Request;

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
        //
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
