<template>

    <div class="container adminHome">
        <div class="row margin-top">
            <h2>ASIGNACIÓN DE PEDIDO A UN RIDER</h2>
        </div>
        <div class="row">
            <div class="col">                
                <h3>SELECT MENU</h3>
                <div class="container-fluid bg-body-tertiary">
                    <li class="nav-item">
                        <h4>Proveedor 1
                        </h4>
                        <ul>
                            <div class="row">
                                <div class="col">
                                    Menu Sano
                                </div>
                                <div class="col">
                                    5 packs
                                </div>
                            </div>
                        </ul>
                    </li>
                </div>
                
            </div>
            <div class="col">
                <h3>SELECT RIDER</h3>
                <div class="container-fluid bg-body-tertiary rider">
                    Rider 1
                </div>                
            </div>
            <div class="col">
                
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
            // menus: [],
            // loading: false,
            // myModal: {},
            // menu: {},
            // mensajeError: ' ',
            // isError: false,
            // pendingUpdates: [],
            // confirm: false

        }
    },
    created() {
        this.fetchEventsList();
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
        }

    }
};
</script>
<style>

li{
    list-style: none;
    color: black;
}

ul{
    padding: 0;
}

.rider{
    color: black;
    padding: 10px;
}

</style>
