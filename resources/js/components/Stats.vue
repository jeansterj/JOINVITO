<template>
    <Bar v-if="!isLoading" id="barChart" :options="chartOptions" :data="chartData" />
</template>

<script>

import { Bar } from 'vue-chartjs'
import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js'
ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
import axios from 'axios';

export default {

    name: 'BarChart',
    components: { Bar },
    data() {
        return {
            chartData: {
                labels: [],
                datasets: [ 
                    { 
                        data: [],
                        backgroundColor: ['#FFCA10'] 
                    } 
                ],
            },
            chartOptions: {
                responsive: true
            },
            isLoading:true
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {

            const me = this
            const userId = document.querySelector('meta[name="userId"]').content
            axios
                .get(`bar-chart/${userId}`)
                .then(response => {
                    
                    me.chartData.labels = response.data.labels;
                    me.chartData.datasets[0].data = response.data.data;

                    me.isLoading = false;

                    // me.chartData.labels = response.data.labels;
                    // me.chartData.datasets[0].data = response.data.data;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        }

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
