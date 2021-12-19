import Vue from 'vue';
import router from './router'
import App from './components/App.vue'
import store from './store/store'

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import '@fortawesome/fontawesome-free/js/all.js';

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

require('./bootstrap');

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router,
    store
});