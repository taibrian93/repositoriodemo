<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Crear Nodo') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('nodo') }}">Nodo</a></div>
            <div class="breadcrumb-item"><a href="#">Crear Nodo</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-nodo action="createNodo" />
    </div>
</x-app-layout>
