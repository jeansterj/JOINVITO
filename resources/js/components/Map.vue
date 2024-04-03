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
            punto: {},
            pedidosSeleccionados: []
        }
    },
    created(){
        this.getLocation();
        this.fetchOrdersList();
        // Call the getLocation() function with printLocation() as a callback
        setInterval(this.fetchOrdersList,5000);
        this.timer = setInterval(this.getLocation,300000);
    },
    methods:{
        entregar(){   

            let seleccionados = parseInt(sessionStorage.getItem('seleccionadosParaEntrega'));
            let idPunto = document.getElementById('idPunto').getAttribute('data-id');

            this.fetchOrdersList();
            let pedidos = JSON.parse(sessionStorage.getItem('pedidos'));
            this.selectPedido(pedidos,seleccionados);
            for (let index = 0; index < this.pedidosSeleccionados.length; index++) {
                this.updatePedidosEntregas(this.pedidosSeleccionados[index],idPunto);
            }


            // this.getLocation();
        },
        fetchOrdersList () {

            const riderId = document.querySelector('meta[name="userId"]').content

            axios
                .get(`orders/rider/${riderId}`)
                .then(response => {

                    sessionStorage.setItem('pedidos',JSON.stringify(response.data));

                    let totalOrdersAvailable = 0;
                    response.data.forEach(element => {
                        totalOrdersAvailable += element.cantidad_packs
                    });
                    sessionStorage.setItem('totalOrdersAvailable',totalOrdersAvailable)
                })
        },
        selectPedido(pedidos,seleccionados){

            let pedido = {};
            let index = 0;
            let rellenado = 0;
            let packsPorPedido = 0;
            this.pedidosSeleccionados = [];

            while(rellenado < seleccionados){

                while(pedidos[index].cantidad_packs > 0 && rellenado < seleccionados){
                    pedido = pedidos[index];
                    pedido.cantidad_packs--;
                    // pedido.entregado_a_rider = true;
                    rellenado++;
                    packsPorPedido++;
                    pedido.entregados = packsPorPedido;
                }

                this.pedidosSeleccionados.push(pedido);
                packsPorPedido = 0;
                index++;
            }
        },
        updatePedidosEntregas(data,idPunto){

            let pedido = {
                "id_pedido": data.id_pedido,
                "id_rider": data.id_rider,
                "id_menu": data.id_menu,
                "cantidad_packs": data.cantidad_packs,
                "fecha": data.fecha,
                "entregado_a_rider": data.entregado_a_rider,
                "id_punto": idPunto,
                "entregados": data.entregados
            };

            axios
                .put(`pedidos/${pedido.id_pedido}`, pedido)
                .then(response => {
                    
                })
                .catch(error => {

                })
        },
        showModalForm() {
            // this.isError = false;
            let close = document.getElementById('close');

            close.addEventListener('click', (event) => {
                formContainer.classList.remove('mostrar');
            })

            let formContainer = document.getElementById('form-container');
            formContainer.classList.add('mostrar');

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
        dobleClick(event){
            const me = this;
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
                                },
                                'id': item.id_punto
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
                    map.on('touchend', function() {

                        clearTimeout(touchActionId);
                    });

                    
                    map.on('dblclick', function(event) {
                        me.dobleClick(event);
                    })

                    map.on('click',function(){

                        setTimeout(function(){
                            let resetPopups = document.querySelectorAll('.mapboxgl-popup-content');
                            resetPopups.forEach(popup => {
                                if(popup.querySelector('.quantity') != null){
                                    let cantidad = popup.querySelector('.quantity').innerHTML;
                                    cantidad = 0;
                                    popup.querySelector('.quantity').innerHTML = cantidad;
                                }                                
                            });
                        },1)

                    })

                    // add markers to map
                    for (const feature of geojson.features) {

                        this.setPuntos(feature,map);

                    }
                })
        },
        insertPunto(){
            let formContainer = document.getElementById('form-container');
            formContainer.classList.remove('mostrar');
            const me = this
            axios
                .post('puntos',me.punto)
                .then(response => {
                    
                    formContainer.classList.remove('mostrar');
                    let jsonDataPunto;

                    jsonDataPunto = {
                        'type': me.punto.tipo,
                        'geometry': {
                                'type': 'Point',
                                'coordinates': [me.punto.longitud,me.punto.latitud]
                            },
                        'properties': {
                        'title': me.punto.tipo,
                        },
                        'id': me.punto.id_punto
                    }

                    const geojson = {
                        'type': 'FeatureCollection',
                        'features': jsonDataPunto
                    };

                    this.setPuntos(feature,map);

                })
                .catch(error=>{
                    // this.isError = true;
                    me.messageError = error.response.data.error;
                })
        },
        setPuntos(feature,map){
            let content = document.createElement('div')
            let title = document.createElement('h3');
            let body = this.createButtons();
            let idPunto = document.createElement('input');

            idPunto.setAttribute('type','hidden');
            idPunto.setAttribute('id','idPunto')
            idPunto.setAttribute('data-id',feature.id)

            let entregar = document.createElement('input');

            entregar.setAttribute('type','button');
            entregar.setAttribute('class','btn bg-light');
            entregar.setAttribute('value',"Entregar");
            entregar.addEventListener('click', this.entregar);


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
            content.appendChild(idPunto);

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
            let popup = new mapboxgl.Popup({ offset: 25 })
            let marker = new mapboxgl.Marker(el)
            .setLngLat(feature.geometry.coordinates)
                // add popups
            .setPopup(popup
            .setDOMContent(content))
            .addTo(map);
        },
        createButtons(){

            let buttons = document.createElement('div');
            buttons.setAttribute('class','container text-center deliverQuantity');

            let nivel2 = document.createElement('div');
            nivel2.setAttribute('class','row align-items-start');

            let menos = document.createElement('div');
            menos.setAttribute('class','col simbol decrement')
            menos.innerHTML = `<span>-</span>`;

            let mas = document.createElement('div');
            mas.setAttribute('class','col simbol increment')
            mas.innerHTML = `<span>+</span>`;

            let valor = document.createElement('span');
            valor.setAttribute('class','quantity');
            valor.innerText = 0;

            let cantidad = document.createElement('div');
            cantidad.setAttribute('class','col total');
            cantidad.appendChild(valor);

            nivel2.appendChild(menos);
            nivel2.appendChild(cantidad);
            nivel2.appendChild(mas);
            buttons.appendChild(nivel2);

            sessionStorage.setItem('seleccionadosParaEntrega',0);

            menos.addEventListener('click',() => {

                let seleccionados = parseInt(valor.innerText);

                (seleccionados > 0) ? seleccionados-- : seleccionados = 0;
                valor.innerText = seleccionados;
                sessionStorage.setItem('seleccionadosParaEntrega',seleccionados);
            })

            mas.addEventListener('click',() => {

                let totalOrdersAvailable = parseInt(sessionStorage.getItem('totalOrdersAvailable'));
                let seleccionados = parseInt(valor.innerText);

                (seleccionados < totalOrdersAvailable) ? seleccionados++ : seleccionados = totalOrdersAvailable;
                valor.innerText = seleccionados;
                sessionStorage.setItem('seleccionadosParaEntrega',seleccionados);
            })

            return buttons;
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

.mostrar{
    display: block !important;
}

</style>
