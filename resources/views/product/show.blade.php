@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"> 
                
                <h1>Category: {{ $products->category->title}}</h1>
Product
<div>
                {{ $products->description }}
                </div>
                </div>
                {{ $products->price }}
               

                  </div>
            </div>
        </div>
    </div>
</div>
@endsection