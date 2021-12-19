<template>
    <div>
        <Form />

        <Grid />
    </div>
</template>

<script>
    import Form from '../sections/card/Form'
    import Grid from '../sections/card/Grid'
	import { mapGetters } from "vuex";

    export default {
        name: "Home",

        components: {
            Form,
            Grid
        },
    }
</script>