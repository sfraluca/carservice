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
                    Manage all cars
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                     
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
                    <p>Create new car:</p>
                    <button type="submit" class="btn btn-gradient-success btn-icon-text float-right">                                                 
                        <a class="text-white" href="{{ route('create_car') }}">Add car</a>
                    </button>  </div>  
                    @endcan</div><br>
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
        </div>@include('layouts.footer')
    </div>

    </div>
</div>            
@endsection