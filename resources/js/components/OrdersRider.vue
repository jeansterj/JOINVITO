<template>
    <div class="accordion " id="accordionOrders">
        <div class="accordion-item ">
            <h2 class="accordion-header">
                <button v-if="!empty" class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">

                    <img class="rounded mx-auto d-flex imgRiderMot" src="../../../public/img/rider-unscreen.gif"
                        alt="riderMot">

                    <h1 >SHOW ORDERS LIST</h1>
                </button>
                <button v-if="empty" class="accordion-button bg-light collapsed" type="button">

                    <img class="rounded mx-auto d-flex imgRiderMot" src="../../../public/img/rider-unscreen.gif"
                        alt="riderMot">

                    <h1 >THERE ARE NO ORDERS TO COLLECT/DELIVER</h1>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-light">
                    <ul>
                        <template v-for="order in orders">
                                <li v-if="order.entregado_a_rider == 1" class="riderOrderCard">
                                    <div class="orderInfo">
                                        <h3>{{ order.menu.proveedor.nombre }}</h3>
                                        <p>{{ order.cantidad_packs }} {{ order.menu.nombre_menu }} AVAILABLE TO DELIVER</p>
                                    </div>
                                </li>
                                <li v-if="order.entregado_a_rider == 0" class="riderOrderCard">
                                    <div class="orderInfo">
                                        <h3>{{ order.menu.proveedor.nombre }} - {{ order.menu.proveedor.direccion }}</h3>
                                        <p>{{ order.cantidad_packs }} {{ order.menu.nombre_menu }} WAITING TO BE COLLECTED</p>
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

                    me.orders = response.data;
                    me.orders.length > 0 ? me.empty = false : me.empty = true;
                })
        }
    }
};
</script>
<style>

#accordionOrders button.bg-light:hover,
#accordionOrders button.bg-light:focus{
    background-color: #FFCA10 !important;
}

/* a.bg-light:focus, a.bg-light:hover, button.bg-light:focus, button.bg-light:hover {
    background-color: #FFCA10 !important;
} */

</style>
