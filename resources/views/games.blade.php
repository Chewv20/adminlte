

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Vista creada en blade y llamada desde el controlador</h1>
    <h2>Listado de juegos</h2>
@stop

@section('content')

@php
$config['language']= "es";
@endphp



<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table1" :config="$config" :heads="$heads" head-theme='dark' with-buttons scrollable hoverable with-footer beautify bordered footer-theme='dark'>
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

{{-- @section('js')
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
        $('#table1').DataTable({
			language: {
            url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json',
        }
		});
    </script> --}}

@stop
