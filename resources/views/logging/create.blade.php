@extends('layouts.app')

@section('content')
<div class="container card" style="background-color: #f2cf1d00;border:0">
    <div class="container my-3 mx-3">
        <h1 style="color:#f2cf1d">Create A New Log</h1>
        {!! Form::open(['action' => 'LogHandleController@store', 'method' => 'POST','class' => 'container-fluid py-4', 'style' => 'background-color:#f2cf1d00']) !!}
        {!! Form::text('title', '', ['class' => 'form-control form-group'] )!!}
        {!! Form::textarea('description', '', ['class' => 'form-control form-group'] )!!}
        {!! Form::number('parent_id', '', ['class' => 'form-control form-group', 'id' => 'sub_id'] )!!}
        <a class="btn" style="background-color:#f2cf1d;color:#18298b" onclick="randomGen()">ID Generator</a>
        {!! Form::submit('Submit',['class' => 'btn float-right', 'style' => 'background-color:#f2cf1d;color:#18298b']) !!}
        {!! Form::close() !!}
    </div>
    <div class="container form-group">
    </div>

</div>
<script>
    function randomGen(){
        var random = Math.floor((Math.random() * 100000000000));
        $("#sub_id").val(random);
    }
    
</script>
  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type=number] {
      -moz-appearance: textfield;
    }
  </style>
@endsection