<template>
    <div class="container">
        <p>INSIDE THEATRECOMPLEXFORM.VUE</p> 
        <form method="POST" action="/theatre_complexes" @submit.prevent="onSubmit">
            <div class="control">
                <label for="name" class="label">Theatre Complex Name:</label>
                
                <input type="text" id="name" name="name" class="input" v-model="name"> 
            </div>

            <div class="control">
                <label for="phone_num" class="label">Threatre Complex Phone Number:</label>
                
                <input type="text" id="phone_num" name="phone_num" class="input" v-model="phone_num">
            </div>

            <div class="control">
                <label for="street_num" class="label">Threatre Complex Street Number:</label>
                
                <input type="text" id="street_num" name="street_num" class="input" v-model="street_num">
            </div>

            <div class="control">
                <label for="street_name" class="label">Threatre Complex Street Name:</label>
                
                <input type="text" id="street_name" name="street_name" class="input" v-model="street_name">
            </div>

            <div class="control">
                <label for="City" class="label">Threatre Complex City:</label>
                
                <input type="text" id="City" name="City" class="input" v-model="City">
            </div>

            <div class="control">
                <button class="button is-primary">Create</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>