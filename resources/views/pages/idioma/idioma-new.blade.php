<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Crear Idioma') }}</h1>

        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('idioma') }}">Idioma</a></div>
            <div class="breadcrumb-item"><a href="#">Crear Idioma</a></div>
        </div>
    </x-slot>

    <div>
        <livewire:create-idioma action="createIdioma" />
    </div>
</x-app-layout>
