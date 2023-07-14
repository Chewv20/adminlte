@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Vista creada en blade y llamada desde el controlador</h1>
    <h2>Listado de juegos</h2>
@stop

@section('content')

@foreach ($games as $item)
    <li>{{ $item }}</li>
@endforeach

@stop
