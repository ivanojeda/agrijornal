@extends('home')

@section('content')
<?php $u = App\User::find( auth()->user()->id );
$us =  $u->roles()->first()->name;?>
@if($us != 'agricultor')
<?php header("Location: /");
die(); ?>
@else

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h2>Crear un nuevo jornalero</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </div>


<form action="/usuarios" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group col-md-4">
            <label>Primer Apellido</label>
            <input type="text" name="apellido1" class="form-control" placeholder="Primer Apellido">
        </div>
        <div class="form-group col-md-4">
            <label>Segundo Apellido</label>
            <input type="text" name="apellido2" class="form-control" placeholder="Segundo Apellido">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Telefono</label>
            <input type="text" name="telefono" class="form-control" placeholder="Teledono">
        </div>
        <div class="form-group col-md-4">
            <label>NIF</label>
            <input type="text" name="nif" class="form-control" placeholder="NIF">
        </div>
        <div class="form-group col-md-4">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
    </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" placeholder="Contraseña">
            </div>
            <div class="form-group col-md-6">
                <label>confirmar contraseña</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme Contraseña">
            </div>

            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-primary">Registrar Jornalero</button>
                <button type="reset" class="btn btn-danger">cancelar</button>
            </div>
        </div>
            </form>
        
</div>

@endif

@endsection