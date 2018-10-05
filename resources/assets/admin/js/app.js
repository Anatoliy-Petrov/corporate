/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./common');
require('./offices');
require('./vacancy');
require('./calculator');


require('chosen-js');
require('jquery-timepicker/jquery.timepicker');
require('bootstrap-datepicker');
require('./actions');
require('./clients');


// window.Vue = require('vue');
/**
 + * Next, we will create a fresh Vue application instance and attach it to
 + * the page. Then, you may begin adding components to this application
 + * or customize the JavaScript scaffolding to fit your unique needs.
 + */
Vue.component('image-component', require('./components/ImageComponent.vue'));
Vue.component('statuses', require('./components/Statuses.vue'));
// Vue.component('status', require('./components/Status.vue'));
Vue.component('calculator-price', require('./components/CalculatorPrice.vue'));
Vue.component('calculator-rates', require('./components/CalculatorRates.vue'));
Vue.component('flash', require('./components/Flash.vue'));

const app = new Vue({
    el: '#main'
});
