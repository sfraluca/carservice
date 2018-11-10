@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                All products
                </div>
@foreach ($products as $product)
{{ $product->description }}

                {{ $product->price }}
                <br>
@endforeach
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection