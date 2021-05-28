@extends("front.layouts.header")
@section('title')
    Home Page
@stop
@section('content')
    
@endsection
@extends('front.layouts.navbar')
@include('front.layouts.footer')
<script>
    $.ajax({
        type : 'post',
        url  : "{{route('getavatar')}}",
        data : {
            "_token": "{{csrf_token()}}",
            'id' : "{{Session('Useremail')}}",
        },
        success:function(one , two , three){
            console.log(one);
            $('#avatar').append(one);
        },
        error:function(one  , three){
            console.log(one);
        }
    });
</script>


