<template>
    <div class="card de">
        <div class="card-body">
            <div class="loading" v-if="loading">
                Loading data....
            </div>
            <div v-else v-for="menu in menus" class="providerMenusCard">
                <div class="row">
                    <div class="d-flex">
                        <div class="col">
                            <h2 class="text-start">{{ menu.nombre_menu }}</h2>
                            <p class="text-start">{{ menu.bebida }}</p>
                            <p class="text-start">{{ menu.plato1 }}</p>
                            <p class="text-start">{{ menu.plato2 }}</p>
                            <p class="text-start">{{ menu.cantidad_packs }}</p>
                            <div class="flex">
                                <div class="col">
                                    <button type="button" class="btn btnEdit" @click="$event => showUpdate(menu)">
                                        <img src="../../../public/img/editIcon.svg" class="imageMenus" alt="">
                                    </button>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btnDelete" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <img src="../../../public/img/deleteIcon.svg" class="imageMenus" alt="">
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Update  -->
    <div class="modal fade" id="updateModal" tabindex="-1" >
        <div  class="modal-dialog">
            <div class="modal-content bg-secondary text-white">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-break mx-4" id="exampleModalLabel">MODIFY MENU</h1>
                </div>
                <div class="modal-body">
                    <form>
                        <div  class="container-fluid" id="medForm">
                            <div class="col">
                                <div class="form-group gird-placeContent">
                                    <label for="nombre_menu">Name Menu</label>
                                    <input class="form-control" type="text" id="nombre_menu" maxlength="50"
                                        placeholder="Pasta" name="nombre_menu" required v-model="menu.nombre_menu">
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="plato1">Plate 1</label>
                                    <input class="form-control" type="text" id="plate1" maxlength="50"
                                        placeholder="Pasta" name="plato1" required v-model="menu.plato1">
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="plato2">Plate 2</label>
                                    <input class="form-control" type="text" id="plate2" maxlength="50"
                                        placeholder="Pizza" name="plato2" required v-model="menu.plato2">
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="bebida">Drink</label>
                                    <input class="form-control" type="text" id="drink" maxlength="50"
                                        placeholder="Cocacola" name="bebida" required v-model="menu.bebida">
                                </div>
                                <div class="form-group gird-placeContent">
                                    <label for="cantidad_packs">Amount</label>
                                    <input class="form-control" type="number" id="amount" maxlength="2" value="0"
                                        name="cantidad_packs" required v-model="menu.cantidad_packs">
                                </div>
            
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-around">
                    <button type="button" class="btn btn-light text-secondary btnOrdes px-5" @click="$event => editMenu()">CHANGE MENU</button>

                    <button type="button" class="btn btn-light text-secondary btnOrdes px-5"
                        data-bs-dismiss="modal">NO</button>
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
            menus: [],
            loading: false,
            myModal: {},
            menu: {}

        }
    },
    created() {
        this.fetchEventsList();
        this.timer = setInterval(this.fetchEventsList, 60000);
    },
    methods: {
        fetchEventsList() {
            //Show Loader
            this.loading = true;

            //Waste 5 seconds
            setTimeout(() => {
                this.loading = false;
            }, 2000)

            const me = this
            const provId = document.querySelector('meta[name="userId"]').content
            axios
                .get(`menus/provider/${provId}`)
                .then(response => {
                    me.menus = response.data;
                })
        },
        showUpdate(menu) {
            this.menu = menu;
            this.myModal = new bootstrap.Modal('#updateModal')
            this.myModal.show();
        },
        editMenu() {
            const me = this;
            axios
            .put(`menu/${me.menu.id_menu}`, me.menu)

                .then(response => {
                    me.myModal.hide();
                })
                .catch(error => {
                    this.error = true;
                    console.error('Error al editar el menú:', error);
                });


        },
        
    }
};
</script>
<style>
.flex {
    display: flex;
}

.btnmenus {
    border: 1px;
}

img.imageMenus {
    width: 35px !important;
}

button.btnDelete {
    border: 1px #a01010 solid !important;
    background-color: #a01010;
}

button.btnEdit {
    background-color: #07203C;
}

button.btnEdit:hover {
    background-color: #07203C;
}

button.btnDelete:hover {
    background-color: #a01010;
}

button.btn {
    width: 90% !important;
}
</style>
