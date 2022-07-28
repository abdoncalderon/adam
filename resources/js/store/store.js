import axios from 'axios';
import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state() {
        return {
            showMenu: false
        }
    },
    mutations: {
        change (state) {
            state.showMenu=!state.showMenu
        }
    }
})