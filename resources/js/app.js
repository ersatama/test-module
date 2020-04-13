require('./bootstrap');

import 'vue-toast-notification/dist/theme-sugar.css';
import VueToast from 'vue-toast-notification';
import VueMask from 'v-mask';
import VueRouter from 'vue-router';
import Money from 'v-money';

window.Vue = require('vue');
window.Vue.use(VueToast);
window.Vue.use(VueMask);
window.Vue.use(VueRouter);
window.Vue.use(Money, {precision: 4});

import order from './components/orders/OrdersComponent.vue';
import home from './components/home/HomeComponent.vue';

const routes = [
    {
        path: '/order',
        component: order
    },
    {
        path: '/home',
        component: home
    },
    {
        path: '/home/:id',
        component: home
    },
    {
        path: '/search',
        component: home
    }
];
const router = new VueRouter({ mode: 'history', routes: routes});
const app = new Vue({ router }).$mount('#app');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/OrdersComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/OrdersComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

$(document).ready(function() {
    AOS.init();
});
