<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
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
        $supplierForm = $request->supplierForm;
        $riderForm = $request->riderForm;
        $sCenterForm = $request->sCenterForm;
        $user;
        if ($riderForm) {
            $user = new Rider();
        } else if ($supplierForm) {
            $user = new Proveedor();
            $user->surname = $request->surname;
            $user->company = $request->company;
            $user->direction = $request->direction;
            $user->floor = $request->input('floor', null);
            $user->city = $request->city;
            $user->postalCode = $request->postalCode;
        } else {
            $user = new Center();
        }
        // $user = new Usuario();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->name = $request->name;

        // try {
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
