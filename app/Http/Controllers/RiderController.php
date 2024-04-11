<?php

namespace App\Http\Controllers;

use App\Models\Punto;
use App\Models\Rider;
use App\Models\Usuario;
use App\Clases\Utilitat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

class RiderController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $id_user = Auth::user()->id_usu;
        
        $rider = Rider::where('id_rider', '=' , $id_user)->first() ;

        return view('rider.index', compact('rider'));  
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
    public function show(Rider $rider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rider $rider)
    {

        $rol = Auth::user()->id_rol;
        $riderRol = 2;
        $adminRol = 1;

        switch($rol){
            case $riderRol:
                        return view('rider.edit-rider', compact('rider'));
                        break;

            case $adminRol:
                        return view('admin.editRiderAdmin', compact('rider'));
                        break;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rider $rider)
    {

        

        $rider->nombre=$request->input('nombre');
        $rider->primer_apellido=$request->input('primer_apellido');
        $activo = $request->has('estado');

        if ($activo === true) {
            $rider->usuario->estado = 1;
        } else {
            $rider->usuario->estado= 0;
        }
        try {
            $rider->save();
            $rider->usuario->save();

            $rol = Auth::user()->id_rol;
            $riderRol = 2;
            $adminRol = 1;

            switch($rol){
                case $riderRol:
                            $response = redirect()->action([RiderController::class,'index']);
                            break;

                case $adminRol:
                            $response = redirect()->action([RiderController::class,'showRiders']);
                            break;
            }
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([RiderController::class, 'create'])->withInput();
        }
        
        return $response;
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rider $rider)
    {
        //
    }

    public function showFavoritesNearBy(Rider $rider){

        $riderId = Auth::user()->id_usu;

        $favoritosMenus = Rider::with(['favoritos.proveedor.menus'])->find($riderId);

        $favoritosMenus = $favoritosMenus->favoritos;

        // $latIni = $lat - 0.01;
        // $latFin = $lat + 0.01;
        // $longIni = $long - 0.01;
        // $longFin = $long + 0.01;


        $data = Usuario::where('id_rol',4)->get();

        $usuarios = array();

        foreach ($data as $userId) {
            array_push($usuarios,$userId->id_usu);
        }

        // $puntosCercanos = Punto::whereIn('id_usu',$usuarios)->with('usuario.proveedor.menus')->whereBetween('latitud', [$latIni, $latFin])->whereBetween('longitud', [$longIni, $longFin])->get();
        $puntosCercanos = Punto::whereIn('id_usu',$usuarios)->with('usuario.proveedor.menus')->get();


        return view('rider.menu_selection',compact('favoritosMenus','puntosCercanos'));
    }

    public function showRiders() {
       
        $riders = Rider::with('usuario.rol')->get();

        return view('admin.riders',compact('riders'));
    
    }
}
