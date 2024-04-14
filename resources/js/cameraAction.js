
document.addEventListener('DOMContentLoaded', function() {


    scanner.addListener('scan', function(content) {
        // Envía el contenido al servidor para procesarlo (puedes usar AJAX).
        // Aquí se asume que el servidor está esperando una ruta POST '/camera'.
        console.log(content);
        then(response => {
                if (!response.ok) {
                    throw new Error('Network error');
                }
                return response.json()
            })
            .catch(error => console.error('Error:', error));
    });

    document.getElementById('camera-button').addEventListener('click', function() {
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No se encontraron cámaras.');
            }
        }).catch(function(e) {
            console.error(e);
        });
    });
});