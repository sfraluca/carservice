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
                    <i class="mdi mdi-wrench"></i>                 
                </span>
                Update service
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
                
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">    
                        <form class="forms-sample" method="POST" action="{{ route('update_service', $services->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                    <input id="title" 
                                            type="text" 
                                            class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" 
                                            name="title" 
                                            value="{{ $services->title }}" 
                                            required 
                                            autofocus>
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                    <input id="price" 
                                            type="text" 
                                            class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" 
                                            name="price" 
                                            value="{{ $services->price }}" 
                                            required 
                                            autofocus>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                    <input id="description" 
                                            type="textarea" 
                                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" 
                                            name="description" 
                                            value="{{ $services->description }}" 
                                            required>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group ">
                                <label for="service_date">Service Date</label>
                                    <input id="service_date"
                                            type="date"
                                            class="form-control{{ $errors->has('service_date') ? ' is-invalid' : '' }}" 
                                            name="service_date" 
                                            value="{{ $services->service_date }}" 
                                            required>

                                    @if ($errors->has('service_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('service_date') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('car_id') ? ' has-error' : '' }}">
                                <label for="car_id">Car</label>
                                    <select id="car_id" 
                                            type="text" 
                                            class="form-control" 
                                            name="car_id" 
                                            value="{{ $services->car_id }}" 
                                            required>
                                    
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

                            <div class="form-group{{ $errors->has('product_id') ? ' has-error' : '' }}">
                                <label for="product_id">Product</label>
                                    <select id="product_id"
                                            type="text"
                                            class="form-control" 
                                            name="product_id" 
                                            value="{{ $services->product_id }}" 
                                            required>
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

                            <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>    @include('layouts.footer')
    </div>

    </div>
</div>
@endsection
