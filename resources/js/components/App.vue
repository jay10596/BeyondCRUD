<template>
    <div>
        <Header />
        
        <b-container>
            <router-view />
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
    }
</script>