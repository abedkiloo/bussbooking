import VueRouter from 'vue-router'
import Vuex from 'vuex'

require('./bootstrap');

window.Vue = require('vue');
import routes from './routes'
// import { routes } from './_helpers';
import { store } from './_store';


Vue.use(VueRouter)
Vue.use(Vuex)



Vue.component('bus-company', require('./components/BusCompanies.vue'));

const router = new VueRouter({
    mode: 'history',
    history: true,
    routes
})


const app = new Vue({
    el: '#app',
    router: router,
    store,

});
