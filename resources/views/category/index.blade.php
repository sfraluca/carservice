@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                All categories
                </div>
@foreach ($categories as $category)
{{ $category->title }}
<form method="POST" class="delete_form" action ="{{ route('delete_category', $category->id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE"/>
                <button type='submit'> Delete</button>
                </form>
<br>
@endforeach

                  </div>
            </div>
        </div>
    </div>
</div>
@endsection