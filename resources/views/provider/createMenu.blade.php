@extends('layouts.main')

{{-- @section('navbar')
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
            <div>
                <button type="button" class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}"
                        alt="">Login</button>
                <button type="button" class="btn btn-signup">Sign up</button>
            </div>
        </ul>
    </div>
@endsection --}}

@section('content')
    <div class="container">
    <div class="row margin-top text-center">
        <h2>CREATE MENU</h2>
        <img class="rider-logo" src="{{ asset('img/riderIcono.svg') }}" alt="">
    <div class="bg-secondary section-form">
        <form class="registerForm" action="{{ action([App\Http\Controllers\UsuarioController::class, 'store']) }}" method="POST">
            @csrf
            <input id="" name="" type="hidden" value="" />
            <div class="container-fluid" id="medForm">
               <div class="col">
               <div class="form-group gird-placeContent">
                     <label for="plate1">Plate 1</label>
                     <input class="form-control" type="text" id="plate1" maxlength="50"
                     placeholder="Pasta"  name = "plate1" required>
                </div>
                <div class="form-group gird-placeContent">
                    <label for="plate2">Plate 2</label>
                     <input class="form-control" type="text" id="plate2" maxlength="50"
                     placeholder="Pizza"  name = "plate2" required>
                </div>
                  <div class="form-group gird-placeContent">
                    <label for="drink">Drink</label>
                    <input class="form-control" type="text" id="drink" maxlength="50"
                    placeholder="Cocacola"  name = "drink" required>
                  </div>
                  <div class="form-group gird-placeContent">
                    <label for="amount">Amount</label>
                    <input class="form-control" type="number" id="amount" maxlength="2"
                    value="0"  name = "amount" required>
                  </div>
                  <button type="submit" class="btn btn-light btn_login" name="supplierFrom" >TO REGISTER MENU</button>
               </div>
            </div>
         </form>
    </div>
    </div>   
    
        
    </div>
    @endsection

