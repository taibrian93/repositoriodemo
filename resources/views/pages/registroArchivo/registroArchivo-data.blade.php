<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Datos Registro Archivo') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('registroArchivo') }}">Registro Archivo</a></div>
            <div class="breadcrumb-item"><a href="#">Datos Registro Archivo</a></div>
        </div>
    </x-slot>

    <div>
        {{-- <livewire:table.main name="tipoDocumento" :model="$tipoDocumento" sortField="idDublincore" /> --}}
        <livewire:table.main name="registroArchivo" :model="$registroArchivo" />
    </div>
</x-app-layout>