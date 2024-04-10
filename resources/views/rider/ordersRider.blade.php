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
                    {{-- <form action="{{ action([App\Http\Controllers\QrCodeController::class, 'show'], ['idRider' => Auth::user()->id_usu]) }}"> --}}
                        <a href="" data-toggle="modal" data-target="#exampleModal"><img class="my-2" src="{{ asset('img/QRImg.svg') }}" alt="QR" data-toggle="modal" data-target="#exampleModal" id="showQrModal" data-url="{{Auth::user()->id_usu}}"></a>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> 
            <img class="my-2" src="{{ asset('img/QRImg.svg') }}" alt="QR">
        </button>  --}}
        {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Launch demo modal
        </button> --}}
          
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Título del Modal</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body" id="modal_body">
                  {{-- {{ App\Http\Controllers\QrCodeController::show() }} --}}
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary">Guardar cambios</button>
                </div>
              </div>
            </div>
          </div>
       
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    @endsection

    @section('map')
        <div class="container-fluid chartRiderMap">
            <div id="map"></div>
        </div>
    @endsection
