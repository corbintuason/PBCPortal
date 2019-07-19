
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vuelidate from 'vuelidate' 
Vue.use(Vuelidate)

import Vue from 'vue'
import BootstrapVue from 'bootstrap-vue'

Vue.use(BootstrapVue)

// window.Form = Form;
// Vue.component(HasError.name, HasError)
// Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueProgressBar from 'vue-progressbar'
Vue.use(VueProgressBar, {
  colors: 'rgb(143, 255, 199',
  failedColor: 'red',
  height: '3px'
})

import VueMoment from 'vue-moment'
Vue.use(VueMoment);

import {GoogleCharts} from 'google-charts';
window.GoogleCharts = GoogleCharts;

import swal from 'sweetalert2'
window.swal = swal;

const toast = swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

window.toast = toast;

import Navbar from './components/Globals/Navbar.vue';
Vue.component('navbar', Navbar);

import DonorNavbar from './components/Globals/DonorNavbar.vue'
Vue.component('donor-navbar', DonorNavbar);

/**  
 * Routes for Vue
*/

let routes = [
    { path: '/dashboard', name: 'Dashboard', component: require('./components/Admin/Dashboard.vue').default },
    { path: '/profile', name: 'Profile', component: require('./components/Admin/Profile.vue').default },
    { path: '/bloodInventory', name: 'Blood Inventory', component: require('./components/Admin/BloodInventory.vue').default },
    { path: '/donorsAgencies', name: 'Donors and Agencies', component: require('./components/Admin/DonorsAndAgencies.vue').default },
    { path: '/bloodRequest', name: 'Blood Request', component: require('./components/Admin/BloodRequest.vue').default },
    { path: '/demandPlanning', name: 'Demand Planning', component: require('./components/Admin/DemandPlanning.vue').default },
    { path: '/administrations', name:'Administrations', component: require('./components/Admin/Administrations.vue').default },
    { path: '/bloodPrograms', name: 'Blood Programs', component: require('./components/Admin/BloodPrograms.vue').default },

    // /** PATHS TO BLOOD INVENTORY */

    // /**1.) Blood Unit  */

    // { path: '/bloodInventory/registerUnit', component: require('./components/pages/Blood Inventory/Blood Unit/RegisterBloodUnit.vue').default },
    { path: '/bloodInventory/bloodTyping', component: require('./components/Admin/Blood Inventory/Blood Unit/BloodTyping.vue').default },
    { path: '/bloodInventory/bloodProcessing', component: require('./components/Admin/Blood Inventory/Blood Unit/BloodProcessing.vue').default },
    { path: '/bloodInventory/bloodTesting', component: require('./components/Admin/Blood Inventory/Blood Unit/BloodTesting.vue').default },
    // { path: '/bloodInventory/bloodReactions', component: require('./components/pages/Blood Inventory/Blood Unit/BloodReactions.vue').default },
    // { path: '/bloodInventory/bloodDiscard', component: require('./components/pages/Blood Inventory/Blood Unit/BloodDiscard.vue').default },

    // /**2.) Blood Stocks  */

    // /** PATHS TO DONORS AND AGENCIES */

    { path: '/donorsAgencies/donors', component: require('./components/Admin/Donors and Agencies/Donors.vue').default },
    { path: '/donorsAgencies/agencies', component: require('./components/Admin/Donors and Agencies/Agencies.vue').default },
    
    // /** PATHS TO BLOOD PROGRAMS */
    { path: '/bloodPrograms/MBDs', component: require('./components/Admin/Blood Programs/MBDs.vue').default },
    { path: '/bloodPrograms/MBDs/:mbd_id', name:'show-mbd', component: require('./components/Admin/Blood Programs/MBDs/ShowMBD.vue').default },
    { path: '/bloodPrograms/Walkins', component: require('./components/Admin/Blood Programs/Walkins.vue').default },
  
  
  /* DONOR RELATED PATHS ONLY*/
  { path: '/home', name: 'Home', component: require('./components/Donor/Home.vue').default },
  { path: '/requestBlood', name: 'Request Blood', component: require('./components/Donor/RequestBlood.vue').default },
  { path: '/myAgencies', name: 'My Agencies', component: require('./components/Donor/MyAgencies.vue').default },


  
  ]

const router = new VueRouter({
    mode: 'history',
    routes 
})

// Global Filters 
Vue.filter('upText', function(text){
  return text.toUpperCase();
});

Vue.filter('properDate', function(date){
  return moment(created).format(date);
});

// Window Firing
window.Fire = new Vue();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});
