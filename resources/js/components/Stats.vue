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
                        label: 'Deliveries',
                        data: [],
                        backgroundColor: ['#FFCA10'] 
                    } 
                ],
            },
            chartOptions: {
                responsive: true,
                maintainAspectRatio: false,
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
            const userType = document.querySelector('meta[name="userType"]').content
            
            let fechaActual = new Date();

            // Obtener el año actual
            let anyoActual = fechaActual.getFullYear();
            axios
                .get(`bar-chart/${userType}/${userId}/${anyoActual}`)
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

.stats{
    margin-bottom: 150px;
}

</style>
