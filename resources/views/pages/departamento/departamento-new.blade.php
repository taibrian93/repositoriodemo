<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Crear Departamento') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('departamento') }}">Departamento</a></div>
            <div class="breadcrumb-item"><a href="#">Crear Departamento</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-departamento action="createDepartamento" />
    </div>
</x-app-layout>
