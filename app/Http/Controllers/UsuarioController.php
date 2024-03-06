<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Centro;
use App\Models\Rider;
use App\Models\Proveedor;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Value of bd.
        $riderRol = 2;
        $centerRol = 3;
        $supplierRol = 4;
        $choosedUser;
        $user = new Usuario();
        
        $user->email = $request->email;
        $user->pass_usu = $request->passwd;

        if (isset($request->sCenterForm)) {
            $choosedUser = new Centro();

            $choosedUser->direccion = $request->address;
            $choosedUser->piso = $request->input('floor', null);
            $choosedUser->ciudad = $request->city;
            $choosedUser->cp = $request->cp;

            $user->id_rol = $centerRol;

        } else if (isset($request->riderForm)){
            $choosedUser = new Rider();

            $choosedUser->primer_apellido = $request->lastName;

            $user->id_rol = $riderRol;
        } else  {

            $choosedUser = new Proveedor();

            $choosedUser->primer_apellido = $request->lastName;
            $choosedUser->nombre_negocio = $request->surname;
            $choosedUser->direccion = $request->address;
            $choosedUser->piso = $request->input('floor', null);
            $choosedUser->ciudad = $request->city;
            $choosedUser->cp = $request->cp;

            $user->id_rol = $supplierRol;

        } 
        
        $choosedUser->nombre = $request->name;
        // try {
            $choosedUser->save();
            $user->save();
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
