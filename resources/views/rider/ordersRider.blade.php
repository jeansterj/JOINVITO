@extends('layouts.main')


@section('content')
    {{-- <meta name="userId" content="{{ Auth::user()->id_usu }}"> --}}
    <div class="container">
        <div class="container-fluid my-3">
            <div class="container chartRiderMap riderCode bg-light d-tc mx-2">
                <h4 class="text-primary">RIDER CODE</h4>
                <p class=" text-white bg-primary ">{{ $rolActivo = Auth::user()->id_usu }}</p>
            </div>

            <div class="chartRiderMap riderCode bg-light">
                {{-- <form action="{{ action([App\Http\Controllers\QrCodeController::class, 'show'], ['idRider' => Auth::user()->id_usu]) }}"> --}}
                <a href="" data-toggle="modal" data-target="#exampleModal"><img class="my-2"
                        src="{{ asset('img/QRImg.svg') }}" alt="QR" data-toggle="modal"
                        data-target="#exampleModal" id="showQrModal" data-url="{{ Auth::user()->id_usu }}"></a>
                {{-- </form> --}}
            </div>
        </div>
        <div id="ordernow" class="buttonOrder bg-light ">
            <a href="rider-menu-selection">
                <h1>GET ORDER NOW</h1>
            </a>
        </div>
        <div id="ordersRider" class="buttonOrder">
        </div>



        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">QR Code</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal_body_qr">
                        {{-- {{ App\Http\Controllers\QrCodeController::show() }} --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button buttonCloseModal" class="btn btn-primary" data-dismiss="modal">Close</button>
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
