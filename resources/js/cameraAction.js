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

    document.getElementById('camera-button').addEventListener('click', function() {
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