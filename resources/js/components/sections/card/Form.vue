<template>
    <section class="section-form">
        <b-form inline class="box" @submit="onSubmit" @reset="onReset">
            <b-row>
                <b-col>
                    <b-form-group label="Email address:" label-for="input-1" description="Do not include any space." feedback="fuck">
                        <b-form-input v-model="form.number" type="number" id="number" placeholder="Enter 16 digit card no."></b-form-input>

                        <b-form-invalid-feedback>Your user ID must be 5-12 characters long.</b-form-invalid-feedback>
                    </b-form-group>
                </b-col>

                <b-col>
                    <b-form-group label="Email address:" label-for="input-1" description="Do not include any space." feedback="fuck">
                        <b-form-input v-model="form.cvv" type="number" placeholder="CVV"></b-form-input>

                        <b-form-invalid-feedback>Your user ID must be 5-12 characters long.</b-form-invalid-feedback>
                    </b-form-group>
                </b-col>
            </b-row>

            <b-row>
                <b-col>
                    <b-form-group label="Email address:" label-for="input-1" description="Do not include any space." feedback="fuck">
                        <b-form-input v-model="form.owner" type="text" placeholder="Greg Masvidal"></b-form-input>

                        <b-form-invalid-feedback>Your user ID must be 5-12 characters long.</b-form-invalid-feedback>
                    </b-form-group>
                </b-col>
                
                <b-col>
                    <b-form-group label="Email address:" label-for="input-1" description="Do not include any space." feedback="fuck">
                        <b-form-input v-model="form.expiration_date" type="date" placeholder="2020/10"></b-form-input>

                        <b-form-invalid-feedback>Your user ID must be 5-12 characters long.</b-form-invalid-feedback>
                    </b-form-group>
                </b-col>
            </b-row>

            <b-button type="submit" class="btn-primary">Submit</b-button>
            <b-button type="reset" class="btn-seconfdary">Clear</b-button>
        </b-form>
    </section>
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
