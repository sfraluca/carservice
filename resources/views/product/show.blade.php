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
                <form method="POST" class="delete_form" action ="{{ route('delete_product', $products->id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE"/>
                <button type='submit'> Delete</button>
                </form>
                <form action ="{{ route('edit_product', $products->id)}}">
                <input type="hidden"/>
                <button type='submit'> Edit </button>
                </form>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection