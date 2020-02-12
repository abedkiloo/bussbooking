import Vue from 'vue';
import Vuex from 'vuex';

import {alert} from './alert.module';
import {towns} from './town.module';

Vue.use(Vuex);

export const store = new Vuex.Store({
    modules: {
        alert,
        towns
    }
});
