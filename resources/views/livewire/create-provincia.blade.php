<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Provincia') }}
        </x-slot>

        <x-slot name="description">
            {{ __('') }}
        </x-slot>

        <x-slot name="form">

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="departamento" value="{{ __('Departamento') }}" />
                <small>Departamento</small>
                <x-select2-component id="departamento" class="mt-1 block w-full form-control shadow-none" wire:model.defer="provincia.idDepartamento" wire:model="departamentoCodigo" wire:change="getCodigo">
                    @slot('option')
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->descripcion }}</option>
                        @endforeach
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="provincia.idDepartamento" class="mt-2" />   
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="descripcion" value="{{ __('Descripción') }}" />
                <small>Descripción</small>
                <x-jet-input id="descripcion" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="provincia.descripcion" />
                <x-jet-input-error for="provincia.descripcion" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="codigoProvincial" value="{{ __('Codigo Provincial') }}" />
                <small>Codigo Provincial</small>
            <x-jet-input id="codigoProvincial" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="provincia.codigoProvincial" readonly />
                <x-jet-input-error for="provincia.codigoProvincial" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="codigo" value="{{ __('Codigo') }}" />
                <small>Codigo</small>
                <x-jet-input id="codigo" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="provincia.codigo" wire:model="provinciaCodigo" wire:keyup="getCodigo"/>
                <x-jet-input-error for="provincia.codigo" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <small>Estado</small>
                <x-select2-component id="estado" class="mt-1 block w-full form-control shadow-none" wire:model.defer="provincia.estado">
                    @slot('option')
                        <option value="1">Disponible</option>
                        <option value="0">No Disponible</option>
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="provincia.estado" class="mt-2" />   
            </div>

            
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
