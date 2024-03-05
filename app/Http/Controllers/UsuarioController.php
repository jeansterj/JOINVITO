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
        $supplierForm = $request->supplierForm;
        $riderForm = $request->riderForm;
        $sCenterForm = $request->sCenterForm;
        $choosedUser;
        $user = new Usuario();
        if ($riderForm) {
            $choosedUser = new Rider();
        } else if ($supplierForm) {
            $choosedUser = new Proveedor();
            $choosedUser->surname = $request->surname;
            $choosedUser->company = $request->company;
            $choosedUser->direction = $request->direction;
            $choosedUser->floor = $request->input('floor', null);
            $choosedUser->city = $request->city;
            $choosedUser->postalCode = $request->postalCode;
        } else {
            $choosedUser = new Centro();
        }
        $choosedUser->email = $request->email;
        $choosedUser->password = bcrypt($request->password);
        $choosedUser->name = $request->name;


        $user->name = $request->name;
        $user->password = $request->password;
        
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
