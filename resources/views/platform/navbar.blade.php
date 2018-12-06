<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row" id="menu">
<ul class="navbar-nav navbar-nav-right"><li class="nav-item text-black">
        <a class="navbar-brand" href="{{ url('/home') }}">ANPR Service Auto</a></li></ul>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" class="form-control bg-transparent border-0 " placeholder="Search projects">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item text-black">
        <a class="nav-link " href="#">My car</a>
              
          </li>
        <li class="nav-item text-black">
        <a class="nav-link " href="#">About</a>
              
          </li>
          <li class="nav-item text-black">
          <a class="nav-link" href="#">Services</a>
              
          </li>
          <li class="nav-item text-black">
          <a class="nav-link" href="#">Contact</a>
             
          </li>
          <li class="nav-item text-black">
          <a class="nav-link" href="{{ url('/home') }}">Home</a>
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
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="/images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">{{ Auth::user()->name }} </p>
              </div>
            </a>
                       
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <!-- <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached mr-2 text-success"></i>
                Activity Log
              </a> -->
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
          
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    