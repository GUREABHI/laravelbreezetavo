<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Seguimiento;

class PagesController extends Controller
{
    public function fnIndex (){
        return view('welcome');
    }

    public function fnEstDetalle ($id){
        $xDetAlumnos = Estudiante::findOrFail($id); //Datos de BD por Id
        return view('Estudiante.pagDetalle', compact('xDetAlumnos'));
    }

    public function fnRegistrar (Request $request){

        //return $request;          //Verificando "token y datos recibidos

        $request -> validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnaEst'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required'
        ]);

        $nuevoEstudiante = new Estudiante;
        
        $nuevoEstudiante->codEst = $request->codEst;
        $nuevoEstudiante->nomEst = $request->nomEst;
        $nuevoEstudiante->apeEst = $request->apeEst;
        $nuevoEstudiante->fnaEst = $request->fnaEst;
        $nuevoEstudiante->turMat = $request->turMat;
        $nuevoEstudiante->semMat = $request->semMat;
        $nuevoEstudiante->estMat = $request->estMat;

        $nuevoEstudiante->save();    //guardar en BD


        return back()->with('msj', 'Se registro con éxito...');
    }

    public function fnLista (){
        $xAlumnos = Estudiante::all(); //Datos de BD
        return view('pagLista', compact('xAlumnos'));
    }
    
    public function fnSeguimiento (){
        $xSeguimiento = Seguimiento::all(); //Datos de BD
        return view('pagListaSeg', compact('xSeguimiento'));
    }

    public function fnGaleria ($numero=0){
        $valor = $numero;
        $otro = 25;

        return view('pagGaleria', compact('valor', 'otro'));
    }
}
