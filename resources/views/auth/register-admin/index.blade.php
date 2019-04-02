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
                    @lang('header.manageadmin')
                </h3>
                <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                   @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                              href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),app()->getLocale()) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                        </li>
                    @endforeach
                </li>
              </ul>
            </nav>
            </div>
            <div class="col-lg-14 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body"> 
                        <div class="row">
                    @can('create-admin')
                    <div class="float-right">
                    <p>@lang('header.newadmin'):</p>
                    <button type="submit" class="btn btn-gradient-success btn-icon-text">                                                 
                        <a class="text-white" href="{{ route('create_admin', app()->getLocale()) }}">@lang('header.create_admin')</a>
                    </button></div>   
                    @endcan
                   </div>
                   <br>
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('header.name')</th>
                                    <th>Email</th>
                                    <th>@lang('header.jobtitle') </th>
                                    <th>@lang('header.show')</th>
                                    @can('update-admin')<th>@lang('header.edit')</th> @endcan
                                    @can('delete-admin')<th>@lang('header.delete')</th> @endcan
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($admins as $admin)
                                <tr>
                                    <td>{{$admin->id}}</td>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->job_title }}</td>
                                    <td>
                                        <form action ="{{ route('show_admin', [app()->getLocale(),$admin->id])}}">
                                            <input type="hidden"/>
                                            <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-sm">@lang('header.show')</button>
                                        </form>
                                    </td>
                                    <td>@can('update-admin')
                                        <form action ="{{ route('edit_admin',[  app()->getLocale(),$admin->id])}}">
                                            <input type="hidden"/>
                                            <button type="submit" class="btn btn-gradient-dark btn-icon-text btn-sm">@lang('header.edit')</button>
                                        </form>
                                        @endcan
                                    </td>
                                    <td>@can('delete-admin')
                                        <form method="POST" class="delete_form" action ="{{ route('delete_admin', [ app()->getLocale(),$admin->id])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <button type="submit" class="btn btn-gradient-danger btn-icon-text btn-sm">@lang('header.delete')</button>
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