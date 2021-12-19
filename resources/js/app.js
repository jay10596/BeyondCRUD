import Vue from 'vue';
import router from './router'
import App from './components/App.vue'
import store from './store/store'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

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