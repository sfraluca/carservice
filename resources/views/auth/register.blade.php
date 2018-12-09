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
              <h4>New here?</h4>
              <h6 class="font-weight-light">Signing up is easy. It only takes a few steps</h6>
              <form class="pt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                        <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="name" placeholder="Username" required autofocus>
                        @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                                </div>

                                <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Email" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
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
                         @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                
                                </div>

                     

                        <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">
                                SIGN UP
                                </button>
                           
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                        Already have an account? <a href="{{route('home')}}" class="text-primary">Login</a>
                        </div>
                    </form>
             
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

@endsection
