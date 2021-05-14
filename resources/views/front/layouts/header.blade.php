<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title' , __('header.title'))</title>
    <link href="{{asset('css/front/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/front/front.css')}}" rel="stylesheet">
</head>

@if (App::getLocale() == 'en')
    <body style="direction:ltr">
@else
    <body style="direction:rtl">
@endif

