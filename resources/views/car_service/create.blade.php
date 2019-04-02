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
                @lang('header.createservice')
                </h3>
                <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                   @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                              href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),app()->getLocale()) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                        </li>
                    @endforeach
                </li>
              </ul>
            </nav>
            </div>

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body"> 
                        <form class="forms-sample" method="POST" action="{{ route('store_car_service',app()->getLocale()) }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">@lang('header.title')</label>
                                <input placeholder="Name" 
                                        id="title" 
                                        type="text" 
                                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" 
                                        name="title" 
                                        value="{{ old('title') }}" 
                                        required 
                                        autofocus>
                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="price">@lang('header.price')</label>
                                    <input placeholder="Price" 
                                            id="price" 
                                            type="text" 
                                            class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" 
                                            name="price" 
                                            value="{{ old('price') }}" 
                                            required 
                                            autofocus>
                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="description">@lang('header.description')</label>
                                    <input placeholder="Description" 
                                            id="description" 
                                            type="textarea" 
                                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" 
                                            name="description" 
                                            value="{{ old('description') }}" 
                                            required>
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="service_date">Service Date</label>
                                    <input id="service_date" 
                                            type="date" 
                                            class="form-control{{ $errors->has('service_date') ? ' is-invalid' : '' }}" 
                                            name="service_date" 
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
                                            value="{{ old('car_id') }}" 
                                            required >
                                    
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
                                <label for="product_id">@lang('header.product')</label>
                                    <select id="product_id" 
                                            type="text" 
                                            class="form-control" 
                                            name="product_id" 
                                            value="{{ old('product_id') }}" 
                                            required >
                                    
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
                            <button type="submit" class="btn btn-gradient-primary mr-2">@lang('header.submit')</button>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>@include('layouts.footer')
    </div>

    </div>
</div>    
@endsection
