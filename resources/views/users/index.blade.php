@extends('layouts.app')

@section('page-title', 'Club inmueble')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Usuarios registrados
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="active">Usuarios</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

<div class="row tab-search">
    <div class="col-md-9">
        <a href="{{ route('user.create') }}" class="btn btn-success" id="add-user">
            <i class="glyphicon glyphicon-plus"></i>
            Nuevo usuario
        </a>
    </div>
    <form method="GET" action="" accept-charset="UTF-8" id="messages-form">

        <div class="col-md-3">
            <div class="input-group custom-search-form">
                <input type="text" class="form-control" name="search" value="" placeholder="Buscar usuarios">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" id="search-messages-btn">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                    @if (isset($request->search) && $request->search != '')
                        <a href="{{ route('user.index') }}" class="btn btn-danger" type="button" >
                            <span class="glyphicon glyphicon-remove"></span>
                        </a>

                    @endif
                </span>
            </div>
        </div>
    </form>
</div>

<div class="table-responsive top-border-table" id="users-table-wrapper">
    <div class="col-md-12">
        <table class="table">
            <thead>
            <th>#</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Télefono</th>
            <th>Rol</th>
            <th>Fecha de creación</th>
            <th>Acciones</th>
            </thead>
            <tbody>
            @if (count($users))
                <?php $i = 0; ?>
                @foreach ($users as $message)
                    <?php $i++; ?>
                    <tr style="cursor:pointer">
                        <td>{{ $i }}</td>
                        <td>{{ $message->name.' '.$message->last_name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->phone }}</td>
                        <td>
                            @if($message->role=='admin')
                                {{'Admininstrador'}}
                            @else
                                {{'Usuario'}}
                            @endif
                        </td>
                        <td>{{strftime("%d/%b/%Y",strtotime($message->created_at)) }}</td>
                        <td>
                            <a href="{{ route('user.show', $message->id) }}" class="btn btn-success btn-circle"
                               title="Ver detalle" data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-eye-open"></i>
                            </a>
                            <a href="{{ route('user.edit', $message->id) }}" class="btn btn-primary btn-circle edit" title="Editar usuario"
                               data-toggle="tooltip" data-placement="top">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>
                            <a href="{{ route('user.delete', $message->id) }}" class="btn btn-danger btn-circle" title="Borrar usuario"
                               data-toggle="tooltip"
                               data-placement="top"
                               data-method="DELETE"
                               data-confirm-title="Por favor confirme"
                               data-confirm-text="Estas seguro de borrar al usuario?"
                               data-confirm-delete="Confirmar">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6"><em>No hay registros</em></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>

@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            $("#messages-form").submit();
        });
    
        function details_message(){
            alert('Para mostrar detalle mensajes');
        }
        
    </script>

@stop
