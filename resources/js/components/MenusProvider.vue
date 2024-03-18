<template>
    <div class="card de">
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
        </div>
</template>

<script>
export default {

    data(){
        return {
            menus: [],
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
                .get(`api/menus/provider/${provId}`)
                .then(response => {
                    me.menus = response.data;
                })
        }
    }
};
</script>
<style>

</style>
