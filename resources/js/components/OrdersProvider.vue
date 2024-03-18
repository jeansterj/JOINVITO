<template>
        <div class="loading" v-if="loading">
            Loading data....
        </div>
        <div v-else class="text-white py-2 text-center">ORDERS
            <div class="bg-light chartProviderOrder centerSpace my-3">
                <div class="chartRiderOrder row container my-5 ">
                    <div class="d-flex justify-content-center">
                        <div class="text-center">
                            <h2 class="text-center">{{ orders.id_pedido }}</h2>
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="row">
                            <h3 class="text-center">{{ orders.id_pedido }}</h3>
                            <h3 class="text-center">FISH</h3>
                            <h3 class="text-center">COCA-COLA</h3>
                        </div>
                    </div>

                    <div>
                        <img class="rounded mx-auto d-flex imgRiderMot" src="../../../public/img/rider-unscreen.gif" alt="riderMot">
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
            loading: false,
        }
    },
    created(){
        this.fetchEventsList();
        this.timer = setInterval(this.fetchEventsList, 60000);
    },
    methods:{
        fetchEventsList () {
            //Show Loader
            this.loading = true;

            //Waste 5 seconds
            setTimeout(() => {
                this.loading = false;
            }, 2000)

            const me = this
            const provId = document.querySelector('meta[name="userId"]').content
            axios
                .get(`api/orders/provider/${provId}`)
                .then(response => {
                    me.orders = response.data;
                })
        }
    }
};
</script>
<style>

</style>
