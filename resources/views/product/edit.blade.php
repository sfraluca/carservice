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
                Edit current product
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
                
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">   
                        <form class="forms-sample" method="POST" action="{{ route('update_product', $products->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="description">Description</label>
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
                                <label for="price">Price</label>
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
                                <label for="category_id">Category</label>
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
