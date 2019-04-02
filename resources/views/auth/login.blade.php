@extends('layouts.app')

@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
            <div class="row w-100">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left p-5">
                        <h3 class="brand-logo logo">
                            ANPR Service Auto
</h3>
                        <h4>@lang('header.hello')</h4>
                        <h6 class="font-weight-light">@lang('header.singincont')</h6>
                        <form class="pt-3" method="POST" action="{{ route('login', app()->getLocale()) }}">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg" id="exampleInputPassword1" placeholder="Password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div ><button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                            @lang('header.signlogin')
                                </button>
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                            
                            <a href="{{ route('password.request', app()->getLocale()) }}" class="auth-link text-black">@lang('header.forgot')</a>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                            @lang('header.dontaccount') <a href="{{ route('register', app()->getLocale())}}" class="text-primary">@lang('header.createaccount')</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
       
@endsection
