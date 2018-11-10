@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                {{ $category->title }}
                </div>
                <form method="POST" class="delete_form" action ="{{ route('delete_category', $category->id)}}">
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