@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update service') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_service', $services->id) }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $services->title }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-md-4 col-form-label text-md-right">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ $services->price }}" required autofocus>

                                @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="textarea" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $services->description }}" required>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="service_date" class="col-md-4 col-form-label text-md-right">Service Date</label>

                            <div class="col-md-6">
                                <input id="service_date" type="date" class="form-control{{ $errors->has('service_date') ? ' is-invalid' : '' }}" name="service_date" value="{{ $services->service_date }}" required>

                                @if ($errors->has('service_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('service_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('car_id') ? ' has-error' : '' }}">
                            <label for="car_id" class="col-md-4 control-label">Car</label>

                            <div class="col-md-6">
                                <select id="car_id" type="text" class="form-control" name="car_id" value="{{ $services->car_id }}" required >
                                  
                                    @foreach($cars as $id=>$car_id)
                                        <option value="{{$id}}">{{$car_id}}</option>

                                    @endforeach
                                </select>

                                @if ($errors->has('car_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('car_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
                            <label for="product_id" class="col-md-4 control-label">Product</label>

                            <div class="col-md-6">
                                <select id="product_id" type="text" class="form-control" name="product_id" value="{{ $services->product_id }}" required >
                                  
                                    @foreach($products as $id=>$product_id)
                                        <option value="{{$id}}">{{$product_id}}</option>

                                    @endforeach
                                </select>

                                @if ($errors->has('product_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('product_id') }}</strong>
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
                        <button href ="{{ route('show_car_service', $services->id)}}"> Cancel </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
