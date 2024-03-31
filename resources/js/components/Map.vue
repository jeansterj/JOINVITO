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
                    <!-- <span v-if="isError">{{ messageError }}</span> -->
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
        this.timer = setInterval(this.getLocation(),300000);
    },
    methods:{
        prueba(){
            alert('prueba');
        },
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
                    // this.isError = true;
                    me.messageError = error.response.data.error;
                })
        },
        showModalForm() {
            // this.isError = false;
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

                        let menusPorProveedor = new Array();

                        if(item.usuario.proveedor != null && item.usuario.proveedor.menus.length > 0){

                            for (let index = 0; index < item.usuario.proveedor.menus.length; index++) {

                                let contenidoMenu = `<span class="badge text-bg-warning">${item.usuario.proveedor.menus[index].bebida} / ${item.usuario.proveedor.menus[index].plato1} / ${item.usuario.proveedor.menus[index].plato2}</span>`;
                                menusPorProveedor.push(contenidoMenu)
                            }
                        }else{
                            menusPorProveedor.push("No available menus")
                        }


                        let jsonDataPunto;

                        if(item.usuario.proveedor != null){
                            jsonDataPunto =
                            {
                                'type': item.tipo,
                                'geometry': {
                                        'type': 'Point',
                                        'coordinates': [item.longitud,item.latitud]
                                    },
                                'properties': {
                                    'title': item.usuario.proveedor.nombre,
                                    'description': menusPorProveedor
                                    }
                            }
                        }else if(item.usuario.centro != null){
                            jsonDataPunto =
                            {
                                'type': item.tipo,
                                'geometry': {
                                        'type': 'Point',
                                        'coordinates': [item.longitud,item.latitud]
                                    },
                                'properties': {
                                'title': item.usuario.centro.nombre,
                                }
                            }
                        }else{
                            jsonDataPunto =
                            {
                                'type': item.tipo,
                                'geometry': {
                                        'type': 'Point',
                                        'coordinates': [item.longitud,item.latitud]
                                    },
                                'properties': {
                                'title': item.tipo,
                                }
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

                    // Add zoom and rotation controls to the map.
                    map.addControl(new mapboxgl.NavigationControl());

                    var touchActionId;

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

                        touchActionId = setTimeout(me.showModalForm, 2000);
                    });
                    map.on('touchend', function(event) {

                        clearTimeout(touchActionId);
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

                        let content = document.createElement('div')
                        let title = document.createElement('h3');
                        let body = document.createElement('div');
                        let entregar = document.createElement('input');

                        body.setAttribute('class','container text-center deliverQuantity');
                        body.innerHTML = `<div class="row align-items-start">
                                            <div class="col simbol decrement">
                                                <span>-</span>
                                            </div>
                                            <div class="col total">
                                                <span class="quantity">0</span>
                                            </div>
                                            <div class="col simbol increment">
                                                <span>+</span>
                                            </div>
                                        </div>`


                        entregar.setAttribute('type','button');
                        entregar.setAttribute('class','btn bg-light');
                        entregar.setAttribute('value',"Entregar");
                        entregar.addEventListener('click', this.prueba);


                        let total = parseInt(card.querySelector('#total').value);

                        card.querySelector('.decrement').addEventListener('click',() => {

                            let cantidad = parseInt(card.querySelector('.quantity').innerHTML);

                            (cantidad > 0) ? cantidad-- : cantidad = 0;

                            card.querySelector('#cantidad').value = cantidad;
                            card.querySelector('.quantity').innerHTML = cantidad;
                        })

                        card.querySelector('.increment').addEventListener('click',() => {

                            let cantidad = parseInt(card.querySelector('.quantity').innerHTML);

                            (cantidad < total) ? cantidad++ : total;

                            card.querySelector('#cantidad').value = cantidad;
                            card.querySelector('.quantity').innerHTML = cantidad;
                        })

                        title.innerText = feature.properties.title;
                        title.setAttribute('class','title')

                        content.appendChild(title)

                        if(feature.properties.description != undefined){

                            for (let index = 0; index < feature.properties.description.length; index++) {
                                const menu = feature.properties.description[index];
                                let menus = document.createElement('p');
                                menus.innerHTML = menu;
                                content.appendChild(menus);
                            }
                        }

                        content.appendChild(body);

                        content.appendChild(entregar)

                        // create a HTML element for each feature
                        const el = document.createElement('div');

                        switch(feature.type){

                            case "Proveedor":

                                el.className = 'marker-provider';
                                content.removeChild(body);
                                content.removeChild(entregar);
                                break;

                            case "Centro":

                                el.className = 'marker-centro';
                                break;

                            case "Homeless":

                                el.className = 'marker-homeless';
                                break;
                        }




                        // make a marker for each feature and add it to the map
                        let marker = new mapboxgl.Marker(el)
                        .setLngLat(feature.geometry.coordinates)
                         // add popups
                        .setPopup(new mapboxgl.Popup({ offset: 25 })
                        .setDOMContent(content))
                        .addTo(map);

                    }
                })
        },
        createButtons(){
            body.setAttribute('class','container text-center deliverQuantity');
            body.innerHTML = `<div class="row align-items-start">
                                <div class="col simbol decrement">
                                    <span>-</span>
                                </div>
                                <div class="col total">
                                    <span class="quantity">0</span>
                                </div>
                                <div class="col simbol increment">
                                    <span>+</span>
                                </div>
                            </div>`
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
    height: 400px;
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
    border: 1px solid #fff;
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

.marker-homeless {
background-image: url('../../../public/img/pua.png');
width: 27px;
height: 35px;
border-radius: 50%;
cursor: pointer;
}

.marker-centro {
    background-image: url('../../../public/img/centro.png');
    width: 27px;
    height: 35px;
    border-radius: 50%;
    cursor: pointer;
}

.marker-provider {
    background-image: url('../../../public/img/provider.png');
    width: 27px;
    height: 35px;
    border-radius: 50%;
    cursor: pointer;
}

.mapboxgl-popup {
    max-width: 200px;
}

.mapboxgl-popup-content {
    text-align: center;
    font-family: 'Open Sans', sans-serif;
    padding: 10px 30px 10px;
    color: black;
}

.mapboxgl-popup-content h3{
    font-size: 18px;
}

.mapboxgl-popup-content span{
    font-size: 14px;
}

.mapboxgl-popup-close-button{
    font-size: 27px;
}

.mapboxgl-popup .mapboxgl-popup-content{
    background-color: #243E57;
    border-radius: 10px;
    color: #fff;
}

.mapboxgl-popup .mapboxgl-popup-content input{
    padding: 2px;
    font-size: 12px;
}

.mapboxgl-popup-close-button{
    color: #fff;
}

.mapboxgl-popup .title{
    color: #fff;
}

.mapboxgl-popup-anchor-top .mapboxgl-popup-tip {
    border-bottom-color: #243E57;
}

.deliverQuantity{
    padding-top: 5px;
    padding-bottom: 15px;
}

.deliverQuantity .decrement{
    border: 1px solid white;
    padding-top: 3px;
    padding-right: 11px;
    padding-left: 11px;
    padding-bottom: 3px;
    cursor: pointer;
    border-radius: 5px;
}

.deliverQuantity .increment{
    border: 1px solid white;
    padding-top: 3px;
    padding-right: 10px;
    padding-left: 9px;
    padding-bottom: 3px;
    cursor: pointer;
    border-radius: 5px;
}

.deliverQuantity .total{
    padding-top: 4px;
}

</style>
