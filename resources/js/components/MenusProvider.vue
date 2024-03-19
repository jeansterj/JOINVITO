<template>
    <!-- <div class="card de">
            <div class="card-body">
                <div class="loading" v-if="loading">
                    Loading data....
                </div>
                <template v-else v-for="menu in menus">
                    <div class="providerMenusCard">
                        <div class="row">
                            <div class="d-flex">
                                <div class="col-10">
                                    <h2 class="text-start">{{ menu.nombre_menu }}</h2>
                                </div>
                                <button type="button" class="btn btnDelete"><a href="modifyMenu">
                                    <img src="../../../public/img/editIcon.svg" alt=""></a>
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
                                    <img src="../../../public/img/deleteIcon.svg" alt="">
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div> -->
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
                                <div class="flex">
                                    <div class="col">
                                        <button type="button" class="btn btnEdit"><a href="modifyMenu">
                                            <img src="img/editIcon.svg" class="imageMenus" alt=""></a>
                                        </button>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btnDelete" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                            <img src="img/deleteIcon.svg" class="imageMenus" alt="">
                                        </button>
                                    </div>
                                </div>
                            </div>
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
.flex{
    display: flex;
}
.btnmenus{
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
    border: 1px #07df19 solid;
}

button.btn {
    width: 90% !important;
}
</style>
