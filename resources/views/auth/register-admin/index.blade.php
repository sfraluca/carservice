@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
               All admins
                </div>
@foreach ($admins as $admin)
<div>{{ $admin->name }}</div>
               
<div>  {{ $admin->email }}</div>
                  
<div>    {{ $admin->job_title }}</div>
@endforeach
                

                  </div>
            </div>
        </div>
    </div>
</div>
@endsection