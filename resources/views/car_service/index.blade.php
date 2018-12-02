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
                    <i class="mdi mdi-home"></i>                 
                    </span>
                    Manage all services
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
            <div class="col-lg-14 grid-margin stretch-card">
                <div class="card">      
                    <div class="card-body">
                    @can('create-car-service')
                    <button type="submit" class="btn btn-gradient-success btn-icon-text float-right">                                                 
                        <a href="{{ route('create_car_service') }}">Add service</a>
                    </button>
                    <p>Create new service:</p>
                    @endcan
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Service date</th>
                                        <th>Show</th>
                                        @can('update-car-service')<th>Edit</th>@endcan
                                        @can('delete-car-service')<th>Delete</th>@endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->price }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>{{ $service->service_date }}</td>
                                        <td>
                                            <form action ="{{ route('show_car_service', $service->id)}}">
                                                <input type="hidden"/>
                                                <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-sm">Show</button>
                                            </form>
                                        </td>
                                        <td>@can('update-car-service')
                                            <form action ="{{ route('edit_service', $service->id)}}">
                                                <input type="hidden"/>
                                                <button type="submit"class="btn btn-gradient-dark btn-icon-text btn-sm">Edit</button>
                                            </form>
                                            @endcan
                                        </td>
                                        <td>@can('delete-car-service')
                                            <form method="POST" class="delete_form" action ="{{ route('delete_service', $service->id)}}">
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
        </div>
    </div>
    
    </div>
</div>
@endsection