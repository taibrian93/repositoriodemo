<div id="form-create">
    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="title">
            {{ __('Registro Archivo') }}
        </x-slot>

        <x-slot name="description">
            {{ __('') }}
        </x-slot>

        <x-slot name="form">

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="descripcion" value="{{ __('Titulo') }}" />
                <small>Titulo</small>
                <x-jet-input id="titulo" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="registroArchivo.titulo" />
                <x-jet-input-error for="registroArchivo.titulo" class="mt-2" />
            </div>
            
            {{-- <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="departamento" value="{{ __('Departamento') }}" />
                <small>Departamento</small>
                <x-select2-component id="departamento" class="mt-1 block w-full form-control shadow-none departamento" wire:model.defer="registroArchivo.idDepartamento" wire:model="departamentoCodigo" wire:change="getCodigoDepartamento">
                    @slot('option')
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->descripcion }}</option>
                        @endforeach
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.idDepartamento" class="mt-2" />   
            </div> --}}

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="departamento" value="{{ __('Departamento') }}" />
                <small>Departamento</small>
                <x-select2-component id="departamento" class="mt-1 block w-full form-control shadow-none departamento" wire:model.defer="registroArchivo.idDepartamento" >
                    @slot('option')
                        @foreach ($departamentos as $departamento)
                            <option value="{{ $departamento->id }}">{{ $departamento->descripcion }}</option>
                        @endforeach
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.idDepartamento" class="mt-2" />   
            </div>

            {{-- <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="provincia" value="{{ __('Provincia') }}" />
                <small>Provincia</small>
                <x-select2-component id="provincia" class="mt-1 block w-full form-control shadow-none provincia" wire:model.defer="registroArchivo.idProvincia" wire:model="provinciaCodigo" wire:change="getCodigoProvincia">
                    @slot('option')
                        @if (isset($provincias))
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia->id }}">{{ $provincia->descripcion }}</option>
                            @endforeach                            
                        @endif
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.idProvincia" class="mt-2" />   
            </div> --}}

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="provincia" value="{{ __('Provincia') }}" />
                <small>Provincia</small>
                <x-select2-component id="provincia" class="mt-1 block w-full form-control shadow-none provincia" wire:model.defer="registroArchivo.idProvincia" >
                    @slot('option')
                        @if (isset($provincias))
                            @foreach ($provincias as $provincia)
                                <option value="{{ $provincia->id }}">{{ $provincia->descripcion }}</option>
                            @endforeach                            
                        @endif
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.idProvincia" class="mt-2" />   
            </div>

            {{-- <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="distrito" value="{{ __('Distrito') }}" />
                <small>Distrito</small>
                <x-select2-component id="distrito" class="mt-1 block w-full form-control shadow-none" wire:model.defer="registroArchivo.idDistrito" wire:model="distritoCodigo" wire:change="getCodigoDistrito">
                    @slot('option')
                        @if (isset($distritos))
                            @foreach ($distritos as $distrito)
                                <option value="{{ $distrito->id }}">{{ $distrito->descripcion }}</option>
                            @endforeach
                        @endif
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.idProvincia" class="mt-2" />   
            </div> --}}

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="distrito" value="{{ __('Distrito') }}" />
                <small>Distrito</small>
                <x-select2-component id="distrito" class="mt-1 block w-full form-control shadow-none distrito" wire:model.defer="registroArchivo.idDistrito" >
                    @slot('option')
                        @if (isset($distritos))
                            @foreach ($distritos as $distrito)
                                <option value="{{ $distrito->id }}">{{ $distrito->descripcion }}</option>
                            @endforeach
                        @endif
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.idProvincia" class="mt-2" />   
            </div>

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="tipoDocumento" value="{{ __('Tipo Documento') }}" />
                <small>Tipo Documento</small>
                <x-select2-component id="tipoDocumento" class="mt-1 block w-full form-control shadow-none" wire:model.defer="registroArchivo.idTipoDocumento" wire:model="tipoDocumentoCodigo" wire:change="getCodigoTipoDocumento">
                    @slot('option')
                        @foreach ($tipoDocumentos as $tipoDocumento)
                            <option value="{{ $tipoDocumento->id }}">{{ $tipoDocumento->descripcion }}</option>
                        @endforeach
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.idTipoDocumento" class="mt-2" />   
            </div>

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="documento" value="{{ __('Tipo Formato') }}" />
                <small>Tipo Formato</small>
                <x-select2-component id="tipoFormato" class="mt-1 block w-full form-control shadow-none" wire:model.defer="registroArchivo.idTipoFormato" wire:model="tipoFormatoCodigo" wire:change="getCodigoTipoFormato">
                    @slot('option')
                        @foreach ($tipoFormatos as $tipoFormato)
                            <option value="{{ $tipoFormato->id }}">{{ $tipoFormato->descripcion }}</option>
                        @endforeach
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.idTipoFormato" class="mt-2" />   
            </div>

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="documento" value="{{ __('Idioma') }}" />
                <small>Idioma</small>
                <x-select2-component id="idioma" class="mt-1 block w-full form-control shadow-none" wire:model.defer="registroArchivo.idIdioma" wire:model="idiomaCodigo" wire:change="getCodigoIdioma">
                    @slot('option')
                        @foreach ($idiomas as $idioma)
                            <option value="{{ $idioma->id }}">{{ $idioma->descripcion }}</option>
                        @endforeach
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.idIdioma" class="mt-2" />   
            </div>

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="autor" value="{{ __('Autor') }}" />
                <small>Autor</small>
                <x-select2-component id="autor" class="mt-1 block w-full form-control shadow-none" wire:model.defer="registroArchivo.idAutor" >
                    @slot('option')
                        @foreach ($autores as $autor)
                            <option value="{{ $autor->id }}">{{ $autor->name }}</option>
                        @endforeach
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.idAutor" class="mt-2" />   
            </div>

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="derecho" value="{{ __('Derecho') }}" />
                <small>Derecho</small>
                <x-select2-component id="derecho" class="mt-1 block w-full form-control shadow-none" wire:model.defer="registroArchivo.idDerecho" wire:model="derechoCodigo" wire:change="getCodigoDerecho">
                    @slot('option')
                        @foreach ($derechos as $derecho)
                            <option value="{{ $derecho->id }}">{{ $derecho->descripcion }}</option>
                        @endforeach
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.idDerecho" class="mt-2" />   
            </div>

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="descripcion" value="{{ __('Descripción') }}" />
                <small>Descripción</small>
                <x-jet-input id="descripcion" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="registroArchivo.descripcion" />
                <x-jet-input-error for="registroArchivo.descripcion" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="enlace" value="{{ __('Archivo') }}" />
                <small>Archivo</small>
                <x-jet-input id="enlace" type="file" class="mt-1 block w-full form-control shadow-none" wire:model.defer="registroArchivo.enlace" />
                <x-jet-input-error for="registroArchivo.enlace" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="codigo" value="{{ __('Codigo Registro') }}" />
                <small>Codigo Registro</small>
                <x-jet-input id="codigo" type="text" class="mt-1 block w-full form-control shadow-none"  wire:model.defer="registroArchivo.codigo" readonly/>
                <x-jet-input-error for="registroArchivo.codigo" class="mt-2" />
            </div>


            {{-- <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <small>Estado</small>
                <x-jet-input id="estado" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="distrito.estado" />
                <x-jet-input-error for="distrito.estado" class="mt-2" />
            </div> --}}

            <div class="form-group col-span-6 sm:col-span-6">
                <x-jet-label for="estado" value="{{ __('Estado') }}" />
                <small>Estado</small>
                <x-select2-component id="estado" class="mt-1 block w-full form-control shadow-none" wire:model.defer="registroArchivo.estado">
                    @slot('option')
                        <option value="1">Disponible</option>
                        <option value="0">No Disponible</option>
                    @endslot
                </x-select2-component>
                <x-jet-input-error for="registroArchivo.estado" class="mt-2" />   
            </div>

            
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>
</div>
@slot('script')
    <script>

        $(document).ready(function() {
            var meta = $("meta[name='csrf-token']").attr("content");
            
            $('.departamento').on('change', function(){
                var value;
                value = $(this).val();
                $('.provincia').find("option:not(:first)").remove();
                $('.distrito').find("option:not(:first)").remove();
                if (value != '') {
                    $.ajax({
                        method: "POST",
                        url: "{{route('provincia.getProvincia')}}",               
                        dataType: "json",
                        data: {
                            '_token' : meta,
                            'idDepartamento' : value,
                        },
                        // beforeSend: function() {
                        //     $('.provincia').append("<img src='{{ asset('images/loading.gif') }}' />").delay(10000).hide(0);
                        // },
                        success: function(results) {
                            console.log(results);
                            if (results.length > 0) {
                                results.forEach(function(result) {
                                    $('.provincia').append('<option value="'+result.id+'">'+result.descripcion+'</option>');
                                });
                            } else {
                                $('.distrito').append('<option>No hay datos registrados</option>');
                            }
                        }
                    });
                }
            });

            $('.provincia').on('change', function(){
                var value;
                value = $(this).val();
                $('.distrito').find("option:not(:first)").remove();
                if (value != '') {
                    $.ajax({
                        method: "POST",
                        url: "{{route('distrito.getDistrito')}}",               
                        dataType: "json",
                        data: {
                            '_token' : meta,
                            'idProvincia' : value,
                        },
                        // beforeSend: function() {
                        //     $('.distrito').append('<option>Cargando...</option>');
                        // },
                        // complete: function() {       
                        //     $('.distrito').find('option::nth-child(2)').remove();
                        // },
                        success: function(results) {
                            if (results.length > 0) {
                                results.forEach(function(result) {
                                    $('.distrito').append('<option value="'+result.id+'">'+result.descripcion+'</option>');
                                });
                            } else {
                                $('.distrito').append('<option>No hay datos registrados</option>');
                            }		                            
                        }
                    });
                }
            });
        });
    </script>
@endslot

