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
                    Manage all products
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                      
                    </li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-14 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body"> <div class="row">
                    @can('create-product')
                    <div class="float-right">
                    <p>Create new product:</p>
                    <button type="submit" class="btn btn-gradient-success btn-icon-text float-right">                                                 
                            <a class="text-white" href="{{ route('create_product') }}">Add product</a>
                        </button>      </div>  
                    @endcan</div><br>
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Show</th>
                                        @can('update-product')<th>Edit</th>@endcan
                                        @can('delete-product')<th>Delete</th>@endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>                      
                                        <td>
                                            <form action ="{{ route('show_product', $product->id)}}">
                                                <input type="hidden"/>
                                                <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-sm">Show</button>
                                            </form>
                                        </td>
                                        <td>@can('update-product')
                                            <form action ="{{ route('edit_product', $product->id)}}">
                                                <input type="hidden"/>
                                                <button type="submit"class="btn btn-gradient-dark btn-icon-text btn-sm">Edit</button>
                                            </form>
                                            @endcan
                                        </td>
                                        <td>@can('delete-product')
                                            <form method="POST" class="delete_form" action ="{{ route('delete_product', $product->id)}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <button type="submit" class="btn btn-gradient-danger btn-icon-text btn-sm">Delete</button>
                                            </form> 
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>               
            </div>
        </div>@include('layouts.footer')
    </div>

    </div>
</div>
@endsection