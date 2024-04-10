<template>
    <div class="accordion " id="accordionExample">
        <div class="accordion-item ">
            <h2 class="accordion-header">
                <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">

                    <img class="rounded mx-auto d-flex imgRiderMot" src="../../../public/img/rider-unscreen.gif"
                        alt="riderMot">

                    <h1 v-if="!empty">SHOW ORDERS LIST</h1>
                    <h1 v-else="empty">THERE ARE NO ORDERS</h1>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-light">
                    <ul>
                        <template v-for="order in orders">
                                <li v-if="order.entregado_a_rider == 1" class="riderOrderCard">
                                    <div class="orderInfo">
                                        <h3>{{ order.menu.proveedor.nombre }}</h3>
                                        <p>{{ order.cantidad_packs }} {{ order.menu.nombre_menu }} COLLECTED</p>
                                    </div>
                                </li>
                                <li v-if="order.entregado_a_rider == 0" class="riderOrderCard">
                                    <div class="orderInfo">
                                        <h3>{{ order.menu.proveedor.nombre }} - {{ order.menu.proveedor.direccion }}</h3>
                                        <p>{{ order.cantidad_packs }} {{ order.menu.nombre_menu }} TO COLLECT</p>
                                    </div>
                                </li>
                        </template>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

import axios from 'axios';

export default {

    data(){
        return {
            orders: [],
            empty:true
        }
    },
    created(){
        this.fetchOrdersList();
        this.timer = setInterval(this.fetchOrdersList, 60000);
    },
    methods:{
        fetchOrdersList () {

            //Waste 5 seconds
            setTimeout(() => {
                this.loading = false;
            }, 1000)

            const me = this
            const riderId = document.querySelector('meta[name="userId"]').content

            axios
                .get(`orders/rider/${riderId}`)
                .then(response => {

                    console.log(response.data)

                    // let totalOrdersAvailable = 0;
                    // response.data.forEach(element => {
                    //     totalOrdersAvailable += element.cantidad_packs
                    //     sessionStorage.setItem('totalOrdersAvailable',totalOrdersAvailable)
                    // });


                    me.orders = response.data;
                    me.orders.length > 0 ? me.empty = false : me.empty = true;
                })
        }
    }
};
</script>
<style>

</style>
