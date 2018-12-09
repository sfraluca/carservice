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
            <a class="nav-link" href="{{ route('dashboard') }}">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
              <span class="menu-title">Admin</span>
            </a>
            <div class="collapse" id="general-pages">
              <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_admins') }}">Admins list</a></li>
                @can('create-admin')
                <li class="nav-item"> <a class="nav-link" href="{{ route('create_admin') }}">Add admin</a></li>
                @endcan
              </ul>
              </div>
          </li>
          
          
          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
              <span class="menu-title">Users</span>
            </a>
            <div class="collapse" id="user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_users') }}">Users list</a></li>
                @can('create-user')
                <li class="nav-item"> <a class="nav-link" href="{{ route('create_user') }}">Add User</a></li>
                @endcan
              </ul>
            </div>
          </li>
          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#car" aria-expanded="false" aria-controls="car">
              <span class="menu-title">Cars</span>
            </a>
            <div class="collapse" id="car">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_cars') }}">Cars list</a></li>
                <li class="nav-item">
                  @can('create-car')
                  <a class="nav-link" href="{{ route('create_car') }}">Add car</a>
                  @endcan
                 </li>
              </ul>
            </div>
          </li>

          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#service" aria-expanded="false" aria-controls="service">
              <span class="menu-title">Service</span>
            </a>
            <div class="collapse" id="service">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_car_service') }}">Service list</a></li>
                @can('create-car-service')
                <li class="nav-item"> <a class="nav-link" href="{{ route('create_car_service') }}">Add service</a></li>
                @endcan
              </ul>
            </div>
          </li>
          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
              <span class="menu-title">Category</span>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_category') }}">Category list</a></li>
                @can('create-category')
                <li class="nav-item"> <a class="nav-link" href="{{ route('create_category') }}">Add category</a></li>
                @endcan
              </ul>
            </div>
          </li>
          <li class="nav-item" id="admin">
            <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
              <span class="menu-title">Product</span>
            </a>
            <div class="collapse" id="product">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('list_all_products') }}">Product list</a></li>
                @can('create-product')
                <li class="nav-item"> <a class="nav-link" href="{{ route('create_product') }}">Add product</a></li>
                @endcan
              </ul>
            </div>
          </li>

          
         
        </ul>
      </nav>
      