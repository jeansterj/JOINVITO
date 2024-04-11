import './bootstrap';

import * as bootstrap from 'bootstrap'
import {createApp} from 'vue'
import MenusProvider from './components/MenusProvider.vue'
import OrdersProvider from './components/OrdersProvider.vue'
import OrdersRider from './components/OrdersRider.vue'
import Map from './components/Map.vue'
import Stats from './components/Stats.vue'
import { setLanguage, getSelectedLanguage } from './translations.js';


createApp(MenusProvider).mount('#divMenuList')
createApp(OrdersProvider).mount('#ordersProvider')
createApp(OrdersRider).mount('#ordersRider')
createApp(Map).mount('#map')
createApp(Stats).mount('#stats')

document.addEventListener ('DOMContentLoaded', function () {

    const selectedLanguage = getSelectedLanguage();
    
    setLanguage(selectedLanguage);
    })
