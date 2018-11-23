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
                    Show current admin
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
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Job</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$admin->id}}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->job_title }}</td>                       
                                        <td>
                                            <form action ="{{ route('edit_admin', $admin->id)}}">
                                                <input type="hidden"/>
                                                <button type="submit" class="btn btn-gradient-dark btn-icon-text btn-sm">Edit</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="POST" class="delete_form" action ="{{ route('delete_admin', $admin->id)}}">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE"/>
                                                <button type="submit" class="btn btn-gradient-danger btn-icon-text btn-sm">Delete</button>
                                            </form> 
                                        </td>
                                    </tr>                   
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
