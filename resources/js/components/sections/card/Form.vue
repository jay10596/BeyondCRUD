<template>
    <div>
        <b-form inline @submit="onSubmit" @reset="onReset">
            <b-form-input v-model="form.number" type="number" placeholder="Enter 16 digit card no."></b-form-input>
            <b-form-input v-model="form.cvv" type="number" placeholder="CVV"></b-form-input>
            <b-form-input v-model="form.owner" type="text" placeholder="Greg Masvidal"></b-form-input>
            <b-form-input v-model="form.expiration_date" type="date" placeholder="2020/10"></b-form-input>

            <b-button type="submit" variant="primary">Submit</b-button>
            <b-button type="reset" variant="danger">Clear</b-button>
        </b-form>
    </div>
</template>

<script>
	import { mapGetters } from "vuex";

    export default {
        name: "Form",

        computed: {
            ...mapGetters({
                form: 'form',
                updateMode: 'updateMode'
            }),
        },

        methods: {
            onSubmit(event) {
                event.preventDefault()

                this.$store.commit('setForm', this.form)

                this.updateMode.status ? this.$store.dispatch('updateCard') : this.$store.dispatch('addCard')
            },

            onReset(event) {
                event.preventDefault()

                this.$store.commit('unsetForm')
                this.$store.commit('unsetUpdateMode')
            }
        }
    }
</script>
