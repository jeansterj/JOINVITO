@extends('layouts.main')
@section('title')
Register Supplier - JoInvito
@endsection
{{-- @section('navbar')
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
        <button type="button" class="btn btn-login"><img src="{{ asset('img/logoUsuario.svg') }}" alt="">Login</button>
        <button type="button" class="btn btn-signup">Sign up</button>
    </div>
</ul>
</div>
   @endsection --}}
   @section('content')
   {{--  Section --}}
   <h1>Escáner QR</h1>
    @if(isset($text))
        <p>Texto del código QR: {{ $text }}</p>
    @endif
    <video id="qr-video" width="100%" height="auto" autoplay></video>
    <button id="scan-button">Escanear</button>

    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let scanner = new Instascan.Scanner({ video: document.getElementById('qr-video') });

            scanner.addListener('scan', function (content) {
                // Envía el contenido al servidor para procesarlo (puedes usar AJAX).
                // Aquí se asume que el servidor está esperando una ruta POST '/qr-scan'.
                fetch('/camera', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ content: content })
                })
                .then(response => response.json())
                .then(data => {
                    // Puedes manejar la respuesta del servidor según tus necesidades.
                    console.log(data);
                    if (data.success) {
                    console.log('Escaneo exitoso. Contenido del código QR:', data.content);
                }
                })
                .catch(error => console.error('Error:', error));
            });

            document.getElementById('scan-button').addEventListener('click', function () {
                Instascan.Camera.getCameras().then(function (cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                        // console.log('scan2');
                    } else {
                        console.error('No se encontraron cámaras.');
                    }
                }).catch(function (e) {
                    console.error(e);
                });
            });
        });
    </script>
        {{-- <div class="container">
            <h1 class="text-center">Laravel webcam capture image and save from camera - ItSolutionStuff.com</h1>
            
            <form method="POST" action="{{ route('webcam.capture') }}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div id="my_camera"></div>
                        <br/>
                        <input type=button value="Take Snapshot" class="webTakeShot">
                        <input type="hidden" name="image" class="image-tag">
                    </div>
                    <div class="col-md-6">
                        <div id="results">Your captured image will appear here...</div>
                    </div>
                    <div class="col-md-12 text-center">
                        <br/>
                        <button class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
        
        <script src="../resources\js\webcamControl.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script> --}}
        {{-- <script type="text/javascript" src="instascan.min.js"></script> --}}

   @endsection