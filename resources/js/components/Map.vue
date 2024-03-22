<template>
        <!-- Modal -->
        <div id="form-container" class="bg-secondary">
            <div id="close">x</div>
            <form id="dataForm">
                    <div class="input-group mb-3">
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Direccion">
                    </div>
                    <input type="hidden" id="lat" name="lat">
                    <input type="hidden" id="long" name="long">
                    <div class="input-group mb-3">
                        <input type="text" id="cantidad" name="cantidad" class="form-control" placeholder="Nº Personas">
                    </div>
                    <input type="hidden" id="rol" name="rol">
                    <input type="hidden" id="id_usu" name="id_usu">
                    <input type="hidden" id="homeless" name="homeless" value="homeless">
                    <input type="hidden" id="homeless" name="homeless" value="homeless">
                    <button type="submit" class="btn bg-light buttonOrder addPua">Enviar</button>
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
                let close = document.getElementById('close');

                close.addEventListener('click', () => {
                    formContainer.style.display = 'none';
                })

                let formContainer = document.getElementById('form-container');
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
                        
                    }
                })
            }
    }
};
</script>
<style>

    #close{
        position: absolute;
        color: black;
        text-align: center;
        cursor: pointer;
        width: 10px;
        font-size: 16px;
        right: 10px;
        top: 5px;
    }

    #form-container {
        position: relative;
        display: none; 
        position: absolute; 
        top: 10px; left: 10px; 
        background-color: white; 
        padding: 10px; 
        border: 1px solid #ccc; 
        z-index: 1000;
        border-radius: 15px;
    }

    #direccion, #cantidad{
        height: 21px;
        font-size: 13px;
    }

    .addPua{
        width: 100px !important;
    }
    
</style>
