<?php

namespace App\Models\datosJson;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class datosJson extends Model
{
    use HasFactory;

    protected $fillable = [
        'numeroProyecto',
        'dependenciaEjecutora',
        'nombreProyecto',
        'aprobado',
        'pagado',
    ];
}