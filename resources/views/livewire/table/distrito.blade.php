<div>
    <x-data-table :data="$data" :model="$distritos">
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
                <th><a wire:click.prevent="sortBy('iso_639_1')" role="button" href="#">
                    Codigo Departamental
                    @include('components.sort-icon', ['field' => 'codigoDepartamental'])
                </a></th>
                {{-- <th><a wire:click.prevent="sortBy('codigo')" role="button" href="#">
                    Codigo
                    @include('components.sort-icon', ['field' => 'codigo'])
                </a></th> --}}
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Fecha Creación
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Action</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($distritos as $distrito)
                <tr x-data="window.__controller.dataTableController({{ $distrito->id }})">
                    {{-- <td>{{ $distrito->id }}</td> --}}
                    <td>{{ $distrito->descripcion }}</td>
                    <td>{{ $distrito->codigoDistrital }}</td>
                    {{-- <td>{{ $distrito->codigo }}</td> --}}
                    <td>{{ $distrito->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/distrito/edit/{{ $distrito->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
