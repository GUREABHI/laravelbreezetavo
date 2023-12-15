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

            <input type="text" name="idEst" placeholder="Id estudiante" value="{{ $xActSeguimiento->idEst }}" class="form-control mb-2">
            <select name="traAct" class="form-control mb-2">
                  <option value="">Trabaja Actualmente?...</option>
                  <option value="1" @if ($xActSeguimiento->traAct == 1) {{ "SELECTED" }} @endif>Si</option>
                  <option value="2" @if ($xActSeguimiento->traAct == 2) {{ "SELECTED" }} @endif>No</option>
            </select>
            <select name="ofiAct" class="form-control mb-2">
                  <option value="">Seleccione su Oficio Actual...</option>
                  @for($i=0; $i < 12; $i++)
                        <option value="{{$i}}" @if ($xActSeguimiento->ofiAct == 1) {{ "SELECTED" }} @endif>{{$i}}cp</option>
                  @endfor
            </select>

            <select name="satEst" class="form-control mb-2">
                  <option value="">Escoja la satisfacción estudiantil...</option>
                  @for($i=0; $i < 4; $i++)
                        <option value="{{$i}}" @if ($xActSeguimiento->satEst == 1) {{ "SELECTED" }} @endif>{{$i}}</option>
                  @endfor
            </select>

            <input type="date" name="fecSeg" placeholder="Fecha de Seguimiento" value="{{ $xActSeguimiento->fecSeg }}" class="form-control mb-2">
            <select name="estSeg" class="form-control mb-2">
                  <option value="">Escoja el estado de seguimiento...</option>
                  @for($i=0; $i < 4; $i++)
                        <option value="{{$i}}" @if ($xActSeguimiento->estSeg == 1) {{ "SELECTED" }} @endif>{{$i}}</option>
                  @endfor
            </select>
            <button class="btn btn-primary" type="submit">Actualizar</button>
            </form>
            
@endsection
