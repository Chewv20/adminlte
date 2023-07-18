@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Modifica juegos</h1>
@stop

@section('content')

<form action="{{ route('updateVideogame') }}" method="POST">

    @csrf

    <div class="row">
        <x-adminlte-input name="name_game" label="Nombre" placeholder="Nombre del juego" fgroup-class="col-md-6" value="{{ $game->name }}"/>
    </div> 

    <input type="hidden" name="game_id" value="{{ $game->id }}">

    <div class="row">
        <x-adminlte-select2 name="categoria_id" label="Categoria" data-placeholder="Seleccione" fgroup-class="col-md-6" >
            <x-slot name="prependSlot">
            </x-slot>
            @foreach ($categorias as $item)
                <option value="{{ $item -> id }}" @if ($item->id==$game->category_id) selected @endif>{{ $item -> name }}</option>
            @endforeach
        </x-adminlte-select2>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <x-adminlte-button type="submit" label="Enviar" theme="primary" icon="fas fa-save"/>
        </div>
    </div>

</form>

@stop
