@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @livewireStyles
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.6.0/dist/alpine.js" defer></script>
@stop

@section('content')

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>


    @stack('modals')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@stop

@section('js')

    @livewireScripts
@stop
