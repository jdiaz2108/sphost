
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('create-factura', require('./components/facturacion/createFactura.vue'));

Vue.component('vue-clientes', require('./components/clientes/clientes.vue'));

Vue.component('l-navbar', require('./components/topbar.vue'));

Vue.component('l-leftpanel', require('./components/leftpanel.vue'));



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
	data() {
    	return {
    		drawer: true,
    		isLoad: false
    	}
    },
    created() {
   		this.isLoad = true;
		   console.log('creada');
    },
    mounted() {
   		this.isLoad = true;
   		console.log('montada');
    }
});