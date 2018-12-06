@extends('layouts.app')

@section('content')
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="menu">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">ANPR Service Auto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
       
            
            @if (Route::has('login'))
                    @auth
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/mycar') }}">My car<span class="sr-only">(current)</span></a>
                      
                    </li>
                    
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </div>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <br>
    <br>
    <br>  
    Your car: {{$plateNumber}}
    @foreach ($users as $car)
    user:
       {{ $car->id }}
       {{ $car->name }}
       car:
                            {{ $car->plate_number }}
                           
                            {{ $car->year }}
                            @foreach ($services as $service)
                            {{ $service->title }}
                            @endforeach
        @endforeach
        </div>
@endsection
