<div class="container">
    <h2>Lista de jornales</h2>


    <table class="table text-center">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Dia</th>
            <th scope="col">Hora de entrada</th>
            <th scope="col">Hora de salida</th>
            <th scope="col">Pagado</th>
            <th scope="col">Precio por hora</th>
        </tr>
        </thead>
        <tbody>  
                @foreach($jornadas->where('id_user', $u->id) as $jornada)
                    <tr>
                        <td>{{$jornada->dia}}</td>
                        <td>{{$jornada->inicio_jornada}}</td>
                        <td>{{$jornada->fin_jornada}}</td>
                        @if ($jornada->pagado == 1)
                            <td>Si</td>
                        @else
                            <td>No</td>
                        @endif
                        <td>{{$jornada->precio_hora}}</td>
                    </tr>
                @endforeach
        
        </tbody>
    </table>

</div>