<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Editar Distrito') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('departamento') }}">Distrito</a></div>
            <div class="breadcrumb-item"><a href="#">Editar Distrito</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-distrito action="updateDistrito" :distritoId="request()->distritoId" />
    </div>
</x-app-layout>