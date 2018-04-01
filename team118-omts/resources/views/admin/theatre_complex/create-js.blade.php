@extends('layouts.app')

@section('content')
    {{--  <div class="container">
        @include ('theatre_complex.list')
        <div id="theatre-complex-form">
            <theatre-complex-form></theatre-complex-form>
        </div>
    </div>  --}}
    <div class="container">
        @include ('theatre_complex.list')
        <div id="theatre-complex-form" class="container">
            <p>INSIDE THEATRECOMPLEXFORM.VUE</p> 
            <form method="POST" action="/theatre_complexes" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <div class="control">
                    <label for="name" class="label">Theatre Complex Name:</label>
                    
                    <input type="text" id="name" name="name" class="input" v-model="form.name"> 

                    <span class="help is-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                </div>
    
                <div class="control">
                    <label for="phone_num" class="label">Theatre Complex Phone Number:</label>
                    
                    <input type="text" id="phone_num" name="phone_num" class="input" v-model="form.phone_num">

                    <span class="help is-danger" v-if="form.errors.has('phone_num')" v-text="form.errors.get('phone_num')"></span>
                </div>

                <div class="control">
                        <label for="street_num" class="label">Theatre Complex Street Num:</label>
                        
                        <input type="text" id="street_num" name="street_num" class="input" v-model="form.street_num">
    
                        <span class="help is-danger" v-if="form.errors.has('street_num')" v-text="form.errors.get('street_num')"></span>
                    </div>

                <div class="control">
                    <label for="street_name" class="label">Theatre Complex Street Name:</label>
                    
                    <input type="text" id="street_name" name="street_name" class="input" v-model="form.street_name">

                    <span class="help is-danger" v-if="form.errors.has('street_name')" v-text="form.errors.get('street_name')"></span>
                </div>
                

                <div class="control">
                    <label for="city" class="label">Theatre Complex Street City:</label>
                    
                    <input type="text" id="city" name="city" class="input" v-model="form.city">

                    <span class="help is-danger" v-if="form.errors.has('city')" v-text="form.errors.get('city')"></span>
                </div>

                <div class="control">
                    <label for="province" class="label">Theatre Complex Province:</label>
                
                    <input type="text" id="province" name="province" class="input" v-model="form.province">

                    <span class="help is-danger" v-if="form.errors.has('province')" v-text="form.errors.get('province')"></span>
                </div>

                <div class="control">
                    <label for="country" class="label">Theatre Complex Country:</label>
                
                    <input type="text" id="country" name="country" class="input" v-model="form.country">

                    <span class="help is-danger" v-if="form.errors.has('country')" v-text="form.errors.get('country')"></span>
                </div>

                <div class="control">
                    <label for="postal_code" class="label">Theatre Complex Postal Code:</label>
                
                    <input type="text" id="postal_code" name="postal_code" class="input" v-model="form.postal_code">

                    <span class="help is-danger" v-if="form.errors.has('postal_code')" v-text="form.errors.get('postal_code')"></span>
                </div>
    
                <div class="control">
                    <button class="button is-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection