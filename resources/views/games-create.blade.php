@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crea juegos</h1>
@stop

@section('content')

<form action="">

    <div class="row">
        <x-adminlte-input name="name_game" label="Nombre" placeholder="Nombre del juego" fgroup-class="col-md-6"/>
    </div> 

    <div class="row">
        <x-adminlte-select2 name="categoria" label="Categoria" data-placeholder="Seleccione" fgroup-class="col-md-6">
            <x-slot name="prependSlot">
            </x-slot>
            <option value="deportes">Deportes</option>
            <option value="accion">Accion</option>
            <!--<option>Teatro</option>
            <option>Standup Comedy</option>
            <option>Festival</option>
            <option>Museo</option>-->
        </x-adminlte-select2>
    </div>

    <div class="row">
        <div class="form-group col-md-6">
            <x-adminlte-button type="submit" label="Enviar" theme="primary" icon="fas fa-save"/>
        </div>
    </div>

</form>

@stop
