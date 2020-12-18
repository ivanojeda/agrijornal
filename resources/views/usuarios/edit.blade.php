@extends('home')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-6">
        <h2>Editar usuario: {{ $user->name }}</h2>
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


<form action="{{ route('usuarios.update', $user->id)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Nombre</label>
            <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group col-md-4">
            <label>Primer Apellido</label>
            <input type="text" name="apellido1" value="{{$user->apellido1}}" class="form-control" placeholder="Primer Apellido">
        </div>
        <div class="form-group col-md-4">
            <label>Segundo Apellido</label>
            <input type="text" name="apellido2" value="{{$user->apellido2}}" class="form-control" placeholder="Segundo Apellido">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Telefono</label>
            <input type="text" name="telefono" value="{{$user->telefono}}" class="form-control" placeholder="Teledono">
        </div>
        <div class="form-group col-md-4">
            <label>NIF</label>
            <input type="text" name="nif" value="{{$user->nif}}" class="form-control" placeholder="NIF">
        </div>
        <div class="form-group col-md-4">
            <label>Email</label>
            <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Email">
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
                <button type="reset" onclick="history.back()" class="btn btn-danger">cancelar</button>
            </div>
        </div>
            </form>
        
</div>

@endsection