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
                    <i class="mdi mdi-wrench"></i>                 
                    </span>
                    Show current service
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
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Service date</th>
                                        @can('update-car-service')<th>Edit</th>@endcan
                                        @can('delete-car-service')<th>Delete</th>@endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $services->id }}</td>
                                        <td>{{ $services->title }}</td>
                                        <td>{{ $services->price }}</td>
                                        <td>{{ $services->description }}</td>
                                        <td>{{ $services->service_date }}</td>
                                        <td>@can('update-car-service')
                                            <form action ="{{ route('edit_service', $services->id)}}">
                                                <input type="hidden"/>
                                                <button type="submit"class="btn btn-gradient-dark btn-icon-text btn-sm">Edit</button>
                                            </form>
                                            @endcan
                                        </td>
                                        <td>@can('delete-car-service')
                                            <form method="POST" class="delete_form" action ="{{ route('delete_service', $services->id)}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <button type="submit" class="btn btn-gradient-danger btn-icon-text btn-sm">Delete</button>
                                            </form> 
                                            @endcan
                                        </td>
                                    </tr>
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