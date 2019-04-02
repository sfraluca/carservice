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
                    <i class="mdi mdi-subdirectory-arrow-right"></i>                 
                </span>
                @lang('header.editproduct')
                </h3>
               <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                   @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                              href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),[app()->getLocale(), $products->id]) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                        </li>
                    @endforeach
                </li>
              </ul>
            </nav>
            </div>
                
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">   
                        <form class="forms-sample" method="POST" action="{{ route('update_product', [app()->getLocale(),$products->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="description">@lang('header.description')</label>
                                    <input id="description" 
                                            type="textarea" 
                                            class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" 
                                            name="description" 
                                            value="{{ $products->description }}" 
                                            required 
                                            autofocus>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group ">
                                <label for="price">@lang('header.price')</label>
                                    <input id="price" 
                                            type="text" 
                                            class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                            name="price" 
                                            value="{{ $products->price }}" 
                                            required 
                                            autofocus>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            
                            <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                <label for="category_id">@lang('header.category')</label>
                                    <select id="category_id" 
                                            type="text" 
                                            class="form-control" 
                                            name="category_id" 
                                            value="{{ $products->category_id}}" 
                                            required >
                                    
                                        @foreach($categories as $id=>$category_id)
                                            <option value="{{$id}}">{{$category_id}}</option>

                                        @endforeach
                                    </select>

                                    @if ($errors->has('category_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('category_id') }}</strong>
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
