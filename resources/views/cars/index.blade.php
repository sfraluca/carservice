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
                    <i class="mdi mdi-car"></i>                 
                    </span>
                   @lang('header.managecar')
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
                    @can('create-car')
                    <div class="float-right">
                    <p>@lang('header.newcar'):</p>
                    <button type="submit" class="btn btn-gradient-success btn-icon-text float-right">                                                 
                        <a class="text-white" href="{{ route('create_car', app()->getLocale()) }}">Add car</a>
                    </button>  </div>  
                    @endcan</div><br>
                    <div class="table-responsive">  
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('header.platenumber')</th>
                                    <th>@lang('header.brand')</th>
                                    <th>@lang('header.model')</th>
                                    <th>@lang('header.year')</th>
                                    <th>@lang('header.color')</th>
                                    <th>@lang('header.fueltype')</th>
                                    <th>@lang('header.motor')</th>
                                    <th>@lang('header.injection_type')</th>
                                    <th>@lang('header.motor_code')</th>
                                    <th>@lang('header.car_body')</th>
                                    <th>@lang('header.show')</th>
                                    @can('update-car')<th>@lang('header.edit')</th>@endcan
                                    @can('update-car')<th>@lang('header.delete')</th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cars as $car)
                                <tr>
                                    <td>{{ $car->id }}</td>
                                    <td>{{ $car->plate_number }}</td>
                                    <td>{{ $car->brand }}</td>
                                    <td>{{ $car->model }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->color }}</td>
                                    <td>{{ $car->fuel_type }}</td>
                                    <td>{{ $car->motor }}</td>
                                    <td>{{ $car->injection_type }}</td>
                                    <td>{{ $car->motor_code }}</td>
                                    <td>{{ $car->car_body }}</td>
                                    <td>
                                        <form action ="{{ route('show_car', [app()->getLocale(),$car->id])}}">
                                            <input type="hidden"/>
                                            <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-sm">@lang('header.show')</button>
                                        </form>                                       
                                    </td>
                                    <td>@can('update-car')
                                        <form action ="{{ route('edit_car', [app()->getLocale(),$car->id])}}">
                                            <input type="hidden"/>
                                            <button type="submit"class="btn btn-gradient-dark btn-icon-text btn-sm">@lang('header.edit')</button>
                                        </form>
                                        @endcan
                                    </td>
                                    <td>@can('delete-car')
                                        <form method="POST" class="delete_form" action ="{{ route('delete_car', [app()->getLocale(),$car->id])}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="DELETE"/>
                                            <button type="submit" class="btn btn-gradient-danger btn-icon-text btn-sm">@lang('header.delete')</button>
                                        </form> 
                                    </td>@endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>               
        </div>@include('layouts.footer')
    </div>

    </div>
</div>            
@endsection