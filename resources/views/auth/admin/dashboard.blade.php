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
              Dashboard
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
          <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <img src="/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image"/>
                  <h4 class="font-weight-normal mb-3">Weekly Customers
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
                  <h4 class="font-weight-normal mb-3">Weekly Services
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
                  <h4 class="font-weight-normal mb-3">All car
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
                    <h4 class="card-title">Recognize plate number by image</h4>
                    <div class="table-responsive">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-block btn-lg btn-gradient-primary mt-4" data-toggle="modal" data-target="#exampleModal">
                        See info
                        </button>

                    <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Upload image</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                <form class="forms-sample" method="POST" action="{{ route('store_image') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                    <p class="text-center"> The licence plate from the image it will send you to the services from the car plate number from the image.</p>
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
                                    <button type="submit" value="Upload" name="submit" class="menu btn btn-primary js-scroll-trigger">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    <h3>Last month registered users</h3>
                    <div class="table-responsive">
                        <table id="cars" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>created_at </th>
                                <th>updated_at </th>
                                <th>Show</th>
                                @can('update-user')<th>Edit</th> @endcan
                                @can('delete-user')<th>Delete</th> @endcan
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
                                    <form action ="{{ route('show_user', $user->id)}}">
                                    <input type="hidden"/>
                                    <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-sm">Show</button>
                                    </form>
                                    </td>
                                    <td>@can('update-user')
                                    <form action ="{{ route('edit_user', $user->id)}}">
                                    <input type="hidden"/>
                                    <button type="submit" class="btn btn-gradient-dark btn-icon-text btn-sm">Edit</button>
                                    </form>
                                    @endcan
                                    </td>
                                    <td>@can('delete-user')
                                    <form method="POST" class="delete_form" action ="{{ route('delete_user', $user->id)}}">
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

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h3>Last week registered cars</h3>
                    <div class="table-responsive">  
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Plate number</th>
                                    <th>Brand</th>
                                    <th>Model</th>
                                    <th>Year</th>
                                    <th>Color</th>
                                    <th>Fuel type</th>
                                    <th>Motor</th>
                                    <th>Injection type</th>
                                    <th>Motor code</th>
                                    <th>Car body</th>
                                    <th>Show</th>
                                    @can('update-car')<th>Edit</th>@endcan
                                    @can('update-car')<th>Delete</th>@endcan
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
                                    <form action ="{{ route('show_car', $car->id)}}">
                                    <input type="hidden"/>
                                    <button type="submit" class="btn btn-gradient-primary btn-icon-text btn-sm">Show</button>
                                    </form>                                       
                                    </td>
                                    <td>@can('update-car')
                                    <form action ="{{ route('edit_car', $car->id)}}">
                                    <input type="hidden"/>
                                    <button type="submit"class="btn btn-gradient-dark btn-icon-text btn-sm">Edit</button>
                                    </form>
                                    @endcan
                                    </td>
                                    <td>@can('delete-car')
                                    <form method="POST" class="delete_form" action ="{{ route('delete_car', $car->id)}}">
                                    {{csrf_field()}}
                                    <input type="hidden" name="_method" value="DELETE"/>
                                    <button type="submit" class="btn btn-gradient-danger btn-icon-text btn-sm">Delete</button>
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
