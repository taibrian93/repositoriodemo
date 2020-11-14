<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Tipo Formato') }}
        </x-slot>

        <x-slot name="description">
            {{ __('') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="descripcion" value="{{ __('Descripción') }}" />
                <small>Descripción</small>
                <x-jet-input id="descripcion" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tipoFormato.descripcion" />
                <x-jet-input-error for="tipoFormato.descripcion" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="observacion" value="{{ __('Observación') }}" />
                <small>Observación</small>
                <x-jet-input id="observacion" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tipoFormato.observacion" />
                <x-jet-input-error for="tipoFormato.observacion" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="codigo" value="{{ __('Código') }}" />
                <small>Código</small>
                <x-jet-input id="codigo" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tipoFormato.codigo" />
                <x-jet-input-error for="tipoFormato.codigo" class="mt-2" />
            </div>

            {{-- <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <small>Estado</small>
                <x-jet-input id="estado" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tipoFormato.estado" />
                <x-jet-input-error for="tipoFormato.estado" class="mt-2" />
            </div> --}}

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <small>Estado</small>
                <x-select2-component id="estado" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tipoFormato.estado">
                    @slot('option')
                        <option value="1">Disponible</option>
                        <option value="0">No Disponible</option>
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="tipoFormato.estado" class="mt-2" />   
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
