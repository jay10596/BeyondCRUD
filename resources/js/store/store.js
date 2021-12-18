import Vue from 'vue';
import Vuex from 'vuex';
import Cards from './modules/cards'

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        Cards
    }
});