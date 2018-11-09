@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add car') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('store_car') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="plate_number" class="col-md-4 col-form-label text-md-right">Plate Number</label>

                            <div class="col-md-6">
                                <input id="plate_number" type="text" class="form-control{{ $errors->has('plate_number') ? ' is-invalid' : '' }}" name="plate_number" value="{{ old('plate_number') }}" required autofocus>

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
                                <input id="brand" type="text" class="form-control{{ $errors->has('brand') ? ' is-invalid' : '' }}" name="brand" value="{{ old('brand') }}" required autofocus>

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
                                <input id="model" type="model" class="form-control{{ $errors->has('model') ? ' is-invalid' : '' }}" name="model" value="{{ old('model') }}" required>

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
                                <input id="year" type="year" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" required>

                                @if ($errors->has('year'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="color_name" class="col-md-4 col-form-label text-md-right">Color</label>

                            <div class="col-md-6">
                                <input id="color_name" type="color_name" class="form-control{{ $errors->has('color_name') ? ' is-invalid' : '' }}" name="color_name" required>

                                @if ($errors->has('color_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('color_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">Type</label>

                            <div class="col-md-6">
                                <input id="type" type="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" required>

                                @if ($errors->has('type'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
