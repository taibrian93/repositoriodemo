<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Editar Departamento') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('departamento') }}">Departamento</a></div>
            <div class="breadcrumb-item"><a href="#">Editar Departamento</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-departamento action="updateDepartamento" :departamentoId="request()->departamentoId" />
    </div>
</x-app-layout>