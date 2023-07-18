@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Vista creada en blade y llamada desde el controlador</h1>
    <h2>Listado de juegos</h2>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :heads="$heads" striped head-theme='dark' with-buttons with-footer>
            @forelse ($videogame as $item)
                <tr>
                        <th>{{ $item -> id }}</th>
                        <th>{{ $item -> name }}</th>
                        <th>{{ $item -> category_id }}</th>
                        <th>{{ $item -> created_at }}</th>
                        <th>{{ $item -> active }}</th>
                        <th>
                            <a href="{{ route('viewGame',$item->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Editar</a>
                            <a href="{{ route('deleteGame',$item->id) }}"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Eliminar</a>
                        </th>
                </tr>
            @empty
                <tr>Sin videojuegos</tr>
            @endforelse
        </x-adminlte-datatable>
    </div>
</div>

@stop
