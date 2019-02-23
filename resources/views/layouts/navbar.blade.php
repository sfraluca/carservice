<nav class="navbar default-layout-navbar  col-lg-12 col-12 p-0 fixed-top d-flex flex-row" id="admin-menu">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">ANPR Service Auto</a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img src="/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
         
        </div>
        <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
            @if (Route::has('register'))
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            @endif
        </li>
        @else
          <li class="text-left nav-item">
         <p>{{ Auth::user()->name }}</p>
            </li>  <li  class="nav-item">
             
              <a class="nav-link" href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
              <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
           
          </li> 
          @endguest
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
          
      </div>
    </nav>