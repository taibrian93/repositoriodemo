<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Editar Tipo Formato') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('tipoFormato') }}">Tipo Formato</a></div>
            <div class="breadcrumb-item"><a href="#">Editar Tipo Formato</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-tipo-formato action="updateTipoFormato" :tipoFormatoId="request()->tipoFormatoId" />
    </div>
</x-app-layout>