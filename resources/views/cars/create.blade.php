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
                    <i class="mdi mdi-home"></i>                 
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
                        <h4 class="card-title">Add car</h4>  
                        <form class="forms-sample" method="POST" action="{{ route('store_car') }}">
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
                                <label for="KW">KW</label>
                                    <input id="KW" 
                                            type="text" 
                                            class="form-control{{ $errors->has('KW') ? ' is-invalid' : '' }}" 
                                            name="KW" 
                                            required>
                                    @if ($errors->has('KW'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('KW') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="CP">CP</label>
                                    <input id="CP" 
                                            type="text" 
                                            class="form-control{{ $errors->has('CP') ? ' is-invalid' : '' }}" 
                                            name="CP" 
                                            required>

                                    @if ($errors->has('CP'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('CP') }}</strong>
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

                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</div>
@endsection
