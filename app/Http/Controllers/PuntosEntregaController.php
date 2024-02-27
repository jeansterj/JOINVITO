<?php

namespace App\Http\Controllers;

use App\Models\PuntosEntrega;
use Illuminate\Http\Request;

class PuntosEntregaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $puntos = PuntosEntrega::all();

        // var_dump(json_encode($puntos));
        // die();
        return json_encode($puntos);
        // return view('rider.rider_home',compact('puntos'));
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
    public function show(PuntosEntrega $puntosEntrega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PuntosEntrega $puntosEntrega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PuntosEntrega $puntosEntrega)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PuntosEntrega $puntosEntrega)
    {
        //
    }
}
