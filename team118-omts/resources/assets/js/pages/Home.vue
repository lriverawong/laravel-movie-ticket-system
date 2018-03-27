<style>
</style>

<template>
    <div id="home">
        <p>Inside Home.vue</p>
        <span v-show="complexesLoadStatus == 1">Loading</span>
        <span v-show="complexesLoadStatus == 2">Cafes loaded successfully!</span>
        <span v-show="complexesLoadStatus == 3">Cafes loaded unsuccessfully!</span>
        <ul>
            <li v-for="complex in complexes">{{ complex.name }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Home mounted.')
        },
        created() {
            console.log('Home created.')
            this.$store.dispatch( 'loadComplexes' );
        },
         /*
        Defines the computed properties on the component.
         */
        computed: {
            /*
            Gets the complexes load status
            */
            complexesLoadStatus(){
                return this.$store.getters.getComplexesLoadStatus;
            },

            /*
            Gets the complexes
            */
            complexes(){
                return this.$store.getters.getComplexes;
            },
        }
    }
</script>