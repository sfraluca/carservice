@extends('layouts.app')

@section('content')
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="menu">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/home') }}">ANPR Service Auto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
       
            
            @if (Route::has('login'))
                    @auth
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Home<span class="sr-only">(current)</span></a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/mycar') }}">My car</a>
                      
                    </li>
                    
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endauth
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/services') }}">Services</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                    </li>
                </div>
            @endif
          </ul>
        </div>
      </div>
    </nav>
    <br>
    <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Recognize plate number by image</h4>
                  <div class="table-responsive">
                   <!-- Button trigger modal -->
        <button type="button" class="btn btn-block btn-lg btn-gradient-primary mt-4" data-toggle="modal" data-target="#exampleModal">
        See info
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('store_image') }}" enctype="multipart/form-data">
                                @csrf
            <div class="modal-body">
                Description.... 
                <div class="form-group">
                    <input id="image" 
                          name="image" 
                          type="file" 
                          data-browse-on-zone-click="true">
                
                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" value="Upload" name="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
            </div>
        </div>
        </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      
@endsection
