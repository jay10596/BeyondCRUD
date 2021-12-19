<template>
    <div>
        <Grid :filter=this.$route.params.filter />
    </div>
</template>

<script>
    import Grid from '../sections/card/Grid'
	import { mapGetters } from "vuex";

    export default {
        name: "Filtered",

        components: {
            Grid
        }
    }
</script>