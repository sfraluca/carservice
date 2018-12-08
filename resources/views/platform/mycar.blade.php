@extends('platform')

@section('content')
<nav class="navbar main navbar-expand-lg navbar-dark bg-dark fixed-top menu" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">ANPR Service Auto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
       
            <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
            @if (Route::has('login'))
                    @auth
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home<span class="sr-only">(current)</span></a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.logout') }}">Logout</a>
                    </li>
                    
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    
                </div>
            @endif
          </ul>
        </div>
      </div>
    </nav>

     <!-- Header -->
     <section class="info">
    
    <div class="container  align-items-center">
        <div class="row">
        <div class="col-lg-8 mx-auto transbox-service">
            <h3 class="text-center">Data about your car</h3>
            @foreach ($users as $car)
    <h5>You are registered as: <span class="font-weight-bold" >{{ $car->name }}</span> </h5>
    <h5>And your car is: <span class="font-weight-bold" >{{ $car->plate_number }}</span> </h5>
      <h6>Data about your car: <span class="font-weight-bold">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm">
                                Brand:
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->brand }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                Model:
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->model }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                Year:
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->year }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                Color:
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->color }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                Fuel Type:
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->fuel_type }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                Motor:
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->motor }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                Injection type:
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->injection_type }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                Motor code:
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->motor_code }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                Car body:
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->car_body }}
                                </div>
                            </div> 
                        </li>
                                   
                    </ul>
      
  
      </span></h5>
      <h6>And your services: <span class="font-weight-bold"> 
          @foreach ($services as $service)
          <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm">
                                Service title:
                                </div>
                                <div class="col-sm text-left">
                                {{ $service->title }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                Price:
                                </div>
                                <div class="col-sm text-left">
                                {{ $service->price }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                Description:
                                </div>
                                <div class="col-sm text-left">
                                {{ $service->description }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                Service date:
                                </div>
                                <div class="col-sm text-left">
                                {{ $service->service_date }}
                                </div>
                            </div> 
             
                        </li>
                                   
                    </ul>
                     
                            @endforeach</span> </h6>
                           
                            
        @endforeach
          </div>
        </div>
    </div>
</section>

    
       <!-- Footer -->
 <footer class="bg-black menu small text-center text-white-50">
      <div class="container">
        ANPR Service Auto 2019
      </div>
    </footer>
   
         <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/grayscale.min.js') }}"></script>
@endsection
