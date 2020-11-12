<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Tipo Documento') }}
        </x-slot>

        <x-slot name="description">
            {{ __('') }}
        </x-slot>

        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="descripcion" value="{{ __('Descripción') }}" />
                <small>Descripción</small>
                <x-jet-input id="descripcion" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tipoDocumento.descripcion" />
                <x-jet-input-error for="tipoDocumento.descripcion" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="observacion" value="{{ __('Observación') }}" />
                <small>Observación</small>
                <x-jet-input id="observacion" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tipoDocumento.observacion" />
                <x-jet-input-error for="tipoDocumento.observacion" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="codigo" value="{{ __('Código') }}" />
                <small>Código</small>
                <x-jet-input id="codigo" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tipoDocumento.codigo" />
                <x-jet-input-error for="tipoDocumento.codigo" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <small>Estado</small>
                <x-jet-input id="estado" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tipoDocumento.estado" />
                <x-jet-input-error for="tipoDocumento.estado" class="mt-2" />
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