<?php

namespace App\Http\Livewire\Dependencias;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\dependencias\miDependencia;

class Dependencias extends Component
{

    use WithPagination;
    public $dependencia;
    public $buscar;

    public function render()
    {

        return view('livewire.dependencias.dependencias',[
            'misDependencias'=>miDependencia::when($this->buscar, function($query,$buscar){
                return $query->where('vdependencia','LIKE', "%$buscar%");
            })->orderBy('vdependencia','ASC')->paginate(20)
          ]);
    }
    public function show($id){
        return redirect()->route('dependence.show',$id);
    }
}
