<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Datos Tipo Formato') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Tipo Formato</a></div>
            <div class="breadcrumb-item"><a href="{{ route('tipoFormato') }}">Datos Tipo Formato</a></div>
        </div>
    </x-slot>

    <div>
        {{-- <livewire:table.main name="tipoFormato" :model="$tipoFormato" sortField="idDublincore" /> --}}
        <livewire:table.main name="tipoFormato" :model="$tipoFormato" />
    </div>
</x-app-layout>