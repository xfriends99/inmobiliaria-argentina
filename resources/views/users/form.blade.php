@extends('layouts.app')

@if($edit)
    @section('page-title', 'Club inmueble')
@else
    @section('page-title', 'Club inmueble')
@endif

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                {{ $edit ? 'Editar usuario' : 'Crear nuevo usuario' }}
                <small>Detalle de usuario</small>
                <div class="pull-right">
                    <ol class="breadcrumb">
                        <li><a href="{{ route('dashboard') }}">Inicio</a></li>
                        <li><a href="{{ route('user.index') }}">Usuarios</a></li>
                        <li class="active">{{ $edit ? 'Editar' : 'Crear' }}</li>
                    </ol>
                </div>
            </h1>
        </div>
    </div>

    @include('partials.messages')

    @if($edit)
        {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'files' => true, 'id' => 'candidate-form']) !!}
        <div class="row">
            <div class="col-md-8">
                @include('users.partials.details')
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('user.index')}}" class="btn btn-primary">
                    <i class="fa fa-arrow-left "></i>
                    Regresar
                </a>
                <button type="submit" class="btn btn-primary" id="update-details-btn">
                    <i class="fa fa-refresh"></i>
                    Editar
                </button>
            </div>
        </div>
        {!! Form::close() !!}

    @else
        {!! Form::open(['route' => 'user.store', 'files' => true, 'id' => 'candidate-form']) !!}
        <div class="row">
            <div class="col-md-8">
                @include('users.partials.details')
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <a href="{{route('user.index')}}" class="btn btn-primary">
                    <i class="fa fa-arrow-left "></i>
                    Regresar
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    Guardar
                </button>
            </div>
        </div>
        {!! Form::close() !!}
    @endif

@stop

@section('scripts')

@stop
