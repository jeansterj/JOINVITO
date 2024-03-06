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
            <div>
                <button type="button" class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}"
                        alt="">Login</button>
                <button type="button" class="btn btn-signup">Sign up</button>
            </div>
        </ul>
    </div>
@endsection

@section('content')
    <div class="bg-light chartRiderOrder de my-3">

        <div class="chartRiderOrder row container ">
            <div class="d-flex">

                <div class="col-8"> 
                    <h2 class="text-start">Order 1 </h2>

                </div>
                <div class="col">
    
                    <img src="{{ asset('img/editIcon.svg')}}" alt="">
                </div>
            </div>

            <div class="d-flex">
                <div class="row">
                    <div class="col-8">
                        <h3 class="text-start">CHEESE BURGUER
                            FISH, COCA-COLA</h3>
                    </div>
                   

                    <div class="col py-1">
                        <img src="{{ asset('img/deleteIcon.svg')}}" alt="">
                    </div>
                </div>

            </div>
            
          

        </div>


    </div>
@endsection
