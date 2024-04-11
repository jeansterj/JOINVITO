<template>

<table class="table table-users container">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">CALLE</th>
        <th scope="col">LATITUD</th>
        <th scope="col">LONGITUD</th>
        <th scope="col">PERSONAS</th>
        <th scope="col">FECHA ALTA</th>
        <th scope="col">TIPO</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
        <template v-for="punto in puntos">
            <tr>
            <td>{{ punto.direccion }}</td>
            <td>{{ punto.latitud }}</td>
            <td>{{ punto.longitud }}</td>
            <td>{{ punto.cantidad_personas }}</td>
            <td>{{ punto.fecha_alta }}</td>
            <td>{{ punto.tipo }}</td>
            <td>
                <button type="button" class="btn btn-sm btn-light" @click="showUpdate()"><i class="fa fa-edit" aria-hidden="true"></i>Edit</button>
            </td>
          </tr>
        </template>
    </tbody>
  </table>

    <!-- Modal Update  -->
    <div class="modal fade" id="updateModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content bg-secondary text-white">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 text-break mx-4" id="exampleModalLabel">MODIFY MENU</h1>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid" id="medForm">
                    <div class="col">
                        <div class="form-group gird-placeContent">
                            <label for="ciudad">Direccion</label>
                            <input class="form-control" type="text" id="direccion" maxlength="250"
                                required name="ciudad">
                        </div>
                        <div class="form-group gird-placeContent">
                            <label for="direccion">Cantidad personas</label>
                            <input class="form-control" type="text" id="direccion" maxlength="250"
                                required name="direccion">
                        </div>
                        <div class="form-group gird-placeContent">
                        <p>Tipo de punto:</p>
                            <select class="form-select" aria-label="Default select example">
                                <option value="Proveedor">Proveedor</option>
                                <option value="Centro">Centro</option>
                                <option value="Homeless">Homeless</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-light btn_login" name="supplierFrom">SAVE</button>
                    </div>
                </div>
                    <span v-if="isError" class="badge text-bg-danger"> {{ mensajeError }}</span>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-light text-secondary btnOrdes px-5" @click="$event => updateMenu(menu)" data-bs-dismiss="modal">Pre-save menu changes</button>
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
            menu: {},
            mensajeError: ' ',
            isError: false,
            pendingUpdates: [],
            confirm: false
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
                    console.log(me.puntos)
                })
        },
        showUpdate() {
            // this.menu = menu;
            this.myModal = new bootstrap.Modal('#updateModal')
            this.myModal.show();
        },
        updatePunto() {

        },
        confirmUpdate() {
            const me = this;
            // Realizo las actualizaciones pendientes una por una
            const updatePromises = this.pendingUpdates.map(update => {
                return axios.put(`menu/${update.id_menu}`, update);
            });

            // Cuando todas las actualizaciones se completen o fallen
            Promise.all(updatePromises)
                .then(() => {
                    //Se limpia la lista de actualizaciones pendientes
                    me.pendingUpdates = [];
                    this.confirm = true;

                    me.mensajeUpdate = 'Menus changed'

                    setTimeout(() => {
                        this.confirm = false;

                    }, 4000);

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
</style>
