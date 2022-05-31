<div>
    

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dependencias Detalle') }}
            </h2>
            
            @if(isset($datosDependencia[0]['vdependencia']))
            <h4>{{$datosDependencia[0]['vdependencia']}}</h4>
            
            @else
                <h4></h4>
            @endif
    
            @if(isset($datosDependencia[0]['vnombrecorto']))
            <h4>{{$datosDependencia[0]['vnombrecorto']}}</h4>
            
            @else
                <h4></h4>
            @endif
    
        </x-slot>
    
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
    
                    <div>
     
                        <table class="table table-hover">
                                <thead>
                                  <tr>
                                    <th scope="col">Actividad</th>
                                    <th scope="col">Corto</th>
                                    <th colspan="2"></th>
                                  </tr>
                                </thead>
    <tbody>
    @foreach ($datosDependencia as $item )
        <tr>
        <th scope="row">{{$item->vactividad}}</th>
    
        <td>
            
            <button type="submit" wire:submit class="btn btn-info" id="idActividad" name="idActividad" value="{{ $item->iidactividad }} ">Detalle</button></td>
    
        </tr>
    @endforeach
    </tbody>
                        </table>
                    </div>
                    
    
    
    
                </div>
            </div>
        </div>
    </x-app-layout>







</div>
