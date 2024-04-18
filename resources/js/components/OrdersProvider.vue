<template>

    
    <div class="card de">
        <div class="card-body">

            <div class="row">


                <div class="loading" v-if="loading">
                    Loading data....
                </div>
                <template v-else v-for="order in orders">
                    <template v-for="pedido in order.pedidos">
                        <div v-if="pedido.entregado_a_rider == false" class="col-sm-6 mb-3 mb-sm-0">
                            <div class="card de">
                                <div class="card-body">
                                    <div class="providerMenusCard">
                                        <div class="row">
                                            <div class="d-flex">
                                                <div class="col-10">
                                                    <h2 class="text-start text-break">{{ order.nombre_menu }} - {{
                    pedido.cantidad_packs }} pack/s - De {{ pedido.id_rider }}</h2>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="d-flex">
                                                <div class="col-10">

                                                    <p class="text-start">{{ order.bebida }}</p>
                                                    <p class="text-start">{{ order.plato1 }}</p>
                                                    <p class="text-start">{{ order.plato2 }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </template>
                </template>
            </div>
        </div>
    </div>

</template>

<script>

import axios from 'axios';
export default {

    data() {
        return {
            orders: [],
            loading: false,
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
                .get(`orders/provider/${provId}`)
                .then(response => {
                    me.orders = response.data;
                })
        }
    }
};
</script>
<style></style>
