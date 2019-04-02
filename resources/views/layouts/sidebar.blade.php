<nav class="sidebar sidebar-offcanvas" id="sidebar-menu">
        <ul class="nav">
          <li class="nav-item nav-profile" id="admin">
            <a href="#" class="nav-link">
              
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">{{ Auth::user()->name }} </span>
                <span class="font-weight-bold text-center text-small">{{ Auth::user()->job_title }}</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item" id="admin">
            <a class="nav-link" href="{{ route('dashboard',app()->getLocale()) }}">
              <span class="menu-title">@lang('header.dashboard')</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-title">@lang('header.admin')</span>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_admins',app()->getLocale()) }}">@lang('header.list_all_admins')</a></li>
                @can('create-admin')
                <li class="nav-item"> <a class="nav-link" href="{{ route('create_admin',app()->getLocale()) }}">@lang('header.create_admin')</a></li>
                @endcan
              </ul>
              </div>
          </li>
          
          
          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
              <span class="menu-title">@lang('header.users')</span>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_users',app()->getLocale()) }}">@lang('header.list_all_users')</a></li>
                @can('create-user')
                <li class="nav-item"> <a class="nav-link" href="{{ route('create_user',app()->getLocale()) }}">@lang('header.create_user')</a></li>
                @endcan
              </ul>
            </div>
          </li>
          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#car" aria-expanded="false" aria-controls="car">
              <span class="menu-title">@lang('header.cars')</span>
            </a>
            <div class="collapse" id="car">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_cars',app()->getLocale()) }}">@lang('header.list_all_cars')</a></li>
                <li class="nav-item">
                  @can('create-car')
                  <a class="nav-link" href="{{ route('create_car',app()->getLocale()) }}">@lang('header.create_car')</a>
                  @endcan
                 </li>
              </ul>
            </div>
          </li>

          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#service" aria-expanded="false" aria-controls="service">
              <span class="menu-title">@lang('header.servicesidebar')</span>
            </a>
            <div class="collapse" id="service">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_car_service',app()->getLocale()) }}">@lang('header.list_all_car_service')</a></li>
                @can('create-car-service')
                <li class="nav-item"> <a class="nav-link" href="{{ route('create_car_service',app()->getLocale()) }}">@lang('header.create_car_service')</a></li>
                @endcan
              </ul>
            </div>
          </li>
          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
              <span class="menu-title">@lang('header.category')</span>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_category',app()->getLocale()) }}">@lang('header.list_all_category')</a></li>
                @can('create-category')
                <li class="nav-item"> <a class="nav-link" href="{{ route('create_category',app()->getLocale()) }}">@lang('header.create_category')</a></li>
                @endcan
              </ul>
            </div>
          </li>
          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
              <span class="menu-title">@lang('header.product')</span>
            </a>
            <div class="collapse" id="product">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_products',app()->getLocale()) }}">@lang('header.list_all_products')</a></li>
                @can('create-product')
                <li class="nav-item"> <a class="nav-link" href="{{ route('create_product',app()->getLocale()) }}">@lang('header.create_product')</a></li>
                @endcan
              </ul>
            </div>
          </li>

          
         
        </ul>
      </nav>
      