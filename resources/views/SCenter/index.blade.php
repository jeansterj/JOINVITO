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


@section('map')
    <div class="bg-secondary chartRiderMap">

        <h2 class="text-white text-break text-center py-3 px-4">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 

            Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h2>

        <h1 class="text-white text-center my-4 py-3"> MAP </h1>
    
    
        <div class="container">
            <div id="map"></div>
        </div>
        
        <div class="py-3 d-grid">
            <a href="{{ url('addLocation')}}"><h1 class="buttonOrder bg-light text-primary text-center py-1 px-2"> ADD LOCATION </h1></a>
           

        </div>
    
    </div>
    @endsection

@endsection
