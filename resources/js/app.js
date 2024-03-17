import './bootstrap';

import * as bootstrap from 'bootstrap'
import {createApp} from 'vue'
import Menus from './components/Menus.vue'
import Orders from './components/Orders.vue'

createApp(Menus).mount('#divMenuList')
createApp(Orders).mount('#ordersRider')
