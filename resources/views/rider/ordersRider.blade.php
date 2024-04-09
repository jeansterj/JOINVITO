@extends('layouts.main')


@section('content')
    {{-- <meta name="userId" content="{{ Auth::user()->id_usu }}"> --}}
    <div class="container">
        <div id="ordernow" class="buttonOrder bg-light ">
            <a href="rider-menu-selection"><h1>GET ORDER NOW</h1></a>
        </div>
        <div id="ordersRider" class="buttonOrder">
        </div>

        <div>
            {{-- <div class="container chartRiderMap bg-light py-2 px-2 my-3">
                <div class="riderOrderCard">
                    <p>PROV1</p>
                    <p>CHEESE BURGUER</p>
                    <p>FISH</p>
                    <p>COCA-COLA</p>
                </div>
            </div> --}}

            <div class="container-fluid my-3">
                <div class="container chartRiderMap bg-light d-tc mx-2">
                    <h4 class="text-primary">RIDER CODE</h4>
                    <p class="container text-white bg-primary chartRiderMap">#17454586J</p>
                </div>

                <div class="chartRiderMap bg-light">
                    <a href="" ><img class="my-2" src="{{ asset('img/QRImg.svg') }}" alt="QR" data-toggle="modal" data-target="#exampleModal"></a>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> 
            <img class="my-2" src="{{ asset('img/QRImg.svg') }}" alt="QR">
        </button>  --}}
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button>
          
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary text-white">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-break mx-4" id="exampleModalLabel">ARE YOU SURE TO DELETE ORDER 1?</h1>
                    </div>
                    <div class="modal-footer justify-content-around">
                        <button type="button" class="btn btn-light text-secondary btnOrdes px-5">YES</button>
    
                        <button type="button" class="btn btn-light text-secondary btnOrdes px-5"
                            data-bs-dismiss="modal">NO</button>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('map')
        <div class="container-fluid chartRiderMap">
            <div id="map"></div>
        </div>
    @endsection
