@extends('layouts.app')

@section('page-title', trans('app.dashboard'))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Bienvenido <?= Auth::user()->name ?>!
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </div>

        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-widget panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-7">
                        <div class="title">Nuevos usuarios este mes</div>
                        <div class="text-huge">{{ $stats['new'] }}</div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-plus fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Ver todos los usuarios</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-widget panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-7">
                        <div class="title">Total de usuarios</div>
                        <div class="text-huge">{{ $stats['total'] }}</div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.index') }}">
                <div class="panel-footer">
                    <span class="pull-left">Ver detalle</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Historial de registro</div>
            <div class="panel-body">
                <div>
                    <canvas id="myChart" height="403"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Ultimos registros</div>
            <div class="panel-body">
                @if (count($latestRegistrations))
                    <div class="list-group">
                        @foreach ($latestRegistrations as $user)
                            <a href="{{ route('user.show', $user->id) }}" class="list-group-item">
                                <img class="img-circle" src="/assets/img/profile.png">
                                &nbsp; <strong>{{ $user->name }}</strong>
                                <span class="list-time text-muted small">
                                    <em>{{ $user->created_at->diffForHumans() }}</em>
                                </span>
                            </a>
                        @endforeach
                    </div>
                    <a href="{{ route('user.index') }}" class="btn btn-default btn-block">Ver todos los usuarios</a>
                @else
                    <p class="text-muted">No hay registros</p>
                @endif
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
    <script>
        var users = {!! json_encode(array_values($usersPerMonth)) !!};
        var months = {!! json_encode(array_keys($usersPerMonth)) !!};
        var trans = {
            chartLabel: "Historial de registro",
            new: "nuevo",
            new_plural: "Nuevos",
            user: "usuario",
            users: "usuarios"
        };
    </script>
    <script src="/assets/js/chart.min.js"></script>
    <script src="/assets/js/as/dashboard-admin.js"></script>
@stop