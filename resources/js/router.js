import Vue from 'vue'
import VueRouter from 'vue-router'

import Home from './components/pages/Home'
import Filtered from './components/pages/Filtered'

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: Home},
        { path: '/:filter', component: Filtered},
    ],
    mode: 'history',
    hash: false
});