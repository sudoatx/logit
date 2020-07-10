@extends('layouts.app')


@section('content')
    <div class="container card" style="background-color: #f2cf1d00;border:0">
        <div class="container my-3 mx-3">
            <h1 style="color:#f2cf1d">Create A New Log</h1>
            {!! Form::open(['action' => ['LogHandleController@update',$log->id], 'method' => 'PUT','class' => 'container-fluid py-4', 'style' => 'background-color:#f2cf1d00']) !!}
            {!! Form::text('title', $log->title, ['class' => 'form-control form-group'] )!!}
            {!! Form::textarea('description', $log->description, ['class' => 'form-control form-group'] )!!}
            {!! Form::number('parent_id', $log->parent_id, ['class' => 'form-control form-group', 'id' => 'sub_id'] )!!}
            {!! Form::submit('Submit',['class' => 'btn float-right', 'style' => 'background-color:#f2cf1d;color:#18298b']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection