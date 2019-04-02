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
                    @lang('header.showuser')
                </h3>
                <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                   @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                              href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),[app()->getLocale(), $users->id]) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                        </li>
                    @endforeach
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
                                    <th>@lang('header.name')</th>
                                    <th>Email</th>
                                    <th>@lang('header.created_at') </th>
                                    <th>@lang('header.updated_at') </th>
                                    @can('update-user')<th>@lang('header.edit')</th> @endcan
                                    @can('delete-user')<th>@lang('header.delete')</th> @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>{{$users->id}}</td>
                                    <td>{{ $users->name }}</td>
                                    <td>{{ $users->email }}</td>
                                    <td>{{ $users->created_at }}</td>
                                    <td>{{ $users->updated_at }}</td>
                                    <td>@can('update-user')
                                        <form action ="{{ route('edit_user', [app()->getLocale(),$users->id])}}">
                                            <input type="hidden"/>
                                            <button type="submit" class="btn btn-gradient-dark btn-icon-text btn-sm">@lang('header.edit')</button>
                                        </form>
                                        @endcan
                                    </td>
                                    <td>@can('delete-user')
                                        <form method="POST" class="delete_form" action ="{{ route('delete_user', [ app()->getLocale(),$users->id])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <button type="submit" class="btn btn-gradient-danger btn-icon-text btn-sm">@lang('header.delete')</button>
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
