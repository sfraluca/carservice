@extends('platform')

@section('content')
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="menu">
      <div class="container">
        <a class="navbar-brand" href="#">ANPR Service Auto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            
            @if (Route::has('login'))
            <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                    @auth
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home</a>
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

   <header class="py-5 bg-image-full" style="background-image: url('storage/images/introduction.jpg')">
      <h2>Services</h2>
      <div>Regular shadow</div>
    </header>

    <!-- Page Content -->
    <section class="py-5">
      <div class="container">
        <h1>Our Services</h1>
        <p>The background images for the slider are set directly in the HTML using inline CSS. The rest of the styles for this template are contained within the
          <code>half-slider.css</code>
          file.</p>
      </div>
    </section>
    <section class="py-5">
      <div class="container">
      
    
        <h1>Prices</h1> 
        @foreach ($products as $product)
        <div class="row">
                <div class="col-4">
                    <div class="list-group" >
                    <a class="list-group-item shadow p-3 mb-5 bg-white rounded font-weight-bold" id="list-revision-list" data-toggle="list">{{ $product->title }}</a>
                    </div>
                </div>
            <div class="col-8">
                <div>
                    <ul class="list-group">
                        <li class="list-group-item"><div class="row">
                            <div class="col-sm">
                            {{ $product->description }}
                            </div>
                            <div class="col-sm text-right">
                            {{ $product->price }}
                            </div>
                            </div> 
                        </li>
                                   
                    </ul>
                </div>
            </div>
           
        </div>
        @endforeach
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 bg-dark" id="menu">
      <div class="container">
        <p class="m-0 text-center text-white">ANPR Service Auto 2018</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
     
            
        </div>
        @endsection