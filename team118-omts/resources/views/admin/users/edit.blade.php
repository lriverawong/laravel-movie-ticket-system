@extends('admin.admin-layout')

@section('admin-content')
    <div class="container">
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="/admin/users/{{$user->id}}">
            <input type="hidden" name="_method" value="PATCH">
            @csrf
                <div class="form-group row">
                    <label for="first_name" class="col-md-4 col-form-label text-md-right">First Name</label>

                    <div class="col-md-6">
                        <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ $user->first_name }}" required autofocus>

                        @if ($errors->has('first_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('first_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="last_name" class="col-md-4 col-form-label text-md-right">Last Name</label>

                    <div class="col-md-6">
                        <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ $user->last_name }}" required autofocus>

                        @if ($errors->has('last_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('last_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone_num" class="col-md-4 col-form-label text-md-right">Phone Number</label>

                    <div class="col-md-6">
                        <input id="phone_num" type="text" class="form-control{{ $errors->has('phone_num') ? ' is-invalid' : '' }}" name="phone_num" value="{{ $user->phone_num }}" required autofocus>

                        @if ($errors->has('phone_num'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('phone_num') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="apt_num" class="col-md-4 col-form-label text-md-right">Apartment Number</label>

                    <div class="col-md-6">
                        <input id="apt_num" type="text" class="form-control{{ $errors->has('apt_num') ? ' is-invalid' : '' }}" name="apt_num" value="{{ $user->apt_num }}" autofocus>

                        @if ($errors->has('apt_num'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('apt_num') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="street_num" class="col-md-4 col-form-label text-md-right">Street Num</label>

                    <div class="col-md-6">
                        <input id="street_num" type="text" class="form-control{{ $errors->has('street_num') ? ' is-invalid' : '' }}" name="street_num" value="{{ $user->street_num }}" required autofocus>

                        @if ($errors->has('street_num'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('street_num') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="street_name" class="col-md-4 col-form-label text-md-right">Street Name</label>

                    <div class="col-md-6">
                        <input id="street_name" type="text" class="form-control{{ $errors->has('street_name') ? ' is-invalid' : '' }}" name="street_name" value="{{ $user->street_name }}" required autofocus>

                        @if ($errors->has('street_name'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('street_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                    <div class="col-md-6">
                        <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $user->city }}" required autofocus>

                        @if ($errors->has('city'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="province" class="col-md-4 col-form-label text-md-right">Province</label>

                    <div class="col-md-6">
                        <input id="province" type="text" class="form-control{{ $errors->has('province') ? ' is-invalid' : '' }}" name="province" value="{{ $user->province }}" required autofocus>

                        @if ($errors->has('province'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('province') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>

                    <div class="col-md-6">
                        <input id="country" type="text" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ $user->country }}" required autofocus>

                        @if ($errors->has('country'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="postal_code" class="col-md-4 col-form-label text-md-right">Postal Code</label>

                    <div class="col-md-6">
                        <input id="postal_code" type="text" class="form-control{{ $errors->has('postal_code') ? ' is-invalid' : '' }}" name="postal_code" value="{{ $user->postal_code }}" required autofocus>

                        @if ($errors->has('postal_code'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('postal_code') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="role_id" class="col-md-4 col-form-label text-md-right">Role ID:</label>

                    <div class="col-md-6">
                        <select name="role_id">
                            @foreach ($roles as $role)
                                @if ($role->id === $user->role_id )
                                    <option value="{{ $role->id }}" selected>{{ $role->title }}</option>
                                @else
                                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                                @endif
                            @endforeach
                        </select>
                        
                        @if ($errors->has('role_id'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('role_id') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection