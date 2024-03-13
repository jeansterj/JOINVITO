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

        $user->save();

        $userData = Usuario::where('email','=',$request->email)->first();


        if (isset($request->sCenterForm)) {
            $choosedUser = new Centro();

            $choosedUser->id_centro = $userData->id_usu;
            $choosedUser->direccion = $request->address;
            $choosedUser->piso = $request->input('floor', null);
            $choosedUser->ciudad = $request->city;
            $choosedUser->cp = $request->cp;

            
        } else if (isset($request->riderForm)){
            $choosedUser = new Rider();

            $choosedUser->id_rider = $userData->id_usu;
            $choosedUser->primer_apellido = $request->lastName;

            
        } else  {

            $choosedUser = new Proveedor();

            $choosedUser->id_prov = $userData->id_usu;
            $choosedUser->primer_apellido = $request->lastName;
            $choosedUser->nombre_negocio = $request->surname;
            $choosedUser->direccion = $request->address;
            $choosedUser->piso = $request->input('floor', null);
            $choosedUser->ciudad = $request->city;
            $choosedUser->cp = $request->cp;
        } 
        
            $choosedUser->nombre = $request->name;
        
            
            $choosedUser->save();
            $rol = $userData->id_rol;
        // } catch (\Throwable $th) {
        //     //throw $th;
        // }
        // var_dump($rol);
        // die();
        return redirect()->action([UsuarioController::class, 'index'], ['rol' => $rol]);
        // return redirect('/');
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

            switch(Auth::user()->rol->nombre){
              
                case 'admin':
                            $response = redirect('/rider-menu-selection');
                            break;
                
                case 'proveedor':
                            $response = redirect('provider');
                            break;

                case 'centro':
                            $response = redirect('/provider');
                            break;

                case 'rider':
                            $response = redirect('/rider-menu-selection');
                            break;
            }
            

        }else{
            $request->session()->flash('error','Usuari o password incorrecte');
            $response = redirect('/login')->withInput();
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
}
