@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <h1>{{ $admin->name }}</h1>
                </div>
                {{ $admin->email }}
                  </div>
                  </div>
                {{ $admin->job_title }}
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
