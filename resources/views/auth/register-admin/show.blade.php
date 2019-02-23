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
                    <i class="mdi mdi-account"></i>                 
                    </span>
                    Show current admin
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Job</th>
                                        @can('update-car')<th>Edit</th>@endcan
                                        @can('delete-admin')<th>Delete</th>@endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$admin->id}}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->job_title }}</td>                       
                                        <td>@can('update-car')
                                            <form action ="{{ route('edit_admin', $admin->id)}}">
                                                <input type="hidden"/>
                                                <button type="submit" class="btn btn-gradient-dark btn-icon-text btn-sm">Edit</button>
                                            </form>
                                            @endcan
                                        </td>
                                        <td>@can('delete-admin')
                                            <form method="POST" class="delete_form" action ="{{ route('delete_admin', $admin->id)}}">
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
