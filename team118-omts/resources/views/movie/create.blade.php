@extends('layouts.app')

@section('content')
    <div class="container">
        @include ('movie.list')
        <div id="movie-form" class="container">
            <form method="POST" action="/movies" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <div class="form-group">
                    <label for="name" class="label">Movie Name:</label>
                    
                    <input type="text" id="name" name="name" class="input" v-model="form.name"> 

                    <span class="form-text has-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                </div>
    
                <div class="form-group">
                    <label for="phone_num" class="label">Movie Phone Num:</label>
                    
                    <input type="text" id="phone_num" name="phone_num" class="input" v-model="form.phone_num">

                    <span class="form-text has-danger" v-if="form.errors.has('phone_num')" v-text="form.errors.get('phone_num')"></span>
                </div>

                <div class="form-group">
                    <label for="contact_first_name" class="label">Movie Contact First Name</label>
                    
                    <input type="text" id="contact_first_name" name="contact_first_name" class="input" v-model="form.contact_first_name">
    
                    <span class="form-text has-danger" v-if="form.errors.has('contact_first_name')" v-text="form.errors.get('contact_first_name')"></span>
                </div>

                <div class="form-group">
                    <label for="contact_last_name" class="label">Movie Contact Last Name</label>
    
                    <input type="text" id="contact_last_name" name="contact_last_name" class="input" v-model="form.contact_last_name">
    
                    <span class="form-text has-danger" v-if="form.errors.has('contact_last_name')" v-text="form.errors.get('contact_last_name')"></span>
                </div>
                
                <div class="form-group">
                        <label for="apt_num" class="label">Movie Apartment Number</label>
    
                        <input type="text" id="apt_num" name="apt_num" class="input" v-model="form.apt_num">
        
                        <span class="form-text has-danger" v-if="form.errors.has('apt_num')" v-text="form.errors.get('apt_num')"></span>
                    </div>

                <div class="control">
                    <label for="street_num" class="label">Movie Street Num:</label>
                    
                    <input type="text" id="street_num" name="street_num" class="input" v-model="form.street_num">

                    <span class="help is-danger" v-if="form.errors.has('street_num')" v-text="form.errors.get('street_num')"></span>
                </div>

                <div class="control">
                    <label for="street_name" class="label">Movie Street Name:</label>
                    
                    <input type="text" id="street_name" name="street_name" class="input" v-model="form.street_name">

                    <span class="help is-danger" v-if="form.errors.has('street_name')" v-text="form.errors.get('street_name')"></span>
                </div>
                

                <div class="control">
                    <label for="city" class="label">Movie Street City:</label>
                    
                    <input type="text" id="city" name="city" class="input" v-model="form.city">

                    <span class="help is-danger" v-if="form.errors.has('city')" v-text="form.errors.get('city')"></span>
                </div>

                <div class="control">
                    <label for="province" class="label">Movie Province:</label>
                
                    <input type="text" id="province" name="province" class="input" v-model="form.province">

                    <span class="help is-danger" v-if="form.errors.has('province')" v-text="form.errors.get('province')"></span>
                </div>

                <div class="control">
                    <label for="country" class="label">Movie Country:</label>
                
                    <input type="text" id="country" name="country" class="input" v-model="form.country">

                    <span class="help is-danger" v-if="form.errors.has('country')" v-text="form.errors.get('country')"></span>
                </div>

                <div class="control">
                    <label for="postal_code" class="label">Movie Postal Code:</label>
                
                    <input type="text" id="postal_code" name="postal_code" class="input" v-model="form.postal_code">

                    <span class="help is-danger" v-if="form.errors.has('postal_code')" v-text="form.errors.get('postal_code')"></span>
                </div>
                
            
                <div class="form-group">
                    <button class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection