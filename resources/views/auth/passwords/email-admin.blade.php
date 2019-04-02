@extends('layouts.app')

<!-- Main Content -->
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
                        <h4> @lang('header.adminreset')</h4>
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form class="pt-3" role="form" method="POST" action="{{ route('admin.password.email',app()->getLocale()) }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                           
                                    <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg" id="exampleInputEmail1" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                    <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                    @lang('header.sendpass')
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
