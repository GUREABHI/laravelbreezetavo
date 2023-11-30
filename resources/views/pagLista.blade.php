@extends('pagPlantilla')

@section('titulo')
      <h1>Pagina Lista</h1>
@endsection

@section('seccion')
      <h3>Lista</h3>
      @Foreach($xAlumnos as $item)
            <p> {{ $item->id }} {{ $item->nomEst }} </p>
      @endforeach
@endsection
