
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.prototype.$eventHub = new Vue();

import VeeValidate, { Validator } from 'vee-validate';
import nb_NO from 'vee-validate/dist/locale/nb_NO';
Validator.localize('nb_NO', nb_NO);
Vue.use(VeeValidate, {
    locale: 'nb_NO'
});



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('calc-bmi', require('./components/CalcBMI.vue'));
Vue.component('calc-paint', require('./components/CalcPaint.vue'));
Vue.component('power', require('./components/Power.vue'));
Vue.component('creditcard', require('./components/Creditcard.vue'));
Vue.component('mobile', require('./components/Mobile.vue'));
Vue.component('toggle', require('./components/utilities/showhide.vue'));
Vue.component('imageslider', require('./components/utilities/imageslider.vue'));
Vue.component('productCategories', require('./components/ProductCategories.vue'));
Vue.component('flash', require('./components/utilities/flash.vue'));


const app = new Vue({
    el: '#app'
});
