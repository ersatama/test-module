require('./bootstrap');

import 'vue-toast-notification/dist/theme-sugar.css';
import VueToast from 'vue-toast-notification';
import VueTheMask from 'vue-the-mask';
import VueRouter from 'vue-router';

window.Vue = require('vue');
window.Vue.use(VueToast);
window.Vue.use(VueTheMask);
window.Vue.use(VueRouter);

import order from './components/orders/OrdersComponent.vue';
import home from './components/home/HomeComponent.vue';

const routes = [
    {
        path: '/order',
        name: 'order',
        component: order
    },
    {
        path: '/home',
        name: 'home',
        component: home
    },
    {
        path: '/home/:id',
        name: 'search',
        component: home
    },
    {
        path: '/search',
        name: 'search',
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
/*$(document).ready(function() {

var token = $("meta[name='csrf-token']").attr("content");

    AOS.init();

    $(".receiver-hide").bind('click', function(event) {
        event.preventDefault();

        $(this).toggleClass('reverse').closest('.form-receiver ').find('.view-block').fadeToggle(0);

    });

    $(".receiver-delete").bind('click', function(event) {
        event.preventDefault();

        $(this).closest('.form-receiver').remove();

    });

    $(".new-receiver").bind('blur',function(event) {
    	return;
    	event.preventDefault();
    	event.stopPropagation();
    	var count = 1;
    	count++;
        var count = $(".form-receiver").length;

        $(".receiver-hide").bind('click', function(event) {

            event.preventDefault();

            $(this).toggleClass('reverse').closest('.form-receiver ').find('.view-block').fadeToggle(0);

        });

        $(".receiver-delete").bind('click', function(event) {
            event.preventDefault();

            $(this).closest('.form-receiver').remove();

        });
    });
});*/
