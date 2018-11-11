@extends('layouts.app')

@section('content')

    <ul class="nav nav-tabs">


  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admins</a>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ route('list_all_admins') }}">See all admins</a>
    <a class="dropdown-item" href="{{ route('create_admin') }}">Create admin</a>
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Cars</a>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ route('list_all_cars') }}">See all cars</a>
      <a class="dropdown-item" href="{{ route('list_all_cars') }}">Create cars</a>
     
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Services</a>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ route('list_all_car_service') }}">See all services</a>
      <a class="dropdown-item" href="{{ route('create_car_service') }}">Create service</a>
    
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Category</a>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ route('list_all_category') }}">See all category</a>
      <a class="dropdown-item" href="{{ route('create_category') }}">Create category</a>
     
    </div>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Product</a>
    <div class="dropdown-menu">
    <a class="dropdown-item" href="{{ route('list_all_products') }}">See all products</a>
      <a class="dropdown-item" href="{{ route('list_all_products') }}">Create products</a>
     
    </div>
  </li>
  
</ul>

 
@endsection
