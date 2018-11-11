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

<form method="POST" class="delete_form" action ="{{ route('delete_admin', $admin->id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE"/>
                <button type='submit'> Delete</button>
                </form> 
                <form action ="{{ route('show_admin', $admin->id)}}">
                <input type="hidden"/>
                <button type='submit'> Show  </button>
                </form>

                 <form action ="{{ route('edit_admin', $admin->id)}}">
                <input type="hidden"/>
                <button type='submit'> Edit </button>
                </form>


@endforeach
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection