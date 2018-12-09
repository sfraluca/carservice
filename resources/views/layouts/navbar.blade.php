<nav class="navbar default-layout-navbar  col-lg-12 col-12 p-0 fixed-top d-flex flex-row" id="admin-menu">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ route('dashboard') }}">ANPR Service Auto</a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('dashboard') }}"><img src="/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
       
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
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
             
              <div class="nav-profile-text">
                <p class="mb-1 text-black">{{ Auth::user()->name }} </p>
              </div>
            </a>
                       
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
             
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                </form>
            </div>
          </li> 
          @endguest
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          
      </div>
    </nav>