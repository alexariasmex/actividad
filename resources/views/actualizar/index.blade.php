<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Actualización') }}
        </h2>
        @foreach ($fecha as $item)
        Última fecha de actualización: {{$item->created_at}}   
        @endforeach
        <p class="text-end"><a href=" {{route('excel')}} " class="btn btn-success">Excel</a></p>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col"># Proyecto</th>
                        <th scope="col">Dependencia</th>
                        <th scope="col">Proyecto</th>
                        <th scope="col">Aprobado</th>
                        <th scope="col">Pagado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($importJson as $item )
                    <tr>
                        <td>{{$item->numeroProyecto}}</td>
                        <td>{{$item->dependenciaEjecutora}}</td>
                        <td>{{$item->nombreProyecto}}</td>
                        <th><p class="text-end">{{number_format($item->aprobado,2)}}</p></th>
                        <td><p class="text-end">{{number_format($item->pagado,2)}}</p></td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>


            </div>
        </div>
    </div>
</x-app-layout>