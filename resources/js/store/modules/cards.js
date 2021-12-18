const state = {
    cards: '',
    status: '',
    errors: null,
};

const getters = {
    cards: state => {
        return state.cards;
    },

    status: state => {
        return state.status;
    },

    errors: state => {
        return state.errors;
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

    createPost({commit, state}) {
        axios.post('/api/posts', {body: state.body})
            .then(res => {
                commit('pushPost', res.data)
                commit('setPostBody', '')
            })
            .catch(err => commit('setPostErrors', err))
    },

    updatePost({commit, state}, post) {
        axios.put('/api/cards/' + post.id, {body: post.body, image: post.image})
            .then(res => {
                commit('pushPost', res.data)
                commit('setPostBody', '')
            })
            .catch(err => commit('setPostErrors', err))
    },

    deletePost({commit, state}, data) {
        axios.delete('/api/posts/' + data.post_id)
            .then(res => {
                commit('splicePost', data)
            })
            .catch(err => commit('setPostErrors', err))
    },
};

const mutations = {
    setCards(state, cards) {
        state.cards = cards
    },

    setStatus(state, status) {
        state.postStatus = status
    },

    setErrors(state, err) {
        state.postErrors = err.response
    },

    setPostBody(state, body) {
        state.body = body
    },

    pushPost(state, newPost) {
        state.posts.unshift(newPost.data)
    },

    splicePost(state, data) {
        state.posts.splice(data.index, 1)
    },

    cancelEdit(state, post) {
        state.posts.unshift(post)
    },

    pushLikes(state, data) {
        state.posts[data.index].likes = data.likes
    },
};

export default {
    state, getters, actions, mutations
}