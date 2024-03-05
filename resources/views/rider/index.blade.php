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
       
        <div class=" buttonOrder">
        <div class="accordion " id="accordionExample">
            <div class="accordion-item ">
                <h2 class="accordion-header">
                    <button class="accordion-button bg-light " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                       
                            <img class="rounded mx-auto d-flex imgRiderMot" src="{{ asset('img/rider-unscreen.gif') }}" alt="riderMot">
                
                            <h1>THERE ARE NO ORDERS </h1>
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body bg-light">
                      <ul class="">
                        <li class=""><a href="">PROV2 - 1 PACK TO COLLECT</a></li>
                        <li class=""><a href="">PROV3 - 1 PACK TO COLLECT</a></li>
                      </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <div>
            <div class="container chartRiderMap bg-light py-2 px-2 my-3">
                <div class="chartRiderOrder">
                    <p>PROV1</p>
                    <p>CHEESE BURGUER</p>
                    <p>FISH</p>
                    <p>COCA-COLA</p>
                </div>
            </div>
           
            <div class="container-fluid my-3">
                <div class="container chartRiderMap bg-light d-tc mx-2">
                    <h4>RIDER CODE</h4>
                    <p class="container text-white bg-primary chartRiderMap">#17454586J</p>
                </div>
    
                <div class="chartRiderMap bg-light">
                    <a href=""><img class="my-2" src="{{ asset('img/QRImg.svg') }}" alt="QR"></a>
                </div>


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
