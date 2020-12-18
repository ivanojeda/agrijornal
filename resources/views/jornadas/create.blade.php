@extends('home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <h2>Crear un nuevo jornal</h2>
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


<form action="/jornadas" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="user">Jornalero</label>
            <select name="jornalero" class="form-control">
                <option selected disabled>Elige el jornalero</option>
                @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->nif }} - {{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-4">
            <label>Dia</label>
            <input type="date" name="dia" class="form-control" >
        </div>
        <div class="form-group col-md-4">
            <label>Precio por Hora</label>
            <input type="number" min="0" step="0.01" name="precio_hora" class="form-control">
        </div>
        
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Inicio de la Jornada</label>
            <input type="time" name="inicio_jornada" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Fin de la Jornada</label>
            <input type="time" name="fin_jornada" class="form-control">
        </div>

        <div class="form-row">
            <label for="pagado">Pagado: </label>
            <input type="radio" name="pagado" id="pagado" value="1">Si<br>
            <input type="radio" name="pagado" id="pagado" value="0" checked>No<br>
        </div>

        <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary">Registrar Jornalero</button>
            <button type="reset" class="btn btn-danger">cancelar</button>
        </div>
        
    </div>
    

</form>
        
</div>
@endsection