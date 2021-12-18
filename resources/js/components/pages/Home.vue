<template>
    <div>
        {{cards}}
    </div>
</template>

<script>
	import { mapGetters } from "vuex";

    export default {
        name: "Home",

        computed: {
            ...mapGetters({
                cards: 'cards'
            }),
        },

        mounted() {
            this.$store.dispatch('fetchCards')
        },
    }
</script>