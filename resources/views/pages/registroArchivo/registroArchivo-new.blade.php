<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Crear Registro Archivo') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('registroArchivo') }}">Registro Archivo</a></div>
            <div class="breadcrumb-item"><a href="#">Crear Registro Archivo</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-registro-archivo action="createRegistroArchivo" />
    </div>
</x-app-layout>
