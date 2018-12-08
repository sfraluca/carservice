@extends('platform')

@section('content')
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top menu" id="mainNav">
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
    <section class="about-section text-left masthead " style=" background-image: url('img/download3.jpg')">
      <div class="container" > 
        <div class="row">
          <div class="col-lg-8 mx-auto transbox">
            <h2 class="">We are...</h2>
            <p class="">An service auto for Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
              <a href="http://startbootstrap.com/template-overviews/grayscale/">the preview page</a>. The theme is open source, and you can use it for any purpose, personal or commercial.</p>
          </div>
        </div>
       
      </div>
    </section>
    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
      <div class="container">

        <!-- Featured Project Row -->
        <div class="row align-items-center no-gutters mb-4 mb-lg-5">
          <div class="col-xl-8 col-lg-7">
            <img class="img-fluid mb-3 mb-lg-0" src="{{ asset('img/180227_machine-learning-for-lp2.jpg') }}" alt="">
          </div>
          <div class="col-xl-4 col-lg-5">
            <div class="border-section-text text-center text-lg-left">
              <h4>Recognize plate number by image</h4>
              <p class="text-black-50 mb-0">Our services is related with the standards and you can see them right here!
              </p>
              <br>
              <form class="forms-sample" method="POST" action="{{ route('store_plate') }}" enctype="multipart/form-data">
                                @csrf
            
            
                    
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
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
                <br>
               <button type="submit" value="Upload" name="submit" class="menu btn  js-scroll-trigger">Save changes</button>
            
               
            </form>
            
            </div>
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
