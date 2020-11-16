<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Crear Distrito') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('distrito') }}">Distrito</a></div>
            <div class="breadcrumb-item"><a href="#">Crear Distrito</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-distrito action="createDistrito" />
    </div>
</x-app-layout>
