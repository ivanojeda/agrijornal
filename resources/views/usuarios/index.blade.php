@extends('home')

@section('content')
<div class="container">
    <h2>Lista de jornaleros <a href="usuarios/create"><button type="button" class="btn btn-success float-right">agregar usuario</button></a></h2>


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre completo</th>
            <th scope="col">NIF</th>
            <th scope="col">Dinero a deber</th>
            <th scope="col">Total de jornadas</th>
            <th scope="col">Opciones</th>

        </tr>
        </thead>
        <tbody>
            @foreach($user as $users)
            <tr>
                <th scope="row">{{$users->name}} {{$users->apellido1}} {{$users->apellido2}}</th>
                <td>{{$users->nif}}</td>
                <?php 
                $dinero_total=0;
                $jornada_total=0;
                
                foreach ($jornadas as $jornada){
                    if ($jornada->id_user == $users->id) {
                        if ($jornada->pagado == 0) {
                        $dinero_total += ( strtotime($jornada->fin_jornada)-strtotime($jornada->inicio_jornada) )/3600*$jornada->precio_hora;
                    }
                    $jornada_total += 1;
                    } 
                }
                ?>
                <td>{{$dinero_total}}</td>
                <td>{{$jornada_total}}</td>
                <td>
                    <form action="{{ route('usuarios.destroy',$users->id)}} " method="POST">
                    
          
                  <a href="{{route ('usuarios.edit', $users->id)}}"><button type="button" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button></a>
                    @csrf 
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                    </form></td>
    
            </tr>
            @endforeach
        
        </tbody>
    </table>

</div>
@endsection