@extends('layouts.app')


@section('content')
        @foreach($logs as $item)
        <div class='container card mb-2' style="background-color:#F2CF1D;border:1px solid;border-radius:12px">
        <a class='btn' href='/devlogs/{{$item->id}}'>
        <div class='card-body text-left'>
            <div class='card-title d-inline' style="color:#18298C;font-size:27px">{{$item->title}}</div><h6 class='badge badge-pill d-inline float-right' style="background-color:#04BF8A;color:#18298C;">{{$item->id}}</h6>
            <div class="d-block">
                <p class='card-text d-inline' style="color:#18298C;font-size:20px">{{$item->description}}</p>
            </div>
            <div class='my-2'><p class="d-inline lead" style="color:#18298C">Contributer(s) : <span class="badge px-2 py-1"style="background-color:#04BF8A;color: #18298C;">Developer</span></p><p class="d-inline float-right" style="color: #18298C;font-size:16px">{{$item->created_at->format('d M y')}}</p></div>
        </div>
        </a>
    </div>
        @endforeach

@endsection