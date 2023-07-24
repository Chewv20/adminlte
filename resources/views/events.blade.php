@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Eventos</h1>
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <x-adminlte-datatable id="table2" :heads="$heads" striped head-theme='dark' with-buttons scrollable>
        @foreach($events as $event)
            <tr>
                <td>{{$event->id}} </td>
                <td>{{$event->name}} </td>
                <td>{{$event->description}} </td>
                <td>{{$event->status}} </td>
                <td>{{$event->type}} </td>
                <td>{{$event->date}} </td>
                <!--<td>
                    <a href="" class="btn btn-warning"><i class="fa fa-edit"></i>Editar
                    </a>

                    <form action="" method="post" class="d-inline">
                        <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> Eliminar</button>
                    </form>
                </td>-->
            </tr>
        @endforeach
        </x-adminlte-datatable>
    </div>
</div>


@stop

