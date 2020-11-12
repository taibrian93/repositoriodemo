<div>
    <x-data-table :data="$data" :model="$tipoDocumentos">
        <x-slot name="head">
            <tr>
                {{-- <th><a wire:click.prevent="sortBy('idDublincore')" role="button" href="#">
                    #
                    @include('components.sort-icon', ['field' => 'idDublincore'])
                </a></th> --}}
                <th><a wire:click.prevent="sortBy('descripcion')" role="button" href="#">
                    Descripcion
                    @include('components.sort-icon', ['field' => 'descripcion'])
                </a></th>
                <th><a wire:click.prevent="sortBy('codigo')" role="button" href="#">
                    Codigo
                    @include('components.sort-icon', ['field' => 'codigo'])
                </a></th>
                <th><a wire:click.prevent="sortBy('created_at')" role="button" href="#">
                    Fecha Creación
                    @include('components.sort-icon', ['field' => 'created_at'])
                </a></th>
                <th>Acción</th>
            </tr>
        </x-slot>
        <x-slot name="body">
            @foreach ($tipoDocumentos as $key => $tipoDocumento)
                <tr x-data="window.__controller.dataTableController({{ $tipoDocumento->id }})">
                    {{-- <td>{{ $key+1 }}</td> --}}
                    <td>{{ $tipoDocumento->descripcion }}</td>
                    <td>{{ $tipoDocumento->codigo }}</td>
                    <td>{{ $tipoDocumento->created_at->format('d M Y H:i') }}</td>
                    <td class="whitespace-no-wrap row-action--icon">
                        <a role="button" href="/tipoDocumento/edit/{{ $tipoDocumento->id }}" class="mr-3"><i class="fa fa-16px fa-pen"></i></a>
                        <a role="button" x-on:click.prevent="deleteItem" href="#"><i class="fa fa-16px fa-trash text-red-500"></i></a>
                    </td>
                </tr>
            @endforeach
        </x-slot>
    </x-data-table>
</div>
