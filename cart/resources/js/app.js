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
Vue.component('product-category', require('./components/Categories/ProductCategory.vue').default);
Vue.component('arrivedorder', require('./components/admin/reports/ArrivedOrder.vue').default);
Vue.component('canceledreport', require('./components/admin/reports/canceledReport.vue').default);
Vue.component('sales', require('./components/admin/reports/Sales.vue').default);
Vue.component('customer-purchases', require('./components/admin/reports/CustomerPurchases.vue').default);
Vue.component('products-by-supplier', require('./components/admin/reports/productsBySupplier.vue').default);
Vue.component('best-seller', require('./components/admin/reports/bestSeller.vue').default);
Vue.component('new-customer', require('./components/admin/reports/newCustomer.vue').default);
Vue.component('best-coupon', require('./components/admin/reports/bestcoupon.vue').default);



const app = new Vue({
    el: '#app',
    router: new VueRouter(routes)
});
