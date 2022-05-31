<?php

namespace App\Http\Livewire\Dependencias;

use Livewire\Component;
use App\Models\dependencias\miDependencia;

class Detalle extends Component
{
    public $miVariabel;

    public function mount($miVariabel){
        $miVariabel=$this->datosUsuario;
    }

    public function render($miVariabel)
    {
       
        $datosDependencia=miDependencia::
        join('actividad','actividad.iiddependencia', '=', 'dependencia.iiddependencia') 
        ->where('actividad.iiddependencia','=',$miVariabel)
        ->select('dependencia.vdependencia','dependencia.vnombrecorto',
        'actividad.vactividad','actividad.vnombreactividad','actividad.iidactividad')
        ->get();

        return view('livewire.dependencias.detalle');
    }
}
