@extends('layouts.app')

@section('content')
    <div class='container card mb-2' style="background-color:#F2CF1D;border:1px solid;border-radius:12px">
        <div class='card-body text-left'>
            <a href="{{$item->id}}/edit"><div class='card-title d-inline' style="color:#18298C;font-size:27px">{{$item->title}}</div></a><h6 class='badge badge-pill d-inline float-right' style="background-color:#04BF8A;color:#18298C;">{{$item->id}}</h6>
            <div class="d-block">
                <p class='card-text d-inline' style="color:#18298C;font-size:20px">{{$item->description}}</p>
            </div>
            <div class='my-2'><p class="d-inline lead" style="color:#18298C">Parent ID : <span class="badge px-2 py-1"style="background-color:#04BF8A;color: #18298C;" id='parent_id'>{{$item->parent_id}}</span></p><p class="d-inline float-right" style="color: #18298C;font-size:16px">{{$item->created_at->format('d M y')}}</p></div>
            <hr>
            <ul class="list-unstyled" id='sub_listing'></ul>
            <div class="container-fluid card border-0" style="background-color:#F2CF1D;" id="sub-cont">
                <a class="btn w-25 mx-auto" style="background-color:#04BF8A;color:#18298C;border: 1px solid #18298C" id="add-item">Add Item</a>
            </div>
        </div>
    </div>
<script>
    var counter  = 0;
    $("#add-item").on('click', function(){
        counter++;
        $("#sub-cont").append('<input type="text" id="text'+counter+'"><a class="btn w-25 mx-auto my-2" style="border: 1px solid #18298C;font-size:12px;color:#18298C;background-color:#04BF8A" id="submit_sub'+counter+'" onclick="add_sub('+counter+')">Submit Log</a>');
        $(this).hide();
    });

    function add_sub(data){
        $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

        });

        var parent = $("#parent_id").text();
        var text = $("#text"+data).val();
            $("#sub_listing").append('<li id="sub_id'+data+'"><div class="container" style="color:#18298C;"><h6 class="my-3 mx-2">'+text+'</h6><a class="btn d-block" style="border: 1px solid #18298C;font-size:12px;color:#18298C;background-color:#04BF8A" onclick="remove_sub('+data+')">Remove</a></div><hr></li>');
            $("#text"+data).hide();
            $("#submit_sub"+data).hide();
            $("#add-item").show();

        $.ajax({
            url : '/storesub',
            type : 'POST',
            data : {
                'text' : text,
                'parent_id' : parent
            },
            success:function(response){
                alert('success');
            }
        });
    }

    function remove_sub(data){
        $.ajaxSetup({

          headers: {

              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

        });
        var parent = $("#parent_id").text();
//No Reliable ID to get the data - can use text but how good is it ?
        $("#sub_id"+data).remove();

    }
</script>
@endsection