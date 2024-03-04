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

        <div class=" buttonOrder bg-light ">
            <h1>GET ORDER NOW</h1>
        </div>
        <div class=" buttonOrder bg-light d-flex">
            <img class="rounded mx-auto d-flex imgRiderMot" src="{{ asset('img/rider-unscreen.gif') }}" alt="riderMot">

            <h1>THERE ARE NO ORDERS </h1>
        </div>

        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Accordion Item #1
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                      <ul class="">
                        <li class=""><a href="">PROV2 - 1 PACK TO COLLECT</a></li>
                        <li class=""><a href="">PROV3 - 1 PACK TO COLLECT</a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="container df">
                <p>PROV1</p>
                <p>CHEESE BURGUER</p>
                <p>FISH</p>
                <p>COCA-COLA</p>
            </div>

            <div>
                <p>RIDER CODE</p>
                <p>#17454586J</p>
            </div>

            <div>
                <button><img src="" alt="QR"></button>
            </div>

        </div>
    @endsection

    @section('map')
        <div class="bg-secondary chartRiderMap">
            <h1> MAP </h1>


            <div class="container">
                <div id="map"></div>
            </div>
            <h1 class="buttonOrder bg-light"> ADD LOCATION </h1>

        </div>
    @endsection
