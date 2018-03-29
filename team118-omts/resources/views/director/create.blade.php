@extends('layouts.app')

@section('content')
    {{--  <div class="container">
        @include ('theatre.list')
        <div id="theatre-complex-form">
            <theatre-complex-form></theatre-complex-form>
        </div>
    </div>  --}}
    <div class="container">
        @include ('director.list')
        <div id="director-form" class="container">
            <form method="POST" action="/directors" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <div class="form-group">
                    <label for="first_name" class="label">First Name:</label>
                    
                    <input type="text" id="first_name" name="first_name" class="input" v-model="form.first_name"> 

                    <span class="form-text has-danger" v-if="form.errors.has('first_name')" v-text="form.errors.get('first_name')"></span>
                </div>
    
                <div class="form-group">
                    <label for="last_name" class="label">Last Name:</label>
                    
                    <input type="text" id="last_name" name="last_name" class="input" v-model="form.last_name">

                    <span class="form-text has-danger" v-if="form.errors.has('last_name')" v-text="form.errors.get('last_name')"></span>
                </div>
            
                <div class="form-group">
                    <button class="button is-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection