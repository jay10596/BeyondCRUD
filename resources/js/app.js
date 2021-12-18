import Vue from 'vue';
import router from './router'
import App from './components/App.vue'
import store from './store/store'

require('./bootstrap');

import '@fortawesome/fontawesome-free/css/all.css'
import '@fortawesome/fontawesome-free/js/all.js'

window.Vue = require('vue');

const app = new Vue({
    el: '#app',
    components: {
        App
    },
    router,
    store
});