<div>
    <input type="text" wire:model='buscar' size="30" placeholder="Buscar">
    <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">Dependencia</th>
                <th scope="col">Corto</th>
                <th colspan="2"></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($misDependencias as $item )
              <tr>
                <th scope="row">{{$item->vdependencia}}</th>
                <td>{{$item->vnombrecorto}}</td>
                <td><button wire:click='show({{$item->iiddependencia}})'
                  type="button" class="btn btn-info">Actividad</button></td>

              </tr>

                @endforeach
            </tbody>
    </table>
    @if ($misDependencias)
    {{$misDependencias->links()}}
        @else

    @endif
</div>
