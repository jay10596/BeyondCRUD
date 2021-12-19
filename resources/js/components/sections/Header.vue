<template>
    <div>
        <b-nav>
            <router-link to="/valid">Valid</router-link>
            <router-link to="/invalid">Invalid</router-link>
            <router-link to="/mastercard">Mastercard</router-link>
            <router-link to="/visa">Visa</router-link>
        </b-nav>
    </div>
</template>

<script>
    export default {
        name: "Header",
    }
</script>