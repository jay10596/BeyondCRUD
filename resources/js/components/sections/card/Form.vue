<template>
    <section class="section-form">
        <Title :title="'Add Card'" />

        <b-form inline class="box" @submit="onSubmit" @reset="onReset">
            <b-row>
                <b-col>
                    <b-form-group label="Card No:" label-for="input-1" description="Do not include any space.">
                        <b-form-input v-model="form.number" type="number" id="number" placeholder="1111222233334444"></b-form-input>

                        <b-form-invalid-feedback v-if="errors && errors.number" :state=false>
                            <small v-for="(error, index) in errors.number" :key="index">
                                {{error}}
                            </small>
                        </b-form-invalid-feedback>
                    </b-form-group>
                </b-col>

                <b-col>
                    <b-form-group label="CVV:" label-for="input-1" description="Only 3 digits are allowed.">
                        <b-form-input v-model="form.cvv" type="number" placeholder="754"></b-form-input>

                        <b-form-invalid-feedback v-if="errors && errors.cvv" :state=false>
                            <small v-for="(error, index) in errors.cvv" :key="index">
                                {{error}}
                            </small>
                        </b-form-invalid-feedback>
                    </b-form-group>
                </b-col>
            </b-row>

            <b-row>
                <b-col>
                    <b-form-group label="Owner:" label-for="input-1">
                        <b-form-input v-model="form.owner" type="text" placeholder="Jack Masvidal"></b-form-input>

                        <b-form-invalid-feedback v-if="errors && errors.owner" :state=false>
                            <small v-for="(error, index) in errors.owner" :key="index">
                                {{error}}
                            </small>
                        </b-form-invalid-feedback>
                    </b-form-group>
                </b-col>
                
                <b-col>
                    <b-form-group label="Expiration Date:" label-for="input-1">
                        <b-form-input v-model="form.expiration_date" type="date"></b-form-input>

                        <b-form-invalid-feedback v-if="errors && errors.expiration_date" :state=false>
                            <small v-for="(error, index) in errors.expiration_date" :key="index">
                                {{error}}
                            </small>
                        </b-form-invalid-feedback>
                    </b-form-group>
                </b-col>
            </b-row>

            <div class="form-btn">
                <b-button type="submit"  variant="dark" class="btn">Submit</b-button>
                <b-button type="reset"  variant="danger" class="btn">Reset</b-button>
            </div>
        </b-form>
    </section>
</template>

<script>
    import Title from './Title.vue'
	import { mapGetters } from "vuex";

    export default {
        name: "Form",

        components: {
            Title
        },

        computed: {
            ...mapGetters({
                form: 'form',
                updateMode: 'updateMode',
                errors: 'errors'
            })
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
