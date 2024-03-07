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
            @if (Auth::check() && (Auth::user()->rol->nombre == 'admin' || Auth::user()->rol->nombre == 'rider' || Auth::user()->rol->nombre == 'centro'))
            <a class="nav-link" href="{{ url('/logout') }}" aria-expanded="false">Logout</a>
            @else
                <a class="nav-link" href="{{ url('/login') }}" aria-expanded="false"><button type="button" class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}" alt="">Login</button></a>
                <button type="button" class="btn btn-signup">Sign up</button>
            @endif
        </ul>
    </div>
@endsection

@section('content')
    <div class="container">
    <div class="row margin-top text-center">
        <h2>CHANGE INFO RIDER</h2>
        <img class="rider-logo" src="{{ asset('img/riderIcono.svg') }}" alt="">
    <div class="bg-secondary section-form">
        <form class="registerForm" action="" method="POST">
            @csrf
            <input id="" name="" type="hidden" value="" />
            <div class="container-fluid" id="medForm">
               <div class="col">
                  <div class="form-group gird-placeContent">
                     <label for="emailRider">Email</label>
                     <input class="form-control" type="email" id="emailRider" maxlength="50"
                        placeholder="jondoe@gmail.com" name = "email" required>
                  </div>
                  <div class="form-group gird-placeContent">
                     <label for="passwordRider">Password</label>
                     <input class="form-control" type="text" maxlength="50" id="passwordRider"
                        placeholder="1234A*" name = "password" required>
                  </div>
                  <div class="form-group gird-placeContent">
                     <label for="nameRider">Name</label>
                     <input class="form-control" type="text" id="nameRider" maxlength="50"
                        placeholder="Jon" name = "name" required>
                  </div>
                  <button type="submit" class="btn btn-light btn_login" name="riderFrom" value="riderForm">Save</button>
               </div>
            </div>
         </form>
    </div>
    </div>   
    
        
    </div>
    @endsection

