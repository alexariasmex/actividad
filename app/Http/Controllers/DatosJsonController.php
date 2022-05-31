<?php

namespace App\Http\Controllers;

use App\Models\datosJson\datosJson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Exports\jsonExport;
use Maatwebsite\Excel\Facades\Excel;


class DatosJsonController extends Controller
{

    public function index()
    {
        $respuesta=Http::get('http://sigo-queretaro.centralus.cloudapp.azure.com:8080/release1/C_pat/getCatalogoPOA');
        $respuesta->json();
        $miArreglo=json_decode($respuesta,true);
        
        datosJson::query()->delete();

        foreach($miArreglo['datos'] as $item){
            datosJson::create([
                'numeroProyecto'        =>$item['numeroProyecto'],
                'dependenciaEjecutora'  =>$item['dependenciaEjecutora'],
                'nombreProyecto'        =>$item['nombreProyecto'],
                'aprobado'              =>$item['aprobado'],
                'pagado'                =>$item['pagado'],
            ]);
        }

        $fecha=datosJson::select('created_at')->limit(1)->get();
        $importJson=datosJson::select(
            'numeroProyecto',
            'dependenciaEjecutora',
            'nombreProyecto',
            'aprobado',
            'pagado'
            )
        ->get();
        return view('actualizar.index')
        ->with('fecha',$fecha)
        ->with('importJson',$importJson);
    }

    public function export() 
    {
        return Excel::download(new jsonExport, 'json.xlsx');
    }


}
