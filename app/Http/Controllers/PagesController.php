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

    public function fnEstSeguimiento ($id){
        $xEstSeguimiento = Seguimiento::findOrFail($id); //Datos de BD por Id
        return view('Seguimiento.pagSeguimiento', compact('xEstSeguimiento'));
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

    public function fnRegistrarSeg (Request $request){

        //return $request;          //Verificando "token y datos recibidos

        $request -> validate([
            'idEst'=>'required',
            'traAct'=>'required',
            'ofiAct'=>'required',
            'satEst'=>'required',
            'fecSeg'=>'required',
            'estSeg'=>'required',
        ]);

        $nuevoSeguimiento = new Seguimiento;
        
        $nuevoSeguimiento->idEst = $request->idEst;
        $nuevoSeguimiento->traAct = $request->traAct;
        $nuevoSeguimiento->ofiAct = $request->ofiAct;
        $nuevoSeguimiento->satEst = $request->satEst;
        $nuevoSeguimiento->fecSeg = $request->fecSeg;
        $nuevoSeguimiento->estSeg = $request->estSeg;

        $nuevoSeguimiento->save();    //guardar en BD


        return back()->with('msj', 'Se registro con éxito...');
    }

    
    public function fnEstActualizar ($id){
        $xActAlumnos = Estudiante::findOrFail($id); //Datos de BD por Id
        return view('Estudiante.pagActualizar', compact('xActAlumnos'));
    }

    public function fnUpdate (Request $request, $id){

        $request -> validate([
            'codEst'=>'required',
            'nomEst'=>'required',
            'apeEst'=>'required',
            'fnaEst'=>'required',
            'turMat'=>'required',
            'semMat'=>'required',
            'estMat'=>'required'
        ]);

        $xUpdateAlumnos = Estudiante::findOrFail($id);
        
        $xUpdateAlumnos->codEst = $request->codEst;
        $xUpdateAlumnos->nomEst = $request->nomEst;
        $xUpdateAlumnos->apeEst = $request->apeEst;
        $xUpdateAlumnos->fnaEst = $request->fnaEst;
        $xUpdateAlumnos->turMat = $request->turMat;
        $xUpdateAlumnos->semMat = $request->semMat;
        $xUpdateAlumnos->estMat = $request->estMat;

        $xUpdateAlumnos->save();    //guardar en BD


        return back()->with('msj', 'Se actualizo con éxito...');
    }

    public function fnEstActualizarSeg ($id){
        $xActSeguimiento = Seguimiento::findOrFail($id); //Datos de BD por Id
        return view('Seguimiento.pagActualizarSeg', compact('xActSeguimiento'));
    }

    public function fnUpdateSeg (Request $request, $id){

        $request -> validate([
            'idEst'=>'required',
            'traAct'=>'required',
            'ofiAct'=>'required',
            'satEst'=>'required',
            'fecSeg'=>'required',
            'estSeg'=>'required',
        ]);

        $xUpdateSeguimiento = Seguimiento::findOrFail($id);
        
        $xUpdateSeguimiento->codEst = $request->codEst;
        $xUpdateSeguimiento->nomEst = $request->nomEst;
        $xUpdateSeguimiento->apeEst = $request->apeEst;
        $xUpdateSeguimiento->fnaEst = $request->fnaEst;
        $xUpdateSeguimiento->turMat = $request->turMat;
        $xUpdateSeguimiento->semMat = $request->semMat;
        $xUpdateSeguimiento->estMat = $request->estMat;

        $xUpdateSeguimiento->save();    //guardar en BD


        return back()->with('msj', 'Se actualizo con éxito...');
    }

    public function fnEliminar ($id){
        $deleteAlumno = Estudiante::findOrFail($id); //Datos de BD
        $deleteAlumno -> delete();
        return back()->with('msj', 'Se elimino con éxito...');
    }

    public function fnEliminarSeg ($id){
        $deleteSeguimiento = Seguimiento::findOrFail($id); //Datos de BD
        $deleteSeguimiento -> delete();
        return back()->with('msj', 'Se elimino con éxito...');
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
