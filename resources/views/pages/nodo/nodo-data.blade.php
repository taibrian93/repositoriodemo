<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Datos Nodo') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('nodo') }}">Nodo</a></div>
            <div class="breadcrumb-item"><a href="#">Datos Nodo</a></div>
        </div>
    </x-slot>

    <div>
        {{-- <livewire:table.main name="tipoDocumento" :model="$tipoDocumento" sortField="idDublincore" /> --}}
        <livewire:table.main name="nodo" :model="$nodo" />
    </div>
</x-app-layout>