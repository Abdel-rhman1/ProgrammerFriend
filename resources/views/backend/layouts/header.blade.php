<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="" rel="stylesheet">
    <link href="{{asset('css/backend/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/backend/backend.css')}}" rel="stylesheet">
    <title>Laravel 7 Progress Bar File Upload Using Tutorial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
     
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
 
    <style>
        .progress {
    position: relative;
    width: 100%;
    height: 39px;
    padding-top: 18px;
}
        .bar { background-color: #b5076f; width:0%; height:20px; }
        .percent { position:absolute; display:inline-block; left:50%; color: #040608;}
   </style>
    <title>@yield('title' , 'dashboard')</title>
</head>
@if (App::getLocale() == 'en')
    <body style="direction:ltr">
@else
    <body style="direction:rtl">
@endif
