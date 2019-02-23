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
                    Create new user
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                      
                    </li>
                    </ul>
                </nav>
            </div>

            <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <form  class="forms-sample" method="POST" action="{{ route('store_user') }}">
                            @csrf
                            <div class="form-group">
                            <label for="name">Name</label>
                            <input placeholder="Name" 
                                    id="name" 
                                    type="text" 
                                    class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" 
                                    name="name" 
                                    value="{{ old('name') }}" 
                                    required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif                          
                            </div>

                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input placeholder="E-Mail Address"
                                        id="email" 
                                        type="email" 
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                                        name="email" 
                                        value="{{ old('email') }}" 
                                        required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input placeholder="Password"
                                        id="password" 
                                        type="password" 
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" 
                                        name="password" 
                                        required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif                           
                            </div>

                            <div class="form-group">
                                <label for="password-confirm">Confirm Password</label>
                                <input placeholder="Confirm password" 
                                        id="password-confirm" 
                                        type="password" 
                                        class="form-control" 
                                        name="password_confirmation" 
                                        required>                           
                            </div>
                                <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>                    
                        </form>                                     
                    </div>
                </div>
            </div>
        </div>@include('layouts.footer')
    </div> 

    </div>
</div>  


@endsection
