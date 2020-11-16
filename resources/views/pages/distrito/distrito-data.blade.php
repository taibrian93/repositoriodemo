<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Datos Distrito') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('distrito') }}">Distrito</a></div>
            <div class="breadcrumb-item"><a href="#">Dato Distrito</a></div>
        </div>
    </x-slot>

    <div>
        {{-- <livewire:table.main name="tipoDocumento" :model="$tipoDocumento" sortField="idDublincore" /> --}}
        <livewire:table.main name="distrito" :model="$distrito" />
    </div>
</x-app-layout>