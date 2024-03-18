<template>
    <!-- <div class="card de">
            <div class="card-body">
                <div class="loading" v-if="loading">
                    Loading data....
                </div>
                <div v-else v-for="menu in menus" class="providerMenusCard">
                    <div class="row">
                        <div class="d-flex">
                            <div class="col-10">
                                <h2 class="text-start">{{ menu.nombre_menu }}</h2>
                            </div>
                            <button type="button" class="btn btnDelete"><a href="modifyMenu">
                                <img src="img/editIcon.svg" alt=""></a>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex">
                            <div class="col-10">
                                <p class="text-start">{{ menu.bebida }}</p>
                                <p class="text-start">{{ menu.plato1 }}</p>
                                <p class="text-start">{{ menu.plato2 }}</p>
                            </div>
                            <button type="button" class="btn btnDelete" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <img src="img/deleteIcon.svg" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

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
                        <img class="rounded mx-auto d-flex imgRiderMot" src="img/rider-unscreen.gif" alt="riderMot">
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
