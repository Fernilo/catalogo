@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    @yield('contenido_header')
@endsection

@section('content')
    <main>
        @yield('contenido')
    </main>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
