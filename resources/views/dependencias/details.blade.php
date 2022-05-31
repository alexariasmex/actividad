<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dependencia Detalle') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                

                <table class="table table-hover">
                    <thead>
                    <tr>
                    <th scope="col">Actividad</th>
                    <th scope="col"></th>
                    <th colspan="2"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($miQuery as $item )
                    <tr>
                        <th scope="row">Dependencia: {{$item->vdependencia}}</th>
                    </tr>
                    <tr>
                        <td>Nombre corto: {{$item->vnombrecorto}}</td>
                    </tr>  
                    <tr>
                        <td>Actividad: {{$item->vactividad}}</td>
                    </tr>  
                    <tr>
                        @if ($item->npresupuestoautorizado)
                        <td>Presupuesto: {{number_format($item->npresupuestoautorizado,2)}}</td>
                        @else
                        <th scope="row">Sin presupuesto</th>
                        @endif
                    </tr> 
                    <tr>
                        @if ($item->npresupuestomodificado)
                        <td>Presupuesto modificado: {{number_format($item->npresupuestomodificado,2)}}</td>
                        @else
                        <th scope="row">Sin presupuesto</th>
                        @endif
                    </tr>
            
                    @endforeach
                    </tbody>
                    </table>
                    <canvas id="misDatos" width="80" height="80"></canvas>
            </div>
        </div>
    </div>
        
  
   <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>

    <script>
    const ctx = document.getElementById('misDatos').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Presupuesto Asignado', 'Presupuesto Gastado'],
            datasets: [{
                label: '# of Votes',
                data: [{{ $item->npresupuestomodificado }}, {{ $item->npresupuestomodificado/2 }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {

        }
    });
    </script>
    


</x-app-layout>