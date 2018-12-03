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
      <h2>Contact</h2>
      <div>Regular shadow</div>
    </header>

    <!-- Page Content -->
    <section id="contact" >
    
    <div class="section-content">
        <h1 class="section-header">Get in <span class="content-header wow fadeIn " data-wow-delay="0.2s" data-wow-duration="2s"> Touch with us</span></h1>
        <h3>Lorem Ipsum is simply dummy text of the printing and typesetting industry</h3>
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
                                    <input type="text" name="name" class="form-control"  placeholder="Name" rows="3" required autofocus>                  
                                </div>
                                <div class="form-group ">
                                    <input type="email" name="email" class="form-control"  placeholder="Email" rows="3" required autofocus>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Textarea" rows="3"></textarea>        
                                </div>
                                <div >
                                <button type="button" class="btn btn-default submit"><i class="fa fa-paper-plane" aria-hidden="true"></i>  Send Message</button>
                                </div>
                            </div>
                        </div>
                    <div>
                </form>
            </div>
        </div>
    </div>
</section>
    <!--Section: Contact v.2-->



                   
   

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