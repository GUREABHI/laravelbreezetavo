@extends('pagPlantilla')

@section('titulo')
      <h1 class="display-4">Pagina Lista Seguimiento</h1>
@endsection

@section('seccion')
      <h3>Detalle Seguimiento</h3>
      <p>Id:                              {{ $xEstSeguimiento->id }}</p>
      <p>Id estudiante:                   {{ $xEstSeguimiento->idEst }}</p>
      <p>Trabajo Actual:                  {{ $xEstSeguimiento->traAct }}</p>
      <p>Oficio Actual:                   {{ $xEstSeguimiento->ofiAct }}</p>
      <p>Satisfacción Estudiantil:        {{ $xEstSeguimiento->satEst }}</p>
      <p>Fecha de Seguimiento:            {{ $xEstSeguimiento->fecSeg }}</p>
      <p>Estado de Seguimiento:           {{ $xEstSeguimiento->estSeg }}</p>
      
@endsection
