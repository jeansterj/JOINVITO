<?php

namespace App\Http\Controllers\Api;

use App\Models\Punto;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PuntoResource;
use Illuminate\Database\QueryException;

class PuntoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $puntos = Punto::all()->where('fecha_baja','=',null);
        $puntos = Punto::with('usuario.proveedor.menus')->with('usuario.centro')->where('fecha_baja','=',null)->get();

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

        try 
        {
            $punto->save();
            $response = (new PuntoResource($punto))
                        ->response()
                        ->setStatusCode(201);
        } catch (QueryException $ex)
        {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = \response()
                        ->json(['error' => $mensaje], 400);
            // $response = redirect()->action([CiclesController::class, 'create'])->withInput();
        }
        
        return $response;
        
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
