<template>
        <!-- Modal -->
        <div id="form-container" class="bg-secondary">
            <form id="dataForm">
                    <div class="input-group mb-3">
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Direccion" v-model="punto.direccion">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" id="cantidad" name="cantidad" class="form-control" placeholder="Nº Personas" v-model="punto.cantidad_personas">
                    </div>
                    <button type="button" class="btn bg-light buttonOrder addPua" @click="insertPunto()">Guardar</button>
                    <input type="button" id="close" class="btn bg-light buttonOrder addPua" value="Cancelar"></input>
                    <span v-if="isError">{{ messageError }}</span>
            </form>
        </div>
</template>

<script>
export default {

    data(){
        return {
            puntos: [],
            punto: {}
        }
    },
    created(){
        this.getLocation();
        // Call the getLocation() function with printLocation() as a callback
        this.timer = setInterval(this.getLocation(),120000);
    },
    methods:{
        insertPunto(){
            const me = this
            axios
                .post('puntos',me.punto)
                .then(response => {
                    let formContainer = document.getElementById('form-container');
                    formContainer.style.display = 'none';
                    this.getLocation();
                })
                .catch(error=>{
                    this.isError = true;
                    me.messageError = error.response.data.error;
                })
        },
        showModalForm() {
            this.isError = false;
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
                        let coordinates = event.lngLat;
                        me.punto.latitud = coordinates.lat;
                        me.punto.longitud = coordinates.lng;
                        me.punto.fecha_inactivo = null;
                        me.punto.fecha_alta = new Date().toLocaleDateString('en-CA');
                        me.punto.fecha_baja = null;
                        me.punto.puntos = 10;
                        me.punto.tipo = "Homeless";
                        me.punto.id_usu = document.querySelector('meta[name="userId"]').content;

                        setTimeout(me.showModalForm, 2000);
                    });
                    map.on('dblclick', function(event) {
                        let item = event.originalEvent.srcElement;

                        if(item.classList[0].search("marker") == -1){
                            let coordinates = event.lngLat;
                            me.punto.latitud = coordinates.lat;
                            me.punto.longitud = coordinates.lng;
                            me.punto.fecha_inactivo = null;
                            me.punto.fecha_alta = new Date().toLocaleDateString('en-CA');
                            me.punto.fecha_baja = null;
                            me.punto.puntos = 10;
                            me.punto.tipo = "Homeless";
                            me.punto.id_usu = document.querySelector('meta[name="userId"]').content;
                            me.showModalForm();
                        }
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

    .chartRiderMap{
        margin-top: 50px;
        border-radius: 20px;
        padding: 0px;
    }

    #map{
        width: 100%;
        height: 310px;
        /* margin-bottom: 80px;
        margin-top: 50px; */
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

    button.addPua,input.addPua{
        width: 100px !important;
        margin-right: 10px;
        margin-left: 10px;
    }

    /* #dataForm button{
        width: 100px !important;
    } */


</style>
