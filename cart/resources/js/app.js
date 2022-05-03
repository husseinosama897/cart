require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router'

import routes from './routes'

Vue.use(VueRouter)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('suppliers', require('./components/Suppliers.vue').default);
Vue.component('cart', require('./components/Cart/Cart.vue').default);

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
