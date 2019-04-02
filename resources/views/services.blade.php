@extends('platform')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{ route('website', app()->getLocale()) }}">ANPR Service Auto</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          @lang('header.menu')
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          @if (Route::has('login'))
                    <li class="nav-item">
                      <a class="nav-link js-scroll-trigger" href="#about">@lang('header.about')</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link js-scroll-trigger" href="#projects">@lang('header.services')</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link js-scroll-trigger" href="#signup">@lang('header.contact')</a>
                    </li>
                    
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home', app()->getLocale()) }}">@lang('header.home')</a>
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
                <br> <br><br>  
                        <h1 class="mx-auto text-center text-uppercase">@lang('header.services')</h1> 
                </div>
                    <div class="col order-md4 order-sm2">

                        <div class="mx-auto text-center">
                        <br> <br> <br>
                        <br> <br> <br>
                        <h2 class="text-white-50 mx-auto mt-3 mb-5">@lang('header.presentation')</h2>
                        <a href="{{ route('login', app()->getLocale()) }}" class="btn btn-primary js-scroll-trigger">Get Started</a>
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

        <div class="row">
          <div class="col-lg-8 mx-auto">
            <h2 class=" mb-4">@lang('header.standard')</h2>
            <p class="">@lang('header.standardpres')</p>
          </div>
        </div>
        <img src="{{ asset('img/ipad.png') }}" class="img-fluid" alt="">
      </div>
      
      <div class="container">
      
    
        <h1>@lang('header.prices')</h1> 
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
                                <button type="submit" class="btn btn-primary mx-auto">@lang('header.send')</button>
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
   
   