<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="logo" href="/build/assets/logo.PNG" />
    <link href="{{asset('/css/normalize.css')}}" rel="stylesheet" type="text/css"/> 
    <link href="{{asset('/css/login.css')}}" rel="stylesheet" type="text/css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="{{asset('https://fonts.googleapis.com/css2?family=Passion+One&family=Poppins&display=swap')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

</head>
<body>
@include('layouts.header')

@yield('content')

@include('layouts.footer')

</body>
</html>
