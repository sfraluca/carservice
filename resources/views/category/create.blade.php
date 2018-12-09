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
                    Create new category
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
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body"> 
                        <form class="forms-sample" method="POST" action="{{ route('store_category') }}">
                            @csrf
                            <div class="form-group">
                                <label for="title">Title</label>
                                    <input id="title" 
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
