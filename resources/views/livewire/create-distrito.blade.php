<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Distrito') }}
        </x-slot>

        <x-slot name="description">
            {{ __('') }}
        </x-slot>

        <x-slot name="form">

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="departamento" value="{{ __('Departamento') }}" />
                <small>Departamento</small>
                <x-select2-component id="departamento" class="mt-1 block w-full form-control shadow-none" wire:model.defer="distrito.idDepartamento" wire:model="departamentoCodigo" wire:change="getCodigoDepartamento">
                    @slot('option')
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->descripcion }}</option>
                        @endforeach
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="distrito.idDepartamento" class="mt-2" />   
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="provincia" value="{{ __('Provincia') }}" />
                <small>Provincia</small>
                <x-select2-component id="provincia" class="mt-1 block w-full form-control shadow-none" wire:model.defer="distrito.idProvincia" wire:model="provinciaCodigo" wire:change="getCodigoProvincia">
                    @slot('option')
                        @if (isset($provincias))
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia->id }}">{{ $provincia->descripcion }}</option>
                            @endforeach
                        {{-- //@else --}}
                            
                        @endif
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="distrito.idProvincia" class="mt-2" />   
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="descripcion" value="{{ __('Descripción') }}" />
                <small>Descripción</small>
                <x-jet-input id="descripcion" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="distrito.descripcion" />
                <x-jet-input-error for="distrito.descripcion" class="mt-2" />
            </div>

            {{-- <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="observacion" value="{{ __('Observación') }}" />
                <small>Observación</small>
                <x-jet-input id="observacion" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="distrito.observacion" />
                <x-jet-input-error for="distrito.observacion" class="mt-2" />
            </div> --}}

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="codigoDistrital" value="{{ __('Codigo Distrital') }}" />
                <small>Codigo Distrital</small>
            <x-jet-input id="codigoDistrital" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="distrito.codigoDistrital" readonly />
                <x-jet-input-error for="distrito.codigoDistrital" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="codigo" value="{{ __('Codigo') }}" />
                <small>Codigo</small>
                <x-jet-input id="codigo" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="distrito.codigo" wire:model="distritoCodigo" wire:keyup="getCodigoDistrito"/>
                <x-jet-input-error for="distrito.codigo" class="mt-2" />
            </div>


            {{-- <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <small>Estado</small>
                <x-jet-input id="estado" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="distrito.estado" />
                <x-jet-input-error for="distrito.estado" class="mt-2" />
            </div> --}}

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <small>Estado</small>
                <x-select2-component id="estado" class="mt-1 block w-full form-control shadow-none" wire:model.defer="distrito.estado">
                    @slot('option')
                        <option value="1">Disponible</option>
                        <option value="0">No Disponible</option>
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="distrito.estado" class="mt-2" />   
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
