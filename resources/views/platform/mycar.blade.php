@extends('platform')

@section('content')
<nav class="navbar main navbar-expand-lg navbar-dark bg-dark fixed-top menu" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home', app()->getLocale()) }}">ANPR Service Auto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
       
            <li class="nav-item">
                    <a class="nav-link" href="{{ route('about_web', app()->getLocale()) }}">@lang('header.about')</a>
                    </li>
            @if (Route::has('login'))
                    @auth
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home', app()->getLocale()) }}">@lang('header.home')<span class="sr-only">(current)</span></a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('web.logout', app()->getLocale()) }}">Logout</a>
                    </li>
                    
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login', app()->getLocale()) }}">@lang('header.login')</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register', app()->getLocale()) }}">@lang('header.register')</a>
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
            <h3 class="text-center">@lang('header.datacar')</h3>
           
            <h5>@lang('header.registeras'): <span class="font-weight-bold" >{{ Auth::user()->name }}</span> </h5>
           <h6>@lang('header.yourservices'): <span class="font-weight-bold"> 
          @foreach ($services as $service)
          <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.servicetitle'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $service->title }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.price'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $service->price }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.description'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $service->description }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.servicedate'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $service->service_date }}
                                </div>
                            </div> 
             
                        </li>
                                   
                    </ul>
                     
            @endforeach</span> </h6>
            @foreach ($users as $car)
    
    <h5>@lang('header.yourcar') <span class="font-weight-bold" >{{ $car->plate_number }}</span> </h5>
      <h6>@lang('header.datacar'): <span class="font-weight-bold">

                    <ul class="list-group">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.brand'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->brand }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.model'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->model }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.year'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->year }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.color'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->color }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.fueltype'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->fuel_type }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.motor'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->motor }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.injection_type'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->injection_type }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.motor_code'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->motor_code }}
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm">
                                @lang('header.car_body'):
                                </div>
                                <div class="col-sm text-left">
                                {{ $car->car_body }}
                                </div>
                            </div> 
                        </li>
                                   
                    </ul>
      
  @endforeach



      </span></h5>
      
                           
                            
        
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
