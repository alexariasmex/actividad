<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dependencias Actividades') }}
        </h2>
        
        @if(isset($datosDependencia[0]['vdependencia']))
        <h5>Dependencia: {{$datosDependencia[0]['vdependencia']}}</h5>
        
        @else
            <h4></h4>
        @endif

        @if(isset($datosDependencia[0]['vnombrecorto']))
        <h5>Nombre Corto: {{$datosDependencia[0]['vnombrecorto']}}</h5>
        
        @else
            <h4></h4>
        @endif

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                

<div>
<form action="{!!route('dependence.store')!!}" method="POST">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Actividad</th>
<th scope="col"></th>
<th colspan="2"></th>
</tr>
</thead>
<tbody>
@foreach ($datosDependencia as $item )
<tr>
<th scope="row">{{$item->vactividad}}</th>

<td>
<input type="hidden" id=="iidDependencia" name="iidDependencia" value="{{$iidDependencia}}">
<button type="submit" id="iidActividad" name="iidActividad" class="btn btn-info" value=" {{ $item->iidactividad }} ">Detalle</button></td>
@csrf
</tr>
@endforeach
</tbody>
</table>
</form>

</div>
                



            </div>
        </div>
    </div>
</x-app-layout>
