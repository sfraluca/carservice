@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper">
    @include('layouts.sidebar')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white mr-2">
                    <i class="mdi mdi-car"></i>                 
                    </span>
                    Create new car
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <span></span>Overview
                        <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                    </li>
                    </ul>
                </nav>
            </div>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <form class="forms-sample" method="POST" role="form" action="{{ route('store_car') }}">
                            @csrf
                            <div class="form-group">
                                <label for="plate_number">Plate Number</label>
                                    <input id="plate_number" 
                                            type="text" 
                                            class="form-control{{ $errors->has('plate_number') ? ' is-invalid' : '' }}" 
                                            name="plate_number" 
                                            value="{{ old('plate_number') }}" 
                                            required 
                                            autofocus>
                                    @if ($errors->has('plate_number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('plate_number') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="brand">Brand</label>
                                    <input id="brand" 
                                            type="text" 
                                            class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" 
                                            name="brand" 
                                            value="{{ old('brand') }}" 
                                            required 
                                            autofocus>
                                    @if ($errors->has('brand'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('brand') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="model">Model</label>
                                    <input id="model" 
                                            type="text" 
                                            class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}"
                                            name="model" 
                                            value="{{ old('model') }}" 
                                            required>
                                    @if ($errors->has('model'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('model') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="year">Year</label>
                                    <input id="year" 
                                            type="text" 
                                            class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" 
                                            name="year" 
                                            required>
                                    @if ($errors->has('year'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('year') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="color">Color</label>
                                    <input id="color" 
                                            type="text" 
                                            class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" 
                                            name="color" 
                                            required>
                                    @if ($errors->has('color'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('color') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="fuel_type">Fuel type</label>
                                    <input id="fuel_type" 
                                            type="text" 
                                            class="form-control{{ $errors->has('fuel_type') ? ' is-invalid' : '' }}" 
                                            name="fuel_type" 
                                            required>
                                    @if ($errors->has('fuel_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('fuel_type') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="motor">Motor</label>
                                    <input id="motor" 
                                            type="text" 
                                            class="form-control{{ $errors->has('motor') ? ' is-invalid' : '' }}" 
                                            name="motor" 
                                            required>

                                    @if ($errors->has('motor'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('motor') }}</strong>
                                        </span>
                                    @endif
                            </div>


                            <div class="form-group">
                                <label for="injection_type">Injection type</label>
                                    <input id="injection_type" 
                                            type="text" 
                                            class="form-control{{ $errors->has('injection_type') ? ' is-invalid' : '' }}" 
                                            name="injection_type" 
                                            required>
                                    @if ($errors->has('injection_type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('injection_type') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="motor_code">Motor code</label>
                                    <input id="motor_code" 
                                            type="text" 
                                            class="form-control{{ $errors->has('motor_code') ? ' is-invalid' : '' }}" 
                                            name="motor_code" 
                                            required>

                                    @if ($errors->has('motor_code'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('motor_code') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="car_body">Car body</label>
                                    <input id="car_body" 
                                            type="text" 
                                            class="form-control{{ $errors->has('car_body') ? ' is-invalid' : '' }}" 
                                            name="car_body" 
                                            required>

                                    @if ($errors->has('car_body'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('car_body') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                            <label for="exampleSelectGender">Car owner</label>
                                <select class="form-control" id="exampleSelectGender" name="user_id" value="{{ old('user_id') }}">
                                @foreach($users as $id=>$user)
                                <option value="{{$id}}">{{$user}}</option>

                                @endforeach
                                
                                </select>
                                @if ($errors->has('user'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    @include('layouts.footer')
    </div>

    </div>
</div>
@endsection
