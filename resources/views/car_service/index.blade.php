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
                <form method="POST" class="delete_form" action ="{{ route('delete_service', $service->id)}}">
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