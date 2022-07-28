
/* require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
});
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue';
import VueRouter from 'vue-router';
import { routes } from './routes';

import App from './views/App.vue';

import VueAxios from 'vue-axios';
import axios from 'axios';

import vuetify from './vuetify';

import { store } from './store/store';

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
    store
});

// app.use(store)
