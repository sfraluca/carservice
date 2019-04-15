@extends('platform')

@section('content')
<nav class="navbar main navbar-expand-lg navbar-dark bg-dark fixed-top menu" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="{{  route('home', app()->getLocale()) }}">ANPR Service Auto</a>
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
                    @foreach (config('app.available_locales') as $locale)
                        <li class="nav-item">
                            <a class="nav-link"
                              href="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), $locale) }}"
                                @if (app()->getLocale() == $locale) style="font-weight: bold; text-decoration: underline" @endif>{{ strtoupper($locale) }}</a>
                        </li>
                    @endforeach
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
                        <h1 class="mx-auto text-center text-uppercase">@lang('header.aboutus')</h1> 
                </div>
                    <div class="col order-md4 order-sm2">

                        <div class="mx-auto text-center">
                        <br> <br> <br>
                        <br> <br> <br>
                        <h2 class="text-white-50 mx-auto mt-3 mb-5">@lang('header.presentation')</h2>
                       
                    </div>
            </div>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="about-section text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class="text-white mb-4">@lang('header.we')...</h2>
            <p class="text-white-50">@lang('header.aboutpresentation')</p>
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
              <h4>@lang('header.services')</h4>
              <p class="text-black-50 mb-0">@lang('header.service')
              </p><a href="{{ route('web_services', app()->getLocale()) }}" class="btn menu js-scroll-trigger">@lang('header.info')</a>
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
                  <h4 class="text-white">@lang('header.our')</h4>
                  <p class="mb-0 text-white-50">@lang('header.story')</p>
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
                  <h4 class="text-white">@lang('header.grab')!</h4>
                  <p class="mb-0 text-white-50">@lang('header.grabpresentation')</p>
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
              <h2 class="text-white mb-5">@lang('header.contactus')!</h2>
      </div>
    <br>
    <div class="w-100">
        <div class=" mx-auto">
            <div class="auth-form-light text-left ">
                <form action="{{route('store_contact', app()->getLocale())}}" method="post">
                {{ csrf_field()}}
                    <div class="container">
                        <div class="row">
                            <div class="col form-line">
                                    <div class="form-group">
                                        <label for="name" class="text-white">@lang('header.name')</label>
                                        <input name="name" type="text" class="form-control transparent-input" id="name"required>                  
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="text-white">@lang('header.email')</label>
                                        <input type="email" name="email" class="form-control transparent-input " id="email" required>                  
                                    </div>
                                    <div class="form-group ">
                                        <label for="subject" class="text-white">@lang('header.subject')</label>
                                        <input type="text" name="subject" class="form-control transparent-input " id="subject">    
                                    </div>
                                    
                            </div>
                            <div class="col">
                                    <div class="form-group">
                                        <label for="text" class="text-white">@lang('header.description')</label>
                                        <textarea name="message" class="form-control transparent-input" id="exampleFormControlTextarea1" rows="3"></textarea>          
                                    </div>
                                <button type="submit" class="btn menu js-scroll-trigger">@lang('header.send')</button>
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