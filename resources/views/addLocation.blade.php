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
            </div>
        </ul>
    </div>
@endsection

@section('map')
    <h1 class="text-center text-white py-4"> ADD LOCATION </h1>

    <div class="bg-light chartRiderMap my-3">

        <p class="text-center text-white text-break py-3 px-2">Lorem Ipsum is simply dummy text of the printing and
            typesetting industry.

            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

        <div class="bg-secondary chartRiderMap">
            <h1 class="text-white text-center my-4 py-3"> MAP </h1>


            <div class="container">
                <div id="map"></div>
            </div>

            <div class="py-3 d-grid">
                <button class="buttonOrder bg-light text-primary text-center py-1 px-2">
                    <h1> ADD LOCATION </h1>
                </button>

            </div>

        </div>

    </div>
@endsection
