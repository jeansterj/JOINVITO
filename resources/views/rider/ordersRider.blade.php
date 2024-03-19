@extends('layouts.main')


@section('content')
    <meta name="userId" content="{{ Auth::user()->id_usu }}">
    <div class="container">
        <div id="ordernow" class="buttonOrder bg-light ">
            <a href=""><h1>GET ORDER NOW</h1></a>
        </div>
        <div id="ordersRider" class="buttonOrder">
        </div>

        <div>
            <div class="container chartRiderMap bg-light py-2 px-2 my-3">
                <div class="riderOrderCard">
                    <p>PROV1</p>
                    <p>CHEESE BURGUER</p>
                    <p>FISH</p>
                    <p>COCA-COLA</p>
                </div>
            </div>

            <div class="container-fluid my-3">
                <div class="container chartRiderMap bg-light d-tc mx-2">
                    <h4 class="text-primary">RIDER CODE</h4>
                    <p class="container text-white bg-primary chartRiderMap">#17454586J</p>
                </div>

                <div class="chartRiderMap bg-light">
                    <a href=""><img class="my-2" src="{{ asset('img/QRImg.svg') }}" alt="QR"></a>
                </div>


            </div>



        </div>
    @endsection

    @section('map')
        <div class="bg-secondary container chartRiderMap">
            <h1 class="text-white text-center mt-4"> MAP </h1>
            <div class="container">
                <div id="map"></div>
            </div>

            <div class="py-3 d-grid">
                <a href="{{ url('addLocation') }}">
                    <h1 class="buttonOrder bg-light text-primary text-center py-1 px-2"> ADD LOCATION </h1>
                </a>
            </div>
        </div>
    @endsection
