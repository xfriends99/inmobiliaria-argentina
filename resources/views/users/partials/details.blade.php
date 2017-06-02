<div class="panel panel-default">
    <div class="panel-heading">Detalle de usuario</div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">Nombre</label>
                        {!! Form::text('name', $edit ? $user->first_name: '', ['id' => 'fname', 'class' => 'form-control','placeholder' => 'Nombre']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        {!! Form::text('last_name', $edit ? $user->last_name: '', ['id' => 'last_name', 'class' => 'form-control','placeholder' => 'Apellido']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        {!! Form::text('email', $edit ? $user->email: '', ['id' => 'email', 'class' => 'form-control','placeholder' => 'Correo electrónico']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Teléfono</label>
                        {!! Form::text('phone', $edit ? $user->phone: '', ['id' => 'phone', 'class' => 'form-control','placeholder' => 'Teléfono']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Contraseña</label>
                        {!! Form::input('password', 'password', '', ['id' => 'email', 'class' => 'form-control','placeholder' => 'Contraseña']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="code">Repite la contraseña</label>
                        {!! Form::input('password', 'confirm_password', '', ['id' => 'phone', 'class' => 'form-control','placeholder' => 'Repite la contraseña']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="profile">Rol</label>
                        {!! Form::select('role', ['admin' => 'Administrador' ,'user' => 'Usuario'],$edit ? $user->role: null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">

                </div>
            </div>
        </div>
    </div>
</div>