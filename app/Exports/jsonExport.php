<?php

namespace App\Exports;

use App\Models\datosJson\datosJson;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class jsonExport implements FromCollection, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return datosJson::select('numeroProyecto',
        'dependenciaEjecutora',
        'nombreProyecto',
        'aprobado')->get();
    }
}
