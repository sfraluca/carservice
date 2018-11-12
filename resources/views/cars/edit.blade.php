@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <form method="POST" action="{{ route('update_car', $car->id) }}">
                @csrf
                <div class="form-group row">
                            <label for="plate_number" class="col-md-4 col-form-label text-md-right">Plate Number</label>

                            <div class="col-md-6">
                                <input id="plate_number" type="text" class="form-control{{ $errors->has('plate_number') ? ' is-invalid' : '' }}" name="plate_number" value="{{ $car->plate_number }}" required autofocus>

                                @if ($errors->has('plate_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('plate_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand" class="col-md-4 col-form-label text-md-right">Brand</label>

                            <div class="col-md-6">
                                <input id="brand" type="text" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand" value="{{ $car->brand }}" required autofocus>

                                @if ($errors->has('brand'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('brand') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="model" class="col-md-4 col-form-label text-md-right">Model</label>

                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" value="{{ $car->model }}" required>

                                @if ($errors->has('model'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('model') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="year" class="col-md-4 col-form-label text-md-right">Year</label>

                            <div class="col-md-6">
                                <input id="year" type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ $car->year }}" required>

                                @if ($errors->has('year'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="color" class="col-md-4 col-form-label text-md-right">Color</label>

                            <div class="col-md-6">
                                <input id="color" type="text" class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}" name="color" value="{{ $car->color }}" required>

                                @if ($errors->has('color'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('color') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="KW" class="col-md-4 col-form-label text-md-right">KW</label>

                            <div class="col-md-6">
                                <input id="KW" type="text" class="form-control{{ $errors->has('KW') ? ' is-invalid' : '' }}" name="KW" value="{{ $car->KW }}" required>

                                @if ($errors->has('KW'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('KW') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CP" class="col-md-4 col-form-label text-md-right">CP</label>

                            <div class="col-md-6">
                                <input id="CP" type="text" class="form-control{{ $errors->has('CP') ? ' is-invalid' : '' }}" name="CP"  value="{{ $car->CP }}" required>

                                @if ($errors->has('CP'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('CP') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="car_body" class="col-md-4 col-form-label text-md-right">Car body</label>

                            <div class="col-md-6">
                                <input id="car_body" type="text" class="form-control{{ $errors->has('car_body') ? ' is-invalid' : '' }}" name="car_body" value="{{ $car->car_body }}" required>

                                @if ($errors->has('car_body'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('car_body') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="motor" class="col-md-4 col-form-label text-md-right">Motor</label>

                            <div class="col-md-6">
                                <input id="motor" type="text" class="form-control{{ $errors->has('motor') ? ' is-invalid' : '' }}" name="motor" value="{{ $car->motor }}" required>

                                @if ($errors->has('motor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('motor') }}</strong>
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
                        <button href ="{{ route('show_car', $car->id)}}"> Cancel </button>

                </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection