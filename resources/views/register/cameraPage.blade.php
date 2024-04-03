@extends('layouts.main')
@section('title')
    Register Supplier - JoInvito
@endsection

@section('content')
    {{--  Section --}}
    {{-- <div class="entranceAnimation">
        <h1 class="jo">JO <h1 class="invito">INVITO</h1></h1>
    </div> --}}
    <h1 id="titleScan">Escáner QR</h1>
    @if (isset($text))
        <p>Texto del código QR: {{ $text }}</p>
    @endif
    <video id="qr-video" width="100%" height="auto" autoplay></video>
    <button id="scan-button" class="btn btn-light" value="Pulsar para escanear qr">Pulsar para escanear qr</button>
    
    <button id="btnStart" value="Pulsar para abrir camara">Start</button>
    <button id="btnStop" value="Pulsar para cerrar camara">Stop</button>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let scanner = new Instascan.Scanner({
                video: document.getElementById('qr-video')
            });

            scanner.addListener('scan', function(content) {
                // Envía el contenido al servidor para procesarlo (puedes usar AJAX).
                // Aquí se asume que el servidor está esperando una ruta POST '/camera'.
                // fetch('/JOINVITO/public/camera', {
                //     method: 'POST',
                //     headers: {
                //         'Content-Type': 'application/json',
                //         'X-CSRF-TOKEN': '{{ csrf_token() }}'
                //     },
                //     body: JSON.stringify({ content: content }) 
                // })
                console.log(content);
                then(response => {
                        if (!response.ok) {
                            throw new Error('Network error');
                        }
                        return response.json()
                    })
                    // .then(data => {
                    //     // Puedes manejar la respuesta del servidor según tus necesidades.
                    //     console.log(data);
                    //     if (data.success) {
                    //     console.log('Escaneo exitoso. Contenido del código QR:', data.content);
                    // }
                    // })
                    .catch(error => console.error('Error:', error));
            });

            document.getElementById('scan-button').addEventListener('click', function() {
                Instascan.Camera.getCameras().then(function(cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]);
                        // console.log('scan2');
                    } else {
                        console.error('No se encontraron cámaras.');
                    }
                }).catch(function(e) {
                    console.error(e);
                });
            });
        });
    </script>
@endsection
