<?php

namespace App\Models\dependencias;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class miDependencia extends Model
{
    use HasFactory;

    protected $table = 'dependencia';
    protected $fillable = [
        'iiddependencia',
        'vdependencia',
        'vnombrecorto',
        'iactivo',
        'iidcomite'
    ];
}
