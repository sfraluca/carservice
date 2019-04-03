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
                    Manage all services
                </h3>
                 <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                   @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                              href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(),[app()->getLocale(),$plateNumber]) }}"
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
                    @can('create-car-service')
                    <div class="float-right">
                    <p>Create new service:</p>
                    <button type="submit" class="btn btn-gradient-success btn-icon-text float-right">                                                 
                        <a class="text-white" href="{{ route('create_car_service', app()->getLocale()) }}">@lang('header.create_car_service')</a>
                    </button></div>  
                    
                    @endcan</div><br>
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>@lang('header.title')</th>
                                        <th>@lang('header.price')</th>
                                        <th>@lang('header.description')</th>
                                        <th>@lang('header.servicedate')</th>
                                        <th>@lang('header.show')</th>
                                        @can('update-car-service')<th>@lang('header.edit')</th>@endcan
                                        @can('delete-car-service')<th>@lang('header.delete')</th>@endcan
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
                                            <form action ="{{ route('show_car_service', [app()->getLocale(),$service->id])}}">
                                                <input type="hidden"/>
                                                <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-sm">@lang('header.show')</button>
                                            </form>
                                        </td>
                                        <td>@can('update-car-service')
                                            <form action ="{{ route('edit_service', [app()->getLocale(),$service->id])}}">
                                                <input type="hidden"/>
                                                <button type="submit"class="btn btn-gradient-dark btn-icon-text btn-sm">@lang('header.edit')</button>
                                            </form>
                                            @endcan
                                        </td>
                                        <td>@can('delete-car-service')
                                            <form method="POST" class="delete_form" action ="{{ route('delete_service', [app()->getLocale(),$service->id])}}">
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