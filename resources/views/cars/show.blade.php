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
                <form method="POST" class="delete_form" action ="{{ route('delete_car', $car->id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE"/>
                <button type='submit'> Delete</button>
                </form>

                  </div>
            </div>
        </div>
    </div>
</div>
@endsection