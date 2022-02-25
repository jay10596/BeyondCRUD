<template>
    <section>
        <Title :title="'All Cards'" />

        <b-row>
            <b-col cols="4" v-for="(card, index) in cards" :key="card.id + '-key'">
                <Tile :card=card :index=index :type=card.type />
            </b-col>
        </b-row>
    </section>
</template>

<script> 
    import Title from './Title'
    import Tile from './Tile'
	import { mapGetters } from "vuex";

    export default {
        name: "Grid",

        props: [
            'filter'
        ],

        components: {
            Tile,
            Title
        },

        computed: {
            ...mapGetters({
                cards: 'cards'
            }),
        },

        mounted() {
            this.$store.dispatch('fetchCards', this.filter)
        }
    }
</script>
