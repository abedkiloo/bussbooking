import Vue from 'vue';
import Router from 'vue-router';
import Home from './../components/Home.vue'
import BusCompany from './../components/BusCompanies.vue'


Vue.use(Router);

export const routes = new Router({
    mode: 'history',
    routes: [
        {path: '/', component: Home},
        {path: '/bus-company', component: BusCompany}
    ]
});
