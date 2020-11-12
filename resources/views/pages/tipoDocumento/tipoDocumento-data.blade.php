<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Datos Tipo Documento') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tipo Documento</a></div>
            <div class="breadcrumb-item"><a href="{{ route('tipoDocumento') }}">Datos Tipo Documento</a></div>
        </div>
    </x-slot>

    <div>
        {{-- <livewire:table.main name="tipoDocumento" :model="$tipoDocumento" sortField="idDublincore" /> --}}
        <livewire:table.main name="tipoDocumento" :model="$tipoDocumento" />
    </div>
</x-app-layout>