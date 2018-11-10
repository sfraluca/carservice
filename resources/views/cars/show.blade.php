@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                {{ $car->plate_number }}
                </div>
                {{ $car->brand }}
                {{ $car->model }}
                {{ $car->year }}
                {{ $car->color }}
                {{ $car->KW }}
                {{ $car->CP }}
                {{ $car->car_body }}
                {{ $car->motor }}
                

                  </div>
            </div>
        </div>
    </div>
</div>
@endsection