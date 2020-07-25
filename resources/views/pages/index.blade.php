@extends('layouts.app')


@section('content')
    <div class="row">
        <div class='col-lg-6 d-flex align-items-lg-center' style="background-color:#2c2c2e;border:0px solid;border-radius:0px; min-height:91vh">
            <div class='card-body text-left m-4 pt-5 px-4'>
                <div class='card-title d-inline' style="color:#e5ba37;font-size:27px">Welcome to LogIt!</div>
                    <div class="d-block  py-3 pt-2">
                        <p class='card-text d-inline py-5' style="color:#f1f1f1;font-size:16px">This humble piece of software lets you log your progress in development and design of an entity.<br> This log is optimized for fast pace interaction and provides a dedicated database for your use. It lets you store your progress as logs to keep tabs.<br> LogIt is open source and is constantly being updated.</p>
                    </div>
                <div class='my-2'><p class="d-inline lead" style="color:#f1f1f1">Contributer(s) : <span class="badge px-2 py-1"style="background-color:#e5ba37;color: #212123;">@aptinstaller</span> <span class="badge px-2 py-1"style="background-color:#e5ba37;color: #212123;">@xatlee</span></p></div>
            </div>
        </div>
    </div>
@endsection