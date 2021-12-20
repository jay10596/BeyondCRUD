<template>
    <header>
        <b-nav pills>
            <b-nav-item class="nav-home"><router-link to="/"><i class="fas fa-credit-card"></i> CardStorage</router-link></b-nav-item>
            <b-nav-item href="https://jay-webdev.com/">Portfolio</b-nav-item>

            <b-nav-item-dropdown id="my-nav-dropdown" text="Validity" toggle-class="nav-link-custom" right>
                <b-dropdown-item><router-link to="/valid">Valid</router-link></b-dropdown-item>
                <b-dropdown-item><router-link to="/invalid">Invalid</router-link></b-dropdown-item>
            </b-nav-item-dropdown>

            <b-nav-item-dropdown id="my-nav-dropdown" text="Type" toggle-class="nav-link-custom" right>
                <b-dropdown-item><router-link to="/mastercard">Mastercard</router-link></b-dropdown-item>
                <b-dropdown-item><router-link to="/visa">Visa</router-link></b-dropdown-item>
            </b-nav-item-dropdown>
        </b-nav>
    </header>
</template>

<script>
    export default {
        name: "Header",
    }
</script>