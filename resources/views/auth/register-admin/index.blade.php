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
              Manage all admins
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
<button type="submit" class="btn btn-gradient-success btn-icon-text float-right">                                                 
    <a href="{{ route('create_admin') }}">Add admin</a>
</button>   
<p>Create new account for admin:</p>
             
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Job
                        </th>
                        <th>
                            Show
                        </th>
                        <th>
                            Edit
                        </th>
                        <th>
                            Delete
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>
                            {{$admin->id}}
                        </td>
                        <td>
                            {{ $admin->name }}
                        </td>
                        <td>
                            {{ $admin->email }}
                        </td>
                        <td>
                            {{ $admin->job_title }}
                        </td>
                        <td>
                            <form action ="{{ route('show_admin', $admin->id)}}">
                            <input type="hidden"/>
                            <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-sm">                       
                            Show
                            </button>
                            </form>
                        </td>
                        <td>
                            <form action ="{{ route('edit_admin', $admin->id)}}">
                            <input type="hidden"/>
                            <button type="submit" class="btn btn-gradient-dark btn-icon-text btn-sm">
                            Edit                         
                            </button>
                            </form>
                        </td>
                        <td>
                        <form method="POST" class="delete_form" action ="{{ route('delete_admin', $admin->id)}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE"/>
                            <button type="submit" class="btn btn-gradient-danger btn-icon-text btn-sm">                                  
                            Delete
                            </button>
                            </form> 
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