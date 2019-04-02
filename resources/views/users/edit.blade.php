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
                    <i class="mdi mdi-account-box"></i>                 
                </span>
                @lang('header.editurse')
                </h3>
                <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                   @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                              href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),[app()->getLocale(), $users->id]) }}"
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
                        <h4 class="card-title">User Create Account</h4>  
                        <form class="forms-sample" method="POST" action="{{ route('update_user', [app()->getLocale(),$users->id]) }}">
                            @csrf
                            <div class="form-group">
                                <label for="name">@lang('header.name')</label>
                                <input  id="name"
                                        type="text" 
                                        class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                        name="name" 
                                        value="{{ $users->name }}" 
                                        required autofocus>
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            </div>

                           

                            <div class="form-group">
                                <label for="email">@lang('header.emadress')</label>
                                <input  id="email" 
                                        type="email" 
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                        name="email" 
                                        value="{{ $users->email }}" 
                                        required>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="password">@lang('header.pass')</label>
                                <input  id="password" 
                                        type="password" 
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                        name="password">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">@lang('header.confirm')</label>
                                <input id="password-confirm" 
                                        type="password" 
                                        class="form-control" 
                                        name="password_confirmation">
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
