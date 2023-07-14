@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Muestra juego</h1>
@stop

@section('content')
@if ($category)
    <h5>Bienvenido a la pagina del juego: {{ $name }} pertenece a la categoria {{ $category }}</h5>
@else
        <h5>Bienvenido a la pagina del juego: {{ $name }}
@endif

@stop
