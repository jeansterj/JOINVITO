@extends('layouts.main')

@section('navbar')
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <img src="{{ asset('img/menuCorto.svg') }}" alt="">
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">HOME</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">ABOUT US</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">CONTACT</a>
            </li>
            @if (Auth::check() &&
                    (Auth::user()->rol->nombre == 'admin' ||
                        Auth::user()->rol->nombre == 'rider' ||
                        Auth::user()->rol->nombre == 'centro'))
                <a class="nav-link" href="{{ url('/logout') }}" aria-expanded="false">Logout</a>
            @else
                <a class="nav-link" href="{{ url('/login') }}" aria-expanded="false"><button type="button"
                        class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}"
                            alt="">Login</button></a>
                <button type="button" class="btn btn-signup">Sign up</button>
            @endif
        </ul>
    </div>
@endsection

@section('content')
    <div class="container">
        <div class="row margin-top text-center">
            <h2>CHANGE INFO CENTER</h2>
            <img class="rider-logo" src="{{ asset('img/riderIcono.svg') }}" alt="">
            <div class="bg-secondary section-form">
                <form class="registerForm" action="{{ action([App\Http\Controllers\CentroController::class, 'update'], ['centro' => $centro->id_centro]) }}" method="POST">
                    @csrf
                    @method('PUT')


                    

                        
                    <input id="id_center" name="" type="hidden" value="{{ $centro->id_centro}}" />
                    <div class="container-fluid" id="medForm">
                        <div class="col">
                            <div class="form-group gird-placeContent">
                                <label for="nombre">Name</label>
                                <input class="form-control" type="text" id="nombre" maxlength="50" 
                                    name = "nombre" required  value="{{ $centro->nombre}}"> 
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="direccion">Direccion</label>
                                <input class="form-control" type="text" id="direccion" maxlength="50" 
                                    name = "direccion" required value="{{ $centro->direccion}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="ciudad">Ciudad</label>
                                <input class="form-control" type="text" id="ciudad" maxlength="50" 
                                    name = "ciudad" required value="{{ $centro->ciudad}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="piso">floor</label>
                                <input class="form-control" type="number" id="piso" maxlength="50" 
                                    name = "piso"  value="{{ $centro->piso}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="cp">Postal Code</label>
                                <input class="form-control" type="number" id="cp" maxlength="50" 
                                    name = "cp" required value="{{ $centro->cp}}">
                            </div>
                            <button type="submit" class="btn btn-light btn_login" name="riderFrom"
                                value="riderForm">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
