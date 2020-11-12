<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Dato Idioma') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Idioma</a></div>
            <div class="breadcrumb-item"><a href="{{ route('tipoDocumento') }}">Dato Idioma</a></div>
        </div>
    </x-slot>

    <div>
        {{-- <livewire:table.main name="tipoDocumento" :model="$tipoDocumento" sortField="idDublincore" /> --}}
        <livewire:table.main name="idioma" :model="$idioma" />
    </div>
</x-app-layout>