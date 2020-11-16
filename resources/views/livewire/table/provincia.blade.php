<div>
    <x-data-table :data="$data" :model="$provincias">
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
                <th><a wire:click.prevent="sortBy('codigoProvincial')" role="button" href="#">
                    Codigo Provincial
                    @include('components.sort-icon', ['field' => 'codigoProvincial'])
                </a></th>
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
            @foreach ($provincias as $provincia)
                <tr x-data="window.__controller.dataTableController({{ $provincia->id }})">
                    {{-- <td>{{ $provincia->id }}</td> --}}
                    <td>{{ $provincia->descripcion }}</td>
                    <td>{{ $provincia->codigoProvincial }}</td>
                    <td>{{ $provincia->codigo }}</td>
                    <td>{{ $provincia->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/provincia/edit/{{ $provincia->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
