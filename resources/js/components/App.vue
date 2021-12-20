<template>
    <div>
        <Header />
        
        <b-container>
            <router-view :key="this.$route.path" />
        </b-container>
        
        <Footer />
    </div>
</template>

<script>
    import Header from './sections/Header.vue'
    import Footer from './sections/Footer.vue'

    export default {
        name: "App",
  
  		components: {
            Header,
            Footer
        },

        watch: {
            '$route.params.filter': function (filter) {
                this.$store.dispatch('fetchCards', filter)
            }
        }
    }
</script>