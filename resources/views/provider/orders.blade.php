@extends('layouts.main')

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">QR Scan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body modal-body-camera" id="modal_body">
        <video id="preview" width="100%" height="auto" autoplay></video>
        <div class="cameraButtonDiv">       
            <button id="camera-button" class="btn btn-light scanButtonCamera" value="Pulsar para escanear qr">
                <img src="../public/img/camera_icon.png" alt="" id="cameraIcon">
            </button>
        </div>
        
          
          {{-- <button id="btnStart" value="Pulsar para abrir camara">Start</button>
          <button id="btnStop" value="Pulsar para cerrar camara">Stop</button> --}}
        {{-- {{ App\Http\Controllers\QrCodeController::show() }} --}}

      </div>
      <div class="modal-footer">
        <button type="button buttonCloseModal" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@section('content')
    {{-- <meta name="userId" content="{{ Auth::user()->id_usu }}"> --}}
    <div class="text-center text-white my-2">Write the rider’s code or scan it.</div>
    <div class="d-flex justify-content-around">
        <div class="bg-light btnOrdes d-flex text-center my-auto justify-content-center mx-4 px-5">
            <form action="{{ action([App\Http\Controllers\QrCodeController::class, 'confirmQrWrite']) }}" method="GET">
              @csrf
                <label for="rider_Code" class="text-secondary">WRITE CODE</label>
                <div class="row">
                    <input type="text" name="rider_Code" id="rider_Code"
                        class="btnOrdes bg-primary text-white py-1 my-1 codBorder">
                </div>
                <button type="submit" class="btn btn-primary">Check Code</button>
              </form>
        </div>
        <div class="bg-light btnOrdes px-2 ">
            <a href="" data-toggle="modal" data-target="#exampleModal">
                <img src="{{ asset('img/QRImg.svg') }}" alt="QR-Img" id="readQrSuplier">
                
            </a>
        </div>
    </div>
    
   
    <div class="text-white py-2 text-center">ORDERS
      <div class="container">
        <div class="bg-light chartProviderOrder centerSpace my-3 " id="ordersProvider">

        </div>
      </div>
    </div>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

@endsection
