@extends('home')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8">
            <h2>Editando el jornal de 
            @foreach($users as $user)
                @if($user->id == $jornal->id_user)
                    {{ $user->name }} {{ $user->apellido1 }}
                @endif
            @endforeach
        </h2>
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
            <label>Dia</label>
            <input type="date" name="dia" value="{{$jornal->dia}}" class="form-control" >
        </div>
        <div class="form-group col-md-4">
            <label>Precio por Hora</label>
            <input type="number" min="0" step="0.01" name="precio_hora" value="{{$jornal->precio_hora}}" class="form-control">
        </div>
        
    </div>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label>Inicio de la Jornada</label>
            <input type="time" name="inicio_jornada" value="{{$jornal->inicio_jornada}}" class="form-control">
        </div>
        <div class="form-group col-md-4">
            <label>Fin de la Jornada</label>
            <input type="time" name="fin_jornada" value="{{$jornal->fin_jornada}}" class="form-control">
        </div>
        <div class="form-row">
            <label for="pagado">Pagado: </label>
        @if ($jornal->pagado == 0)
        <input type="radio" name="pagado" id="pagado" value="1">Si<br>
        <input type="radio" name="pagado" id="pagado" value="0" checked>No<br>
        @else
        <input type="radio" name="pagado" id="pagado" value="1" checked>Si<br>
        <input type="radio" name="pagado" id="pagado" value="0" >No<br>
        @endif
        
        </div>

        <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary">Registrar Jornalero</button>
            <button type="button" onclick="history.back()" class="btn btn-danger">cancelar</button>
        </div>
        
    </div>
    

</form>
        
</div>
@endsection