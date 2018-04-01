@extends('layouts.app')

@section('content')
    {{--  <div class="container">
        @include ('theatre.list')
        <div id="theatre-complex-form">
            <theatre-complex-form></theatre-complex-form>
        </div>
    </div>  --}}
    <div class="container">
        @include ('production_company.list')
        <div id="production-company-form" class="container">
            <form method="POST" action="/production_companies" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <div class="form-group">
                    <label for="name" class="label">Name:</label>
                    
                    <input type="text" id="name" name="name" class="input" v-model="form.name"> 

                    <span class="form-text has-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                </div>
            
                <div class="form-group">
                    <button class="button is-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection