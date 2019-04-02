@extends('layouts.app')

@section('content')
@include('layouts.navbar')

 <div class="container-scroller">
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('layouts.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>                 
              </span>
              @lang('header.dashboard')
             
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                   @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                              href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                        </li>
                    @endforeach
                </li>
              </ul>
            </nav>
          </div>
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3"> @lang('header.weekly')
                    <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">{{$usersCount}}</h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                  <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                  
                  <h4 class="font-weight-normal mb-3">@lang('header.weeklyservice')
                    <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">{{$servicesCount}}</h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                  <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>                                    
                  <h4 class="font-weight-normal mb-3">@lang('header.allcar')
                    <i class="mdi mdi-diamond mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5">{{$carCount}}</h2>
                </div>
              </div>
            </div>
          </div>


    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">@lang('header.recognizetitle')</h4>
                    @if(Session::has('error'))
                    <p class="alert alert-warning">{{ Session::get('error') }}</p>
                    @endif
                    <div class="table-responsive">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-block btn-lg btn-gradient-primary mt-4" data-toggle="modal" data-target="#exampleModal">
                        @lang('header.seeinfo')
                        </button>

                    <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">@lang('header.upload')</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                <form class="forms-sample" method="POST" action="{{ route('store_image', app()->getLocale()) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                    <p class="text-center">@lang('header.licence')</p>
                                    <div class="input-group">

                                    <div class="custom-file">
                                    <input type="file"data-browse-on-zone-click="true"
                                    name="image"  
                                    class="custom-file-input" id="inputGroupFile01" 
                                    aria-describedby="inputGroupFileAddon01">
                                    @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                    <label class="custom-file-label" for="inputGroupFile01"></label>
                                    </div>
                                    </div>
                                    <br><div class="modal-footer">
                                    <button type="submit" value="Upload" name="submit" class="menu btn btn-primary js-scroll-trigger">@lang('header.save')</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">>@lang('header.close')</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div> 
            
            
            <br>
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3>@lang('header.lastmonth')</h3>
                    <div class="table-responsive">
                        <table id="cars" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>@lang('header.name')</th>
                                <th>Email</th>
                                <th>@lang('header.created_at') </th>
                                <th>@lang('header.updated_at') </th>
                                <th>@lang('header.show')</th>
                                @can('update-user')<th>@lang('header.edit')</th> @endcan
                                @can('delete-user')<th>@lang('header.delete')</th> @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersMonth as $user)
                                <tr>
                                    <td>{{ $user->id}}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>
                                    <td>
                                    <form action ="{{ route('show_user', [ app()->getLocale(),$user->id])}}">
                                    <input type="hidden"/>
                                    <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-sm">@lang('header.show')</button>
                                    </form>
                                    </td>
                                    <td>@can('update-user')
                                    <form action ="{{ route('edit_user',[ app()->getLocale() ,$user->id])}}">
                                    <input type="hidden"/>
                                    <button type="submit" class="btn btn-gradient-dark btn-icon-text btn-sm">@lang('header.edit')</button>
                                    </form>
                                    @endcan
                                    </td>
                                    <td>@can('delete-user')
                                    <form method="POST" class="delete_form" action ="{{ route('delete_user', [app()->getLocale(),$user->id ])}}">
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
    </div>

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3>@lang('header.lastweek')</h3>
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
                                @foreach ($carsMonth as $car)
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
                                    <form action ="{{ route('show_car', [$car->id, app()->getLocale()])}}">
                                    <input type="hidden"/>
                                    <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-sm">@lang('header.show')</button>
                                    </form>                                       
                                    </td>
                                    <td>@can('update-car')
                                    <form action ="{{ route('edit_car', [$car->id, app()->getLocale()])}}">
                                    <input type="hidden"/>
                                    <button type="submit"class="btn btn-gradient-dark btn-icon-text btn-sm">@lang('header.edit')</button>
                                    </form>
                                    @endcan
                                    </td>
                                    <td>@can('delete-car')
                                    <form method="POST" class="delete_form" action ="{{ route('delete_car', [$car->id, app()->getLocale()])}}">
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
        </div>
    </div>
        @include('layouts.footer')
        </div>
      </div>
     
    </div>
    
  </div>
 

@endsection
