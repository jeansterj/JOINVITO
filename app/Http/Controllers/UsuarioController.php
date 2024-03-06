<?php

namespace App\Http\Controllers;

use App\Models\Rider;
use App\Models\Centro;
use App\Models\Usuario;
use App\Models\Proveedor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        // $supplierForm = $request->supplierForm;
        // $riderForm = $request->riderForm;
        // $sCenterForm = $request->sCenterForm;
        $choosedUser;
        $user = new Usuario();

        $user->email = $request->email;
        $user->pass_usu = $request->passwd;
        // IdRol falla si o si
        if ($request->filled('riderForm')) {
            $choosedUser = new Rider();

            $choosedUser->primer_apellido = $request->lastName;
            // $choosedUser->latitud = $request->latitude;
            // $choosedUser->longitud = $request->longitude;
            // $user->id_rol = $request->id_rol;
        } else if ($request->filled('supplierForm')) {

            $choosedUser = new Proveedor();

            $choosedUser->primer_apellido = $request->lastName;
            $choosedUser->nombre_negocio = $request->surname;
            $choosedUser->direccion = $request->address;
            $choosedUser->piso = $request->input('floor', null);
            $choosedUser->ciudad = $request->city;
            $choosedUser->cp = $request->cp;
        } else {

            $choosedUser = new Centro();
            $choosedUser->direccion = $request->address;
            $choosedUser->piso = $request->input('floor', null);
            $choosedUser->ciudad = $request->city;
            $choosedUser->cp = $request->cp;
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


    public function login(Request $request){

        $username = $request->email;
        $password = $request->pass;

        $user = Usuario::where('email',$username)->first();

        if($user != null && Hash::check($password,$user->pass_usu)){
            Auth::login($user);
            $response = redirect('/');

        }else{
            $request->session()->flash('error','Usuari o password incorrecte');
            $response = redirect('/login')->withInput();
        }

        return $response;

    }

    public function showLogin(){


        $user = new Usuario;

        $user->id_rol = 2;
        $user->email = 'pepe';
        $user->pass_usu = bcrypt('pepe');

        $user->save();

        return view('login.index');
    }

    public function logout(){

        Auth::logout();
        return redirect('/login');
    }
}
