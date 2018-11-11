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
                <form method="POST" class="delete_form" action ="{{ route('delete_product', $product->id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE"/>
                <button type='submit'> Delete</button>
                </form>
                <form action ="{{ route('show_product', $product->id)}}">
                <input type="hidden"/>
                <button type='submit'> Show  </button>
                </form>
                <form action ="{{ route('edit_product', $product->id)}}">
                <input type="hidden"/>
                <button type='submit'> Edit </button>
                </form>
                <br>
@endforeach
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection