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
                        <a class="nav-link" href="{{ route('web.logout', app()->getLocale()) }}">@lang('header.logout')</a>
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
    <section class="about-section text-left masthead " style="background-image: url('/img/d5.jpg')">
      <div class="container" > 
        <div class="row">
          <div class="col-lg-8 mx-auto transbox">
            <h2 class="">@lang('header.we')...</h2>
            <p class="">@lang('header.aboutpresentation')</p>
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
              <h4>@lang('header.recognizetitle')</h4>
              <p class="text-black-50 mb-0">@lang('header.service')
              </p>
              <br>
              <form class="forms-sample" method="POST" action="{{ route('store_plate', app()->getLocale()) }}" enctype="multipart/form-data">
                                @csrf
            
            
                    
                    <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">@lang('header.upload')</span>
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
               <button type="submit" value="Upload" name="submit" class="menu btn  js-scroll-trigger">@lang('header.save')</button>
            
               
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
