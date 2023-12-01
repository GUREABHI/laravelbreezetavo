@extends('pagPlantilla')

@section('titulo')
      <h1>Pagina Lista</h1>
@endsection

@section('seccion')
      <h3>Lista</h3>
      <table class="table table-dark table-striped-columns">
            <thead class="table-primary">
                  <tr>
                        <th scope="col">Id</th>
                        <th scope="col">codigo</th>
                        <th scope="col">Apellidos y Nombres</th>
                        <th scope="col">Handle</th>
                  </tr>
            </thead>
            <tbody>
                  @Foreach($xAlumnos as $item)
                  <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->codEst }}</td>
                        <td>
                              <a href="{{ route('Estudiante.xDetalle', $item->id) }}">      
                                    {{ $item->apeEst }}, {{ $item->nomEst }}</td>
                              </a>
                        <td>@mdo</td>
                  </tr>
                  @endforeach
            </tbody>
      </table>
      
@endsection
