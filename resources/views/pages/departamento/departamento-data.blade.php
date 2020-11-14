<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Datos Departamento') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('departamento') }}">Departamento</a></div>
            <div class="breadcrumb-item"><a href="#">Dato Departamento</a></div>
        </div>
    </x-slot>

    <div>
        {{-- <livewire:table.main name="tipoDocumento" :model="$tipoDocumento" sortField="idDublincore" /> --}}
        <livewire:table.main name="departamento" :model="$departamento" />
    </div>
</x-app-layout>