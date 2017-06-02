@extends('layouts.auth')

@section('page-title', 'Club inmueble')

@section('content')

<div class="form-wrap col-md-5 auth-form" id="login">
    <div style="text-align: center; margin-bottom: 25px;">
        <h1 class="page-header">
            <img src="{{ url('/assets/img/logo.png') }}" alt="club inmueble" style="width: 40%;margin-left: 0px;margin-top: -30px;"><br>
        </h1>
    </div>

    {{-- This will simply include partials/messages.blade.php view here --}}
    @include('partials/messages')

    <form role="form" action="{{route('login.admin')}}" method="POST" id="login-form" autocomplete="off">
        {{csrf_field()}}
        <div class="form-group input-icon">
            <label for="username" class="sr-only">Email</label>
            <i class="fa fa-user"></i>
            <input type="email" name="username" id="username" class="form-control" placeholder="Email">
        </div>
        <div class="form-group password-field input-icon">
            <label for="password" class="sr-only">Contraseña</label>
            <i class="fa fa-lock"></i>
            <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-group">
             <button type="submit" class="btn btn-custom btn-lg btn-block" id="btn-login">
                INGRESAR
            </button>
        </div>
       
    </form>

</div>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/as/login.js') }}"></script>
@stop