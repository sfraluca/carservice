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
                        <h4>@lang('header.reset')</h4>
                        <div class="card-body">
                        @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                        <form method="POST" class="pt-3" action="{{ route('password.update',app()->getLocale()) }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                           
                           <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}" required autofocus>
                           @if ($errors->has('email'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('email') }}</strong>
                               </span>
                           @endif
                       </div>

                         
                           
                           <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" required placeholder="Password">
                         @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                
                                </div>
                                <div class="form-group">
                        <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password_confirmation" required placeholder="Password">
                        @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                </div>
                           
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                    @lang('header.reset')
                                    </button>
                        
                        </div>
                    </form>

                            
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
