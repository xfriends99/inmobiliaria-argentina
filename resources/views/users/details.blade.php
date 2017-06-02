@extends('layouts.app')

@section('page-title', 'Club inmueble')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{$user->name.' '.$user->last_name}}
            <small>{{strftime("%d/%b/%Y",strtotime($user->created_at)) }}</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">Inicio</a></li>
                    <li class="active">Detalle usuario</li>
                </ol>
            </div>

        </h1>
    </div>
</div>

@include('partials.messages')


   <div class="row" style="padding-left:15px;">
       <table class="table" style="width: 50% !important;">
           <tr>
               <th>Correo:</th>
               <td>{{ $user->email}}</td>
           </tr>
           <tr>
               <th>Telefono:</th>
               <td>{{ $user->phone}}</td>
           </tr>
           <tr>
               <th>Rol:</th>
               <td>{{ ucwords($user->role)}}</td>
           </tr>
       </table>
   </div><br><br><br>

    <div class="col-md-12">
        <a href="{{route('user.index')}}"><button type="button" class="btn btn-primary">
            <i class="fa fa-arrow-left "></i>
            Regresar
        </button></a>
    </div>
    
@stop