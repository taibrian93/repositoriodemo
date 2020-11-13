<div>
    <x-data-table :data="$data" :model="$nodos">
        <x-slot name="head">
            <tr>
                {{-- <th><a wire:click.prevent="sortBy('id')" role="button" href="#">
                    ID
                    @include('components.sort-icon', ['field' => 'id'])
                </a></th> --}}
                <th><a wire:click.prevent="sortBy('descripcion')" role="button" href="#">
                    Descripción
                    @include('components.sort-icon', ['field' => 'descripcion'])
                </a></th>
                {{-- <th><a wire:click.prevent="sortBy('observacion')" role="button" href="#">
                    Observacion
                    @include('components.sort-icon', ['field' => 'observacion'])
                </a></th> --}}
                <th><a wire:click.prevent="sortBy('codigo')" role="button" href="#">
                    Codigo
                    @include('components.sort-icon', ['field' => 'codigo'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Fecha Creación
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($nodos as $nodo)
                <tr x-data="window.__controller.dataTableController({{ $nodo->id }})">
                    {{-- <td>{{ $nodo->id }}</td> --}}
                    <td>{{ $nodo->descripcion }}</td>
                    {{-- <td>{{ $nodo->observacion }}</td> --}}
                    <td>{{ $nodo->codigo }}</td>
                    <td>{{ $nodo->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/nodo/edit/{{ $nodo->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
