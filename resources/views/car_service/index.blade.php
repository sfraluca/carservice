@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                All services
                </div>
@foreach ($services as $service)
{{ $service->title }}
                
                {{ $service->price }}
                {{ $service->description }}
                {{ $service->service_date }}
                <br>
@endforeach

                  </div>
            </div>
        </div>
    </div>
</div>
@endsection