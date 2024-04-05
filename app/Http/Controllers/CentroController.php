<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('SCenter.edit-center', compact('centro'));
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



        $centro->save();
        return redirect()->action([CentroController::class,'index']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Centro $centro)
    {
        //
    }
}
