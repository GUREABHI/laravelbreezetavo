@extends('pagPlantilla')

@section('titulo')
      <h1 class="display-4">Pagina Lista</h1>
@endsection

@section('seccion')
      <h3>Detalle estudiante</h3>
      <p>Id:                        {{ $xDetAlumnos->Id }}</p>
      <p>Código:                    {{ $xDetAlumnos->codEst }}</p>
      <p>Apellidos y Nombres:       {{ $xDetAlumnos->apeEst }}, {{ $xDetAlumnos->nomEst }}</p>
      <p>Fecha de Nacimiento:       {{ $xDetAlumnos->fnaEst }}</p>
      <p>Turno:                     {{ $xDetAlumnos->turEst }}</p>
      <p>Semestre:                  {{ $xDetAlumnos->semEst }}</p>
      <p>Estado de Matricula:       {{ $xDetAlumnos->estEst }}</p>
      
@endsection
