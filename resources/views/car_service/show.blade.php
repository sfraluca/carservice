@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
              
        
                <div>
                {{ $services->title }}
                </div>
                </div>
                {{ $services->price }}
                {{ $services->description }}
                {{ $services->service_date }}
                <form method="POST" class="delete_form" action ="{{ route('delete_service', $services->id)}}">
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