import {userService} from '../_services';
import {router} from '../_helpers';


const state = {
    all: {}
};

const actions = {
    getAll({commit}) {
        commit('getAllRequest');

        userService.getAll()
            .then(
                towns => commit('getAllSuccess', towns),
                error => commit('getAllFailure', error)
            );
    },

};

const mutations = {
    getAllRequest(state) {
        state.all = {loading: true};
    },
    getAllSuccess(state, users) {
        state.all = {items: users};
    },
    getAllFailure(state, error) {
        state.all = {error};
    },
};

export const towns = {
    namespaced: true,
    state,
    actions,
    mutations
};
