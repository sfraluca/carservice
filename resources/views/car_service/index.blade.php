@extends('layouts.app')

@section('content')
@include('layouts.navbar')
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
                <form method="POST" class="delete_form" action ="{{ route('delete_service', $service->id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE"/>
                <button type='submit'> Delete</button>
                </form>
                <form action ="{{ route('show_car_service', $service->id)}}">
                <input type="hidden"/>
                <button type='submit'> Show  </button>
                </form>
                <form action ="{{ route('edit_service', $service->id)}}">
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