<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Crear Provincia') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('provincia') }}">Provincia</a></div>
            <div class="breadcrumb-item"><a href="#">Crear Provincia</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-provincia action="createProvincia" />
    </div>
</x-app-layout>
