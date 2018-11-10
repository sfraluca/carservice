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
<br>
@endforeach

                  </div>
            </div>
        </div>
    </div>
</div>
@endsection