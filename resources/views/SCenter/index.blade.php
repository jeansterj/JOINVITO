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
    <div class="container my-1 py-1">
        <div class="row margin-top my-3">
            <h2>Social Center</h2>
        </div>
        <img src="{{ asset('img/riderIcono.svg') }}" alt="" class="py-2">
        <div class="row py-5 my-5">
            <div class="col">
                <h3>PROFILE</h3>
                <a href="{{ url('') }}"> <img src="{{ asset('img/riderInfo.svg') }}" alt=""></a>

            </div>
            <div class="col">
                <h3>HOW TO USE?</h3>
                <a href="{{ url('prin') }}"><img src="{{ asset('img/useImg.svg') }}" alt=""></a>

            </div>
        </div>
    </div>
@endsection
