<div class="container">
    <h2>Lista de jornales <a href="jornadas/create"><button type="button" class="btn btn-success float-right">Crear Jornal</button></a></h2>


    <table class="table text-center">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Dia</th>
            <th scope="col">Hora de entrada</th>
            <th scope="col">Hora de salida</th>
            <th scope="col">Pagado</th>
            <th scope="col">Precio por hora</th>
            <th scope="col">Opciones</th>

        </tr>
        </thead>
        <tbody>
           
            @foreach($users as $user)
                @foreach($jornadas->where('id_user', $user->id) as $jornada)
                    <tr>
                        <th scope="row">{{$user->name}} {{$user->apellido1}} {{$user->apellido2}}</th>
                        <td>{{$jornada->dia}}</td>
                        <td>{{$jornada->inicio_jornada}}</td>
                        <td>{{$jornada->fin_jornada}}</td>
                        @if ($jornada->pagado == 1)
                            <td>Si</td>
                        @else
                            <td>No</td>
                        @endif
                        <td>{{$jornada->precio_hora}}</td>
                        <td>
                            <form action="{{ route('jornadas.destroy',$jornada->id)}} " method="POST">          
                                <a href="{{route ('jornadas.edit', $jornada->id)}}"><button type="button" class="btn btn-primary btn-sm"><i class="far fa-edit"></i></button></a>
                                  @csrf 
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endforeach
        
        </tbody>
    </table>

</div>