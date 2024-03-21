<template>
        <!-- Modal -->
        <div id="form-container">
            <h2>Introduce tus datos:</h2>
            <form id="dataForm">
                <label for="nombre">Nombre:</label><br>
                <input type="text" id="nombre" name="nombre"><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email"><br>
                <input type="submit" value="Enviar">
            </form>
        </div>
</template>

<script>
export default {

    data(){
        return {
            puntos: [],
            lat: 0,
            lng: 0,
        }
    },
    created(){
        this.getLocation();
        // Call the getLocation() function with printLocation() as a callback
        this.timer = setInterval(this.getLocation(),60000);
    },
    methods:{
            showModalForm() {
                var formContainer = document.getElementById('form-container');
                formContainer.style.display = 'block';
        },
        getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    this.lat  = position.coords.latitude;
                    this.lng  = position.coords.longitude;

                    this.printLocation();
                })
            }
        },

        printLocation() {

            //lng - 2.1745089
            //lat - 41.3907285
            // 'coordinates': [2.1745089, 41.3907285]
            mapboxgl.accessToken = 'pk.eyJ1IjoiZnJhbmdhYXIiLCJhIjoiY2x0M2o1bG51MXl1djJycGxoOTMxOWM2cyJ9.OvUbOSJo5uD6WNRmhBcujQ';


            const me = this
            axios
                .get('puntos')
                .then(response => {
                        
                        let arrayPuntos = new Array();
                        response.data.forEach((item) => {

                            let jsonDataPunto = {
                                'type': 'Feature',
                                'geometry': {
                                'type': 'Point',
                                'coordinates': [item.longitud,item.latitud]
                                },
                                'properties': {
                                'title': item.nombre,
                                'description': [
                                    `<span>Agua</span>
                                    <span>Ensalada</span>
                                    <span>Jamon</span>`
                                ]
                                }
                            }

                            arrayPuntos.push(jsonDataPunto);

                        });

                        const geojson = {
                            'type': 'FeatureCollection',
                            'features': arrayPuntos
                        };


                        const map = new mapboxgl.Map({
                            container: 'map', // container ID
                            center: [this.lng, this.lat], // starting position [lng, lat]
                            zoom: 10, // starting zoom
                            doubleClickZoom: false
                        });


                        map.on('touchstart', function(event) {
                            var coordinates = event.lngLat;
                            setTimeout(me.showModalForm, 2000);
                        });
                        map.on('dblclick', function(event) {
                            var coordinates = event.lngLat;
                            // console.log('Lng:', coordinates.lng, 'Lat:', coordinates.lat);
                            console.log(event)
                            me.showModalForm();
                        })
                        


                        

                        // add markers to map
                        for (const feature of geojson.features) {
                            // create a HTML element for each feature
                            const el = document.createElement('div');
                            el.className = 'marker';

                            // make a marker for each feature and add it to the map
                            let marker = new mapboxgl.Marker(el)
                            .setLngLat(feature.geometry.coordinates)
                            .setPopup(
                            new mapboxgl.Popup({ offset: 25 }) // add popups
                            .setHTML(
                            `<h3>${feature.properties.title}</h3><p>${feature.properties.description}</p>`
                            )
                            )
                            .addTo(map);
                            
                            marker.getElement().addEventListener('click', function (e) { 
                                console.log("marker clicked"); 
                            });
                        }
                    })

            }


        
    }
};
</script>
<style>

</style>
