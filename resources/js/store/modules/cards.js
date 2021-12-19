const state = {
    cards: '',
    form: {
        number: '',
        cvv: '',
        owner: '',
        expiration_date: ''
    },
    status: '',
    errors: null,
    updateMode: {
        status: false,
        id: null,
        index: null
    }
};

const getters = {
    cards: state => {
        return state.cards;
    },

    form: state => {
        return state.form;
    },

    status: state => {
        return state.status;
    },

    errors: state => {
        return state.errors;
    },

    updateMode: state => {
        return state.updateMode;
    }
};

const actions = {
    fetchCards({commit, state}) {
        commit('setStatus', 'loading')

        axios.get('api/cards')
            .then(res => {
                commit('setCards', res.data.data)
                commit('setStatus', 'success')
            })
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
};

const mutations = {
    setCards(state, cards) {
        state.cards = cards
    },

    setStatus(state, status) {
        state.status = status
    },

    setErrors(state, err) {
        state.errors = err.response
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