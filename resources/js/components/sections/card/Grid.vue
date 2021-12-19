<template>
    <section>
        <b-row>
            <b-col cols="4" v-for="(card, index) in cards" :key="index">
                <Tile :card=card :index=index />
            </b-col>
        </b-row>
    </section>
</template>

<script> 
    import Tile from './Tile'
	import { mapGetters } from "vuex";

    export default {
        name: "Grid",

        components: {
            Tile
        },

        computed: {
            ...mapGetters({
                cards: 'cards'
            }),
        },

        mounted() {
            this.$store.dispatch('fetchCards')
        }
    }
</script>
