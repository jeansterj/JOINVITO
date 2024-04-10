<?php

namespace App\Http\Controllers;

use App\Models\Rider;
use App\Models\Centro;
use App\Models\Usuario;
use App\Clases\Utilitat;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Symfony\Component\HttpFoundation\Response;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $rol = $request->input('rol');
        //
        $riderRol = 2;
        $centerRol = 3;
        $supplierRol = 4;

        switch($rol){
            case $riderRol:
                        return view('register.index');
                        break;

            case $centerRol:
                        return view('register.index');
                        break;

            case $supplierRol:
                        return view('register.index');
                        break;
        }
        // return view('register.index');
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
        // $riderRol = 2;
        // $centerRol = 3;
        // $supplierRol = 4;

        // try {
        $user = new Usuario();

        $user->email = $request->email;
        $user->pass_usu = bcrypt($request->passwd);
        $user->id_rol = $request->rol;
        $user->estado = true;

        $user->save();

        $userData = Usuario::where('email','=',$request->email)->first();


        if (isset($request->sCenterForm)) {
            $choosedUser = new Centro();

            $choosedUser->id_centro = $userData->id_usu;
            $choosedUser->direccion = $request->address;
            $choosedUser->piso = $request->input('floor', null);
            $choosedUser->ciudad = $request->city;
            $choosedUser->cp = $request->cp;

            $response = redirect()->action([CentroController::class,'showCentro']);

        } else if (isset($request->riderForm)){
            $choosedUser = new Rider();

            $choosedUser->id_rider = $userData->id_usu;
            $choosedUser->primer_apellido = $request->lastName;
            
            //respuesta
            $response = redirect()->action([RiderController::class,'showRiders']);


        } else  {

            $choosedUser = new Proveedor();

            $choosedUser->id_prov = $userData->id_usu;
            $choosedUser->primer_apellido = $request->lastName;
            $choosedUser->nombre_negocio = $request->surname;
            $choosedUser->direccion = $request->address;
            $choosedUser->piso = $request->input('floor', null);
            $choosedUser->ciudad = $request->city;
            $choosedUser->cp = $request->cp;

            $response = redirect()->action([ProveedorController::class,'showProviders']); 

        }

            $choosedUser->nombre = $request->name;

        try {
            $choosedUser->save();
            $rol = $userData->id_rol;
        
            $response = redirect()->action([UsuarioController::class, 'index'], ['rol' => $rol]);
        } catch (QueryException $ex) {
            $mensaje = Utilitat::errorMessage($ex);
            $request->session()->flash('error', $mensaje);
            $response = redirect()->action([UsuarioController::class, 'index'])->withInput();
        }
        return $response;
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

        $user = Usuario::where('email', $username)->first();
    
        if ($user && Hash::check($password, $user->pass_usu)) {
            Auth::login($user);
            switch (Auth::user()->rol->nombre) {
                case 'admin':
                    $response = redirect('/admin');
                    break;
    
                case 'proveedor':
                    $response = redirect()->action([ProveedorController::class, 'index']);
                    break;
    
                case 'centro':
                    $response = redirect()->action([CentroController::class, 'index']);
                    break;
    
                case 'rider':
                    $response = redirect()->action([RiderController::class, 'index']);
                    break;
            }
        } else {
            $response = redirect()->back()->withInput()->withErrors(['error' => 'Usuario o contraseña incorrectos']);
        }

        return $response;
    }

    public function showLogin(){


        // $user = new Usuario;

        // $user->id_rol = 2;
        // $user->email = 'pepe';
        // $user->pass_usu = bcrypt('pepe');

        // $user->save();

        return view('auth.login');
    }

    public function logout(){

        Auth::logout();
        return redirect('/');
    }

    private function userRedirect(){

    }

    public function showUsers(){

        $usuarios = Usuario::all();

        return view('admin.users', compact('usuarios'));
        
    }
}
