<template>
    <div class="accordion " id="accordionExample">
        <div class="accordion-item ">
            <h2 class="accordion-header">
                <button class="accordion-button bg-light collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">

                    <img class="rounded mx-auto d-flex imgRiderMot" src="img/rider-unscreen.gif"
                        alt="riderMot">

                    <h1 v-if="!empty">SHOW ORDERS LIST</h1>
                    <h1 v-else="empty">THERE ARE NO ORDERS</h1>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body bg-light">
                    <ul>
                        <li v-for="order in orders" class="riderOrderCard"><a href="">{{ order.cantidad_packs }} PACK TO COLLECT</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    data(){
        return {
            orders: [],
            empty:true
        }
    },
    created(){
        this.fetchEventsList();
        this.timer = setInterval(this.fetchEventsList, 60000);
    },
    methods:{
        fetchEventsList () {

            //Waste 5 seconds
            setTimeout(() => {
                this.loading = false;
            }, 1000)

            const me = this
            const riderId = document.querySelector('meta[name="userId"]').content

            axios
                .get(`api/orders/rider/${riderId}`)
                .then(response => {
                    me.orders = response.data;
                    me.orders.length > 0 ? me.empty = false : me.empty = true;
                })
        }
    }
};
</script>
<style>

</style>
