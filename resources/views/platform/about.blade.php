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
                    <a class="nav-link js-scroll-trigger" href="#about">About</a>
                    </li>
                    
                    <li class="nav-item">
                      <a class="nav-link js-scroll-trigger" href="#projects">Services</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
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
    <header class="masthead">
    
        <div class="container  align-items-center">
            <div class="row">
                <div class="col order-md4 order-sm2">
                <br> <br><br>  <br>
                        <h1 class="mx-auto text-center text-uppercase">About us</h1> 
                </div>
                    <div class="col order-md4 order-sm2">

                        <div class="mx-auto text-center">
                        <br> <br> <br>
                        <br> <br> <br>
                        <h2 class="text-white-50 mx-auto mt-3 mb-5">An automatic number-plate recognition service auto is ready to help you to know the status of your car everywhere you are with just one click. 
                        Upload an image with your car plate number and see the info about your car services.</h2>
                        <a href="#about" class="btn menu js-scroll-trigger">Get Started</a>
                        </div>
                    </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="about-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-white mb-4">We are...</h2>
            <p class="text-white-50">An service auto for Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
              <a href="http://startbootstrap.com/template-overviews/grayscale/">the preview page</a>. The theme is open source, and you can use it for any purpose, personal or commercial.</p>
          </div>
        </div>
        <img src="{{ asset('img/ipad.png') }}" class="img-fluid" alt="">
      </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="projects-section bg-light">
      <div class="container">

        <!-- Featured Project Row -->
        <div class="row align-items-center no-gutters mb-4 mb-lg-5">
          <div class="col-xl-8 col-lg-7">
            <img class="img-fluid mb-3 mb-lg-0" src="{{ asset('img/bg-masthead.jpg') }}" alt="">
          </div>
          <div class="col-xl-4 col-lg-5">
            <div class="border-section-text text-center text-lg-left">
              <h4>Services</h4>
              <p class="text-black-50 mb-0">Our services is related with the standards and you can see them right here!
              </p>
            </div>
          </div>
        </div>
        <div class="container">

        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class=" mb-4">Our standards</h2>
            <p class="">An service auto for Grayscale is a free Bootstrap theme created by Start Bootstrap. It can be yours right now, simply download the template on
              <a href="http://startbootstrap.com/template-overviews/grayscale/">the preview page</a>. The theme is open source, and you can use it for any purpose, personal or commercial.</p>
          </div>
        </div>
        <img src="{{ asset('img/ipad.png') }}" class="img-fluid" alt="">
      </div>
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

        <!-- Project One Row -->
        <div class="row justify-content-center no-gutters mb-5 mb-lg-0">
          <div class="col-lg-6">
            <img class="img-fluid" src="{{ asset('img/demo-image-01.jpg') }}" alt="">
          </div>
          <div class="col-lg-6">
            <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-left">
                  <h4 class="text-white">Our story</h4>
                  <p class="mb-0 text-white-50">In the end we are here. With a new concept about ANPR, now you can manage your car in a new brand manner. 
                  We start our idea from the bottom where our clients can be anybody, not just authorized civils. Then we follow the modern style for managing the services. 
                  From everywhere your are right now you can upload an image to your website an see everything about your car and the status of your services.</p>
                  <hr id="line" class="d-none d-lg-block mb-0 ml-0">
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Project Two Row -->
        <div class="row justify-content-center no-gutters">
          <div class="col-lg-6">
            <img class="img-fluid" src="{{ asset('img/demo-image-02.jpg') }}" alt="">
          </div>
          <div class="col-lg-6 order-lg-first">
            <div class="bg-black text-center h-100 project">
              <div class="d-flex h-100">
                <div class="project-text w-100 my-auto text-center text-lg-right">
                  <h4 class="text-white">Grab it!</h4>
                  <p class="mb-0 text-white-50">There is no time to wait. Just come and see how it works! Right now. We are waiting you in our service.</p>
                  <hr id="line" class="d-none line d-lg-block mb-0 mr-0">
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>

    <!-- Signup Section -->
   
    <section id="signup" class="signup-section">
    
      <div class="section-content">
      <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
              <h2 class="text-white mb-5">Contact us!</h2>
      </div>
    <br>
    <div class="w-100">
        <div class=" mx-auto">
            <div class="auth-form-light text-left ">
                <form >
                    <div class="container">
                        <div class="row">
                            <div class="col form-line">
                                    <div class="form-group">
                                        <label for="first_name" class="text-white">First Name</label>
                                        <input type="text" class="form-control transparent-input" id="first_name">                  
                                    </div>
                                    <div class="form-group ">
                                        <label for="last_name" class="text-white">Last name</label>
                                        <input type="text" class="form-control transparent-input " id="last_name">    
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="text-white">Your Email Address</label>
                                        <input type="email" class="form-control transparent-input " id="email">                  
                                    </div>
                            </div>
                            <div class="col">
                                    <div class="form-group">
                                        <label for="text" class="text-white">Description</label>
                                        <textarea class="form-control transparent-input" id="exampleFormControlTextarea1" rows="3"></textarea>          
                                    </div>
                                <button type="submit" class="btn menu mx-auto">Send</button>
                            </div>
                        </div>
                    <div>
                </form>
            </div>
        </div>
    </div>
</section>

   <!-- Contact Section -->
   <section class="contact-section bg-black">
      <div class="container">

        <div class="row">

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Our adress</h4>
                <hr class="my-4">
                <div class="small text-black-50">4923 Market Street, Orlando FL</div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-envelope text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Contact Email</h4>
                <hr class="my-4">
                <div class="small text-black-50">
                  <a href="#">hello@yourdomain.com</a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-4 mb-3 mb-md-0">
            <div class="card py-4 h-100">
              <div class="card-body text-center">
                <i class="fas fa-mobile-alt text-primary mb-2"></i>
                <h4 class="text-uppercase m-0">Contact Phone</h4>
                <hr class="my-4">
                <div class="small text-black-50">+1 (555) 902-8832</div>
              </div>
            </div>
          </div>
        </div>

       

      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black small text-center text-white-50">
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