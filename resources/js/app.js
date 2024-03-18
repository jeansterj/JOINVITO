import './bootstrap';

import * as bootstrap from 'bootstrap'
import {createApp} from 'vue'
import MenusProvider from './components/MenusProvider.vue'
import OrdersProvider from './components/OrdersProvider.vue'
import OrdersRider from './components/OrdersRider.vue'

createApp(MenusProvider).mount('#divMenuList')
createApp(OrdersProvider).mount('#ordersProvider')
createApp(OrdersRider).mount('#ordersRider')
