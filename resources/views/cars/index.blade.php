@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                All admins
                </div>
@foreach ($cars as $car)
{{ $car->plate_number }}
              
                {{ $car->brand }}
                {{ $car->model }}
                {{ $car->year }}
                {{ $car->color }}
                {{ $car->KW }}
                {{ $car->CP }}
                {{ $car->car_body }}
                {{ $car->motor }}
                <br>
@endforeach
                

                  </div>
            </div>
        </div>
    </div>
</div>
@endsection