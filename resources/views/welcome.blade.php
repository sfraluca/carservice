@extends('platform')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">ANPR Service Auto</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">Welcome</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link js-scroll-trigger" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link js-scroll-trigger" href="#projects">Services</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link js-scroll-trigger" href="#signup">Contact</a>
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

    <!-- Header -->
    <header class="masthead">
    
        <div class="container  align-items-center">
            <div class="row">
                <div class="col order-md4 order-sm2">
                <br> <br><br>  
                        <h1 class="mx-auto text-center text-uppercase">Welcome</h1> 
                </div>
                    <div class="col order-md4 order-sm2">

                        <div class="mx-auto text-center">
                        <br> <br> <br>
                        <br> <br> <br>
                        <h2 class="text-white-50 mx-auto mt-3 mb-5">An automatic number-plate recognition service auto is ready to help you to know the status of your car everywhere you are with just one click. 
                        Upload an image with your car plate number and see the info about your car services.</h2>
                        <a href="{{ route('login') }}" class="btn btn-primary js-scroll-trigger">Get Started</a>
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
            <p class="text-white-50">An service auto application ready to interract with you. We are here to support you and your car. And now everything is more easier with this new technology.</p>
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
            <div class="featured-text text-center text-lg-left">
              <h4>Services</h4>
              <p class="text-black-50 mb-0">Our services is related with the standards and you can see them right here!
              </p><a href="{{ url('/services') }}" class="btn btn-primary js-scroll-trigger">Info Services</a>
            </div>
          </div>
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
                  <hr class="d-none d-lg-block mb-0 ml-0">
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
                  <hr class="d-none d-lg-block mb-0 mr-0">
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
                <form action="{{route('store_contact')}}" method="post">
                {{ csrf_field()}}
                    <div class="container">
                        <div class="row">
                            <div class="col form-line">
                                    <div class="form-group">
                                        <label for="name" class="text-white">Name</label>
                                        <input name="name" type="text" class="form-control transparent-input" id="name"required>                  
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="text-white">Your Email Address</label>
                                        <input type="email" name="email" class="form-control transparent-input " id="email" required>                  
                                    </div>
                                    <div class="form-group ">
                                        <label for="subject" class="text-white">Subject</label>
                                        <input type="text" name="subject" class="form-control transparent-input " id="subject">    
                                    </div>
                                    
                            </div>
                            <div class="col">
                                    <div class="form-group">
                                        <label for="text" class="text-white">Description</label>
                                        <textarea name="message" class="form-control transparent-input" id="exampleFormControlTextarea1" rows="3"></textarea>          
                                    </div>
                                <button type="submit" class="btn btn-primary mx-auto">Send</button>
                            </div>
                        </div>
                    <div>
                </form>
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