<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Crear Tipo Formato') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tipo Formato</a></div>
            <div class="breadcrumb-item"><a href="{{ route('user') }}">Crear Tipo Formato</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-tipo-formato action="createTipoFormato" />
    </div>
</x-app-layout>
