require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import { routes } from './routes';

import App from './views/layouts/App.vue';

import VueAxios from 'vue-axios';
import axios from 'axios';

axios.defaults.withCredentials = true;

import vuetify from './vuetify';

import { trnsl } from './lang/languages'

Vue.prototype.$trnsl = trnsl

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode:'history',
    routes: routes,
});

const app = new Vue({
    el: '#app',
    router: router,
    vuetify,
    render: h => h(App),
});
