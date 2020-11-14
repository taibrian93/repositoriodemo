<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Departamento') }}
        </x-slot>

        <x-slot name="description">
            {{ __('') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="descripcion" value="{{ __('Descripción') }}" />
                <small>Descripción</small>
                <x-jet-input id="descripcion" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="departamento.descripcion" />
                <x-jet-input-error for="departamento.descripcion" class="mt-2" />
            </div>

            {{-- <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="observacion" value="{{ __('Observación') }}" />
                <small>Observación</small>
                <x-jet-input id="observacion" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="departamento.observacion" />
                <x-jet-input-error for="departamento.observacion" class="mt-2" />
            </div> --}}

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="codigoDepartamental" value="{{ __('Código') }}" />
                <small>Código</small>
                <x-jet-input id="codigoDepartamental" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="departamento.codigoDepartamental" />
                <x-jet-input-error for="departamento.codigoDepartamental" class="mt-2" />
            </div>


            {{-- <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <small>Estado</small>
                <x-jet-input id="estado" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="departamento.estado" />
                <x-jet-input-error for="departamento.estado" class="mt-2" />
            </div> --}}

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <small>Estado</small>
                <x-select2-component id="estado" class="mt-1 block w-full form-control shadow-none" wire:model.defer="departamento.estado">
                    @slot('option')
                        <option value="1">Disponible</option>
                        <option value="0">No Disponible</option>
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="departamento.estado" class="mt-2" />   
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
