@extends('layouts.app')

@section('content')
    {{--  <div class="container">
        @include ('theatre.list')
        <div id="theatre-complex-form">
            <theatre-complex-form></theatre-complex-form>
        </div>
    </div>  --}}
    <div class="container">
        @include ('theatre.list')
        <div id="theatre-form" class="container">
            <form method="POST" action="/theatres" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <div class="control">
                    <label for="theatre_num" class="label">Theatre Number:</label>
                    
                    <input type="text" id="theatre_num" name="theatre_num" class="input" v-model="form.theatre_num"> 

                    <span class="help is-danger" v-if="form.errors.has('theatre_num')" v-text="form.errors.get('theatre_num')"></span>
                </div>
    
                <div class="control">
                    <label for="max_num_seats" class="label">Theatre Maximum Seats:</label>
                    
                    <input type="text" id="max_num_seats" name="max_num_seats" class="input" v-model="form.max_num_seats">

                    <span class="help is-danger" v-if="form.errors.has('max_num_seats')" v-text="form.errors.get('max_num_seats')"></span>
                </div>

                <div class="control">
                        <label for="screen_size" class="label">Theatre Screen Size:</label>
                        
                        <input type="text" id="screen_size" name="screen_size" class="input" v-model="form.screen_size">
    
                        <span class="help is-danger" v-if="form.errors.has('screen_size')" v-text="form.errors.get('screen_size')"></span>
                    </div>

                <div class="control">
                    {{!! Form::Label('theatre_complexes', 'theatre_complexes') !!}}}
                    {{!! Form::Select('theatre_complexes', $theatre_complexes, null, ['class' => 'form-control']) !!}}
                    {{--  <select name="theatre_complex_id">
                        @foreach($theatre_complexes)
                            <option value="{{$theatre_complexes->id }}">{{$theatre_complexes->name}}</option>
                        @endforeach
                    </select>  --}}
                    {{--  <label for="theatre_complex_id" class="label">Theatre Complex ID</label>  --}}
                    
                    {{--  <input type="text" id="theatre_complex_id" name="theatre_complex_id" class="input" v-model="form.theatre_complex_id">  --}}

                    {{--  <span class="help is-danger" v-if="form.errors.has('theatre_complex_id')" v-text="form.errors.get('theatre_complex_id')"></span>  --}}
                </div>
            
                <div class="control">
                    <button class="button is-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection