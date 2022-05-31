<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dependencias\miDependencia;
use GrahamCampbell\ResultType\Result;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class DependenciasController extends Controller
{
    public function index(){
        return view('dependencias.index');
    }

    public function show($id){
        $datosDependencia=miDependencia::
        join('actividad','actividad.iiddependencia', '=', 'dependencia.iiddependencia')
        ->where('actividad.iiddependencia','=',$id)
        ->select('dependencia.vdependencia','dependencia.vnombrecorto',
        'actividad.vactividad','actividad.vnombreactividad','actividad.iidactividad')
        ->get();

        return view('dependencias.show')
        ->with('datosDependencia',$datosDependencia)
        ->with('iidDependencia',$id);
    }

    public function store(Request $request){
        $idDependencia=$request->input('iidDependencia');
        $idActividad=$request->input('iidActividad');

        $miQuery=DB::table('dependencia')
        ->select(
        'dependencia.vdependencia',
        'dependencia.vnombrecorto',
        'actividad.iidactividad',
        'actividad.vactividad',
        'detalleactividad.npresupuestoautorizado',
        'detalleactividad.npresupuestomodificado'
        )
        ->join('actividad','actividad.iiddependencia','=','dependencia.iiddependencia')
        ->join('detalleactividad','detalleactividad.iidactividad','=','actividad.iidactividad')
        ->where('dependencia.iiddependencia',$idDependencia)
        ->where('actividad.iidactividad',$idActividad)
        ->get();

        return view('dependencias.details',compact('miQuery'));
    }

}
