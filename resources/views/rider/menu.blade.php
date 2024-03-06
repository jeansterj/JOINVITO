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
    <div class="container">
    <div class="row margin-top">
        <h2>RIDER PROFILE</h2>
    </div>   
    <img src="{{ asset('img/riderIcono.svg') }}" alt="">
        <div class="row">
            <div class="col">
                <h3>RIDER INFO</h3>
                <a href="{{ url('edit-rider')}}"> <img src="{{ asset('img/riderInfo.svg') }}" alt=""></a>
                
            </div>
                <div class="col">
                <h3>RIDER STATS</h3>
                <a href="{{ url('statsRider')}}"> <img src="{{ asset('img/riderStasImg.svg') }}" alt=""></a>
               
            </div>    
        </div>  
        <div class="row">
            <div class="col">
                <h3>HOW TO USE?</h3>
                <a href="{{ url('instructions')}}"><img src="{{ asset('img/useImg.svg') }}" alt=""></a>
                
            </div>
            <div class="col">
            
            </div>    
        </div>  
    </div>
    @endsection

