@extends('pagPlantilla')

@section('titulo')
      <h1 class="display-4">Pagina Lista Seguimiento</h1>
@endsection

@section('seccion')
      @if(session('msj'))
            <div class="alert alert-seccess alert-dismissible fade show" role="alert">
                  {{ session('msj' )}}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="close"></button>
            </div>
      @endif
      <form action="{{ route('Seguimiento.xRegistrarSeg') }}"  method="post" class="d-grid gap-2">
            @csrf

            @error('idEst')
                  <div class="alert alert-danger">
                        El Id es requerido
                  </div>
            @enderror

            <input type="text" name="idEst" placeholder="Id estudiante" value="{{ old('idEst') }}" class="form-control mb-2">
            <select name="traAct" class="form-control mb-2">
                  <option value="">Trabaja Actualmente?...</option>
                  <option value="1">Si</option>
                  <option value="2">No</option>
            </select>
            <select name="ofiAct" class="form-control mb-2">
                  <option value="">Seleccione su Oficio Actual...</option>
                  @for($i=0; $i < 12; $i++)
                        <option value="{{$i}}">{{$i}}cp</option>
                  @endfor
            </select>

            <select name="satEst" class="form-control mb-2">
                  <option value="">Escoja la satisfacción estudiantil...</option>
                  @for($i=0; $i < 4; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                  @endfor
            </select>

            <input type="date" name="fecSeg" placeholder="Fecha de Seguimiento" value="{{ old('fecSeg') }}" class="form-control mb-2">
            <select name="estSeg" class="form-control mb-2">
                  <option value="">Escoja el estado de seguimiento...</option>
                  @for($i=0; $i < 4; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                  @endfor
            </select>
            <button class="btn btn-success" type="submit">Agregar</button>
            </form>
            <br/>
            <div class="btn btn-danger fs-3 fw-bold d-grid">Lista de seguimiento</div>
      <table class="table table-dark table-striped-columns">
            <thead class="table-primary">
                  <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Id Estudiante</th>
                        <th scope="col">Oficio actual</th>
                        <th scope="col">Satisfacción Estudiantil</th>
                        <th scope="col">Handle</th>
                  </tr>
            </thead>
            <tbody>
                  @Foreach($xSeguimiento as $item)
                  <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>
                        <a href="{{ route('Seguimiento.xDetalleSeguimiento', $item->id) }}">
                              {{ $item->idEst }}
                        </td>
                        
                        <td>                     
                                    {{ $item->ofiAct }}
                        <td>
                                    
                                    {{ $item->satEst }}
                             
                        <td>
                              <form action="{{ route('Seguimiento.xEliminarSeg', $item->id) }}" method="post" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm">X</button>
                              </form>
                              <a class="btn btn-warning btn-sm" href="{{ route('Seguimiento.xActualizarSeg', $item->id ) }}">
                                    ...A
                              </a>
                        </td>
                  </tr>
                  @endforeach
            </tbody>
      </table>
      
@endsection
