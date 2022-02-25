const state = {
    cards: '',
    form: {
        number: '',
        cvv: '',
        owner: '',
        expiration_date: ''
    },
    errors: null,
    updateMode: {
        status: false,
        id: null,
        index: null
    },
    payload: null
};

const getters = {
    cards: state => {
        return state.cards;
    },

    form: state => {
        return state.form;
    },

    errors: state => {
        return state.errors;
    },

    updateMode: state => {
        return state.updateMode;
    },

    payload: state => {
        return state.payload;
    }
};

const actions = {
    fetchCards({commit, state}, filter) {
        filter ? state.payload = 'api/cards/' + filter : state.payload = 'api/cards'

        axios.get(state.payload)
            .then(res => commit('setCards', res.data.data))
            .catch(err => commit('setErrors', err))
    },

    addCard({commit, state}) {
        axios.post('/api/cards', state.form)
            .then(res => {
                commit('unsetForm')
                commit('pushCard', res.data)
                commit('unsetUpdateMode')
            })
            .catch(err => commit('setErrors', err))
    },

    updateCard({commit, state}) {
        axios.put('/api/cards/' + state.updateMode.id, state.form)
            .then(res => {
                commit('spliceCard', state.updateMode.index)
                commit('unsetForm')
                commit('unsetUpdateMode')
                commit('pushCard', res.data)
            })
            .catch(err => commit('setErrors', err))
    },

    deleteCard({commit, state}, data) {
        axios.delete('/api/cards/' + data.id)
            .then(res => commit('spliceCard', data.index))
            .catch(err => commit('setErrors', err))
    },

    showCard({commit, state}) {
        axios.get('/api/cards/qweqwe')
            .then(res => console.log(res))
            .catch(err => commit('setErrors', err))
    },
};

const mutations = {
    setCards(state, cards) {
        state.cards = cards
    },

    setErrors(state, err) {
        state.errors = err.response.data.errors
    },

    setForm(state, form) {
        state.form = form
    },

    unsetForm(state) {
        state.form = {
            number: '',
            cvv: '',
            owner: '',
            expiration_date: ''
        }

        state.errors = null
    },

    setUpdateMode(state, data) {
        state.updateMode = {
            status: true,
            id: data.id,
            index: data.index,
        }
    },

    unsetUpdateMode(state) {
        state.updateMode = {
            status: false,
            id: null,
            index: null
        }
    },

    pushCard(state, newCard) {
        state.cards.unshift(newCard)
    },

    spliceCard(state, index) {
        state.cards.splice(index, 1)
    }
};

export default {
    state, getters, actions, mutations
}