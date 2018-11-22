@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="container-scroller">
<div class="container-fluid page-body-wrapper">
@include('layouts.sidebar')
<div class="main-panel">
<div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>                 
              </span>
              Dashboard
            </h3>
            <nav aria-label="breadcrumb">
              <ul class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                  <span></span>Overview
                  <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                </li>
              </ul>
            </nav>
        </div>
<div class="col-lg-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">   
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
               All admins
                </div>

                

                  </div>
            </div>
        </div>
    </div>
</div>

@endsection