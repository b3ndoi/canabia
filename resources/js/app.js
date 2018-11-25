
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


window.Event = new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('newsletter-component', require('./components/NewsLetter.vue'));
Vue.component('product', require('./components/ProductComponent.vue'));
Vue.component('contact', require('./components/Contact.vue'));
Vue.component('price-component', require('./components/PriceComponent.vue'));
Vue.component('side-cart', require('./components/SideCart.vue'));
Vue.component('cart', require('./components/CartComponent.vue'));

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    created(){
        // Event.$on('addedToCart', (payload) => {
        //     console.log(payload);
        // });
    }
});
