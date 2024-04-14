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
        <div class="row margin-top text-center editRiderInfo">
            <h2>CHANGE INFO RIDER</h2>
            <img class="rider-logo" src="{{ asset('img/riderIcono.svg') }}" alt="">
            <div class="bg-secondary section-form">
                <form class="registerForm" action="{{ action([App\Http\Controllers\RiderController::class, 'update'], ['rider' => $rider->id_rider]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input id="" name="" type="hidden" value="{{ $rider->id_rider}}" />
                    <div class="container-fluid" id="medForm">
                        <div class="col">
                            <div class="form-group gird-placeContent">
                                <h4>Rider Code</h4>
                                <h5 class="form-control">{{ $rider->id_rider}}</h5>
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="email">Email</label>
                                <input class="form-control" type="email" id="email" maxlength="50" placeholder="Jon"
                                    name = "email" required value="{{ $rider->usuario->email}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="pass_usu">Contraseña</label>
                                <input class="form-control" type="password" id="pass_usu" maxlength="50" placeholder="Jon"
                                    name = "pass_usu" required value="{{  $rider->usuario->pass_usu}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="nombre">Name</label>
                                <input class="form-control" type="text" id="nombre" maxlength="50" placeholder="Jon"
                                    name = "nombre" required value="{{ $rider->nombre}}">
                            </div>
                            <div class="form-group gird-placeContent">
                                <label for="primer_apellido">Last Name</label>
                                <input class="form-control" type="text" id="primer_apellido" maxlength="50" placeholder="Doe"
                                    name = "primer_apellido" required value="{{ $rider->primer_apellido}}">
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
