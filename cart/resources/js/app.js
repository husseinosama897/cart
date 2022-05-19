require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router'

import routes from './routes'

Vue.use(VueRouter)


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('suppliers', require('./components/Suppliers/Suppliers.vue').default);
Vue.component('supplier', require('./components/Suppliers/Supplier.vue').default);
Vue.component('view-cart', require('./components/Cart/Cart.vue').default);
Vue.component('view-product', require('./components/Products/View.vue').default);
Vue.component('create-packing', require('./components/Packing/CreatePacking.vue').default);
Vue.component('categories', require('./components/Categories/Categories.vue').default);

const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
