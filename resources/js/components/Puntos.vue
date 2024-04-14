<template>

    <span v-if="confirm"  class="badge text-bg-secondary my-3 btnChange"> {{ mensajeUpdate }}</span>
    <h5 class="card-title"><button type="button" class="btn btn-light text-white btnPuntos px-5 my-3"
        @click="confirmUpdate()">CONFIRM CHANGES</button></h5>

    <div class="row">
        <table class="table table-users container">
            <thead>
            <tr>
                <!-- <th scope="col">ID</th> -->
                <th scope="col">DIRECCION</th>
                <!-- <th scope="col">LATITUD</th> -->
                <!-- <th scope="col">LONGITUD</th> -->
                <th scope="col">PERSONAS</th>
                <!-- <th scope="col">FECHA ALTA</th> -->
                <th scope="col">TIPO</th>
                <th scope="col">ESTADO</th>

                <th></th>

            </tr>
            </thead>
            <tbody>
                <template v-for="punto in puntos">
                    <tr>
                        <!-- <td>{{ punto.id_punto }}</td> -->
                        <td>{{ punto.direccion }}</td>
                        <!-- <td>{{ punto.latitud }}</td> -->
                        <!-- <td>{{ punto.longitud }}</td> -->
                        <td>{{ punto.cantidad_personas }}</td>
                        <!-- <td>{{ punto.fecha_alta }}</td> -->
                        <td>{{ punto.tipo }}</td>
                        <td>{{ punto.estado ? 'Active' : 'Inactive'}}</td>

                    <td>
                        <button type="button" class="btn btn-sm btn-light" @click="showUpdate(punto)"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button>
                    </td>
                </tr>
                </template>
            </tbody>
        </table>
    </div>



    <!-- Modal Update  -->
    <div class="modal fade" id="updateModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary text-white">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-break mx-4" id="exampleModalLabel">MODIFY POINT</h1>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid" id="medForm">
                    <div class="col">
                        <div class="form-group gird-placeContent">
                            <label for="calle">Direccion</label>
                            <input class="form-control" type="text" id="calle" maxlength="250"
                                required name="calle" @change="$event => convertAddress(punto)" v-model="punto.direccion">
                        </div>
                        <div class="form-group gird-placeContent">
                            <label for="latitud">Latitud</label>
                            <input class="form-control" type="text" id="latitud" disabled maxlength="250"
                                required name="latitud" v-model="punto.latitud">
                        </div>
                        <div class="form-group gird-placeContent">
                            <label for="longitud">Longitud</label>
                            <input class="form-control" type="text" id="longitud" disabled maxlength="250"
                                required name="longitud" v-model="punto.longitud">
                        </div>
                        <div class="form-group gird-placeContent">
                            <label for="personas">Cantidad personas</label>
                            <input class="form-control" type="text" id="personas" maxlength="250"
                                required name="personas" v-model="punto.cantidad_personas">
                        </div>
                        <div class="form-group gird-placeContent">
                        <p>Tipo de punto:</p>
                            <select class="form-select" aria-label="Default select example" v-model="punto.tipo">
                                <option value="Proveedor">Proveedor</option>
                                <option value="Centro">Centro</option>
                                <option value="Homeless">Homeless</option>
                            </select>
                        </div>
                        <div class="form-group gird-placeContent">
                            <p>Punto habilitado</p>
                                <label class="switch">
                                    <input type="checkbox" name="estado" v-model="punto.estado" :checked="punto.estado == 1">
                                    <span class="slider round"></span>
                                </label>
                        </div>
                    </div>
                </div>
                    <span v-if="isError" class="badge text-bg-danger"> {{ mensajeError }}</span>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-light text-secondary btnOrdes px-5" @click="$event => updatePunto(punto)" data-bs-dismiss="modal">Pre-save point changes</button>
                    <button type="button" class="btn btn-light text-secondary btnOrdes px-5" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
import * as bootstrap from 'bootstrap'

import axios from 'axios';
export default {

    data() {
        return {
            puntos: [],
            loading: false,
            myModal: {},
            punto: {},
            mensajeError: ' ',
            isError: false,
            pendingUpdates: [],
            confirm: false,
            address: '',
            accessToken: 'pk.eyJ1IjoiZnJhbmdhYXIiLCJhIjoiY2x0M2o1bG51MXl1djJycGxoOTMxOWM2cyJ9.OvUbOSJo5uD6WNRmhBcujQ',
            coordinates: null,
            errorMessage: ''
        }
    },
    created() {
        this.fetchPuntos();
    },
    methods: {
        fetchPuntos() {
            //Show Loader
            this.loading = true;

            //Waste 5 seconds
            setTimeout(() => {
                this.loading = false;
            }, 2000)

            const me = this
            axios
                .get(`puntos`)
                .then(response => {
                    me.puntos = response.data;
                })
        },
        showUpdate(punto) {
            this.punto = punto;
            this.myModal = new bootstrap.Modal('#updateModal')
            this.myModal.show();
        },
        async convertAddress(punto) {
            try {
                const url = `https://api.mapbox.com/geocoding/v5/mapbox.places/${encodeURIComponent(punto.direccion)}.json`;
                const params = {
                access_token: this.accessToken
                };
                const response = await axios.get(url, { params });

                if (response.data.features.length > 0) {
                this.coordinates = response.data.features[0].geometry.coordinates;
                punto.latitud = this.coordinates[1];
                punto.longitud = this.coordinates[0];
                this.errorMessage = '';
                } else {
                throw new Error("No se encontraron resultados para la dirección proporcionada.");
                }
            } catch (error) {
                this.coordinates = null;
                this.errorMessage = "Ocurrió un error al obtener las coordenadas: " + error.message;
            }
        },
        updatePunto(punto) {
            const existingUpdate = this.pendingUpdates.find(item => item.id_punto === punto.id_punto);
            if (existingUpdate) {
                // Si ya hay una actualización pendiente para este menú, actualiza los datos de la actualización.
                existingUpdate.direccion = punto.direccion;
                existingUpdate.latitud = punto.latitud;
                existingUpdate.longitud = punto.longitud;
                existingUpdate.personas = punto.personas;
                existingUpdate.tipo = punto.tipo;
                existingUpdate.estado = punto.estado;
            } else {
                // Si no hay una actualización pendiente, añado una nueva actualización a la lista.
                this.pendingUpdates.push({ ...punto }); // clono el objeto para evitar referencias
            }
        },
        confirmUpdate() {
            const me = this;
            // Realizo las actualizaciones pendientes una por una
            const updatePromises = this.pendingUpdates.map(update => {
                return axios.put(`puntos/${update.id_punto}`, update);
            });

            // Cuando todas las actualizaciones se completen o fallen
            Promise.all(updatePromises)
                .then(() => {
                    //Se limpia la lista de actualizaciones pendientes
                    me.pendingUpdates = [];
                    this.confirm = true;

                    me.mensajeUpdate = 'Puntos changed'

                    setTimeout(() => {
                        this.confirm = false;
                    }, 4000);

                    me.fetchPuntos();

                })
                .catch(error => {
                    console.error('Error al actualizar puntos:', error);
                    this.error = true;
                     me.mensajeError = error.response.data.error
              });
        }

    }
};
</script>
<style>

.puntos{
    margin-bottom: 150px;
}

.btnChange {

    border-radius: 20px;
    width: 21%;
    font-size: 25px;
    align-self: center;

}

.btnPuntos{
    border-radius: 20px;
    color:#07203C !important;
}

.btnPuntos:hover{
    color: white !important;
    background-color: #07203C !important;;
}

</style>
