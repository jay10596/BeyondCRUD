<template>
    <div>
        <li>{{card.id}} - {{card.number}} - {{card.owner}}</li>

        <button @click="onDelete(card.id, index)">Delete</button>
        <button @click="onUpdate(card.id, index)">Update</button>
    </div>
</template>

<script>
	import { mapGetters } from "vuex";

    export default {
        name: "Grid",

        props: [
            'card',
            'index'
        ],

        computed: {
            ...mapGetters({
                form: 'form',
                updateMode: 'updateMode'
            }),
        },

        methods: {
            onDelete(id, index) {
                this.$store.dispatch('deleteCard', {id, index})
            },

            onUpdate(id, index) {
                this.form.number = this.card.number.replace(/\s/g, "")
                this.form.cvv = this.card.cvv
                this.form.owner = this.card.owner
                this.form.expiration_date = this.card.expiration_date

                this.$store.commit('setUpdateMode', {id, index})
            }
        }
    }
</script>