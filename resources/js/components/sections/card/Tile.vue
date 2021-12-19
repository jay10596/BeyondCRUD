<template>
    <div class="section-tile box">
         <b-row align-h="between" class="card-top">
            <b-col>
                <h6 class="card-date">{{changeDateFormat(card.expiration_date)}}</h6>
            </b-col>

            <b-col class="d-flex justify-content-end icons">
                <button @click="onUpdate(card.id, index)"><i class="far fa-edit"></i></button>
                <button @click="onDelete(card.id, index)"><i class="far fa-trash-alt"></i></button>
            </b-col>
        </b-row>

        <b-row class="card-middle">
            <b-col class="d-flex justify-content-between align-items-center">
                <div v-if="card.type == 'Mastercard'">
                    <i class="fab fa-cc-mastercard"></i>
                </div>
                <div v-else-if="card.type == 'Visa'">
                    <i class="fab fa-cc-visa"></i>
                </div>
                <div v-else-if="card.type == 'Discover'">
                    <i class="fab fa-cc-discover"></i>
                </div>
                <div v-else>
                    <i class="fas fa-sim-card"></i>
                </div>

                <h5 class="card-number">{{card.number}}</h5>
            </b-col>
        </b-row>

        <b-row class="card-bottom">
            <b-col class="d-flex justify-content-between align-items-center">
                <h6 class="card-owner">{{card.owner}}</h6>
                
                <h6 class="card-cvv">CVV: {{card.cvv}}</h6>
            </b-col>
        </b-row>
    </div>
</template>

<script>
    import moment from 'moment'
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
            },

            changeDateFormat(date) {
                return moment(String(date)).format('MM/YYYY')
            }
        }
    }
</script>