@extends('layouts.app')

@section('content')
    <div class="container">
        @include ('movie.list')
        <div id="movie-form" class="container">
            <form method="POST" action="/movies" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                <div class="form-group">
                    <label for="title" class="label">Movie title:</label>
                    
                    <input type="text" id="title" name="title" class="input" v-model="form.title"> 

                    <span class="form-text has-danger" v-if="form.errors.has('title')" v-text="form.errors.get('title')"></span>
                </div>
    
                <div class="form-group">
                    <label for="running_time" class="label">Movie Running Time:</label>
                    
                    <input type="number" id="running_time" name="running_time" class="input" v-model="form.running_time">

                    <span class="form-text has-danger" v-if="form.errors.has('running_time')" v-text="form.errors.get('running_time')"></span>
                </div>

                <div class="form-group">
                    <label for="rating" class="label">Movie Rating</label>
                    
                    <input type="number" id="rating" name="rating" class="input" v-model="form.rating">
    
                    <span class="form-text has-danger" v-if="form.errors.has('rating')" v-text="form.errors.get('rating')"></span>
                </div>

                <div class="form-group">
                    <label for="plot_synopsis" class="label">Movie Plot Synopsis</label>
    
                    <textarea id="plot_synopsis" name="plot_synopsis" class="input" v-model="form.plot_synopsis"></textarea>
    
                    <span class="form-text has-danger" v-if="form.errors.has('plot_synopsis')" v-text="form.errors.get('plot_synopsis')"></span>
                </div>

                <div class="form-group">
                    <label for="director_id" class="label">Movie Director</label>
                    <select v-model="form.director_id">
                        @foreach ($directors as $director)
                            <option value="{{ $director->id }}">{{ $director->first_name }} {{ $director->last_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="prod_comp_id" class="label">Movie Production Company</label>
                    <select v-model="form.prod_comp_id">
                        @foreach ($production_companies as $prod_company)
                            <option value="{{ $prod_company->id }}">{{ $prod_company->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="supplier_id" class="label">Movie Suppier</label>
                    <select v-model="form.supplier_id">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="form-group">
                    <button class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection