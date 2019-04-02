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
                    <i class="mdi mdi-format-list-bulleted"></i>                 
                </span>
                @lang('header.editcategory')
                </h3>
                <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                   @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                              href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),[app()->getLocale(), $category->id]) }}"
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
                        <form class="forms-sample" method="POST" action="{{ route('update_category', [app()->getLocale(),$category->id]) }}">
                        @csrf

                        <div class="form-group">
                            <label for="title">@lang('header.title')</label>
                            <input id="title" 
                                    type="text" 
                                    class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" 
                                    name="title" 
                                    value="{{ $category->title }}" 
                                    required 
                                    autofocus>

                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-gradient-primary mr-2">@lang('header.submit')</button>

                        </form>
                    </div>
                </div>
            </div>@include('layouts.footer')
        </div>

        </div>
</div>
@endsection
