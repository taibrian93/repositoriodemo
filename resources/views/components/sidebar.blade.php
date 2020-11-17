@php
$links = [
    [
        "href" => "dashboard",
        "text" => "Dashboard",
        "is_multi" => false,
    ],
    [
        "href" => [
            [
                "title_link" => "Usuario",
                "icono" => "fas fa-users",
                "section_text" => "Usuario",
                "section_list" => [
                    ["href" => "user", "text" => "Listar"],
                    ["href" => "user.new", "text" => "Crear"]
                ]
            ]
        ],
        "text" => "Usuarios",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "title_link" => "Registro Archivo",
                "icono" => "fas fa-file-import",
                "section_text" => "Registro Archivo",
                "section_list" => [
                    ["href" => "registroArchivo", "text" => "Listar"],
                    ["href" => "registroArchivo.new", "text" => "Crear"]
                ]
            ],
            [
                "title_link" => "Tipo Documento",
                "icono" => "fas fa-file-alt",
                "section_text" => "Tipo Documento",
                "section_list" => [
                    ["href" => "tipoDocumento", "text" => "Listar"],
                    ["href" => "tipoDocumento.new", "text" => "Crear"]
                ]
            ],
            [
                "title_link" => "Tipo Formato",
                "icono" => "fas fa-file-contract",
                "section_text" => "Tipo Formato",
                "section_list" => [
                    ["href" => "tipoFormato", "text" => "Listar"],
                    ["href" => "tipoFormato.new", "text" => "Crear"]
                ]
            ]
        ],
        "text" => "Archivos",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "title_link" => "Idioma",
                "icono" => "fas fa-language",
                "section_text" => "Idioma",
                "section_list" => [
                    ["href" => "idioma", "text" => "Listar"],
                    ["href" => "idioma.new", "text" => "Crear"]
                ]
            ]
        ],
        "text" => "Idiomas",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "title_link" => "Nodo",
                "icono" => "fas fa-people-carry",
                "section_text" => "Nodo",
                "section_list" => [
                    ["href" => "nodo", "text" => "Listar"],
                    ["href" => "nodo.new", "text" => "Crear"]
                ]
            ]
        ],
        "text" => "Nodos",
        "is_multi" => true,
    ],
    [
        "href" => [
            [
                "title_link" => "Departamento",
                "icono" => "fas fa-globe-americas",
                "section_text" => "Departamento",
                "section_list" => [
                    ["href" => "departamento", "text" => "Listar"],
                    ["href" => "departamento.new", "text" => "Crear"]
                ]
            ],
            [
                "title_link" => "Provincia",
                "icono" => "fas fa-map-marked-alt",
                "section_text" => "Provincia",
                "section_list" => [
                    ["href" => "provincia", "text" => "Listar"],
                    ["href" => "provincia.new", "text" => "Crear"]
                ]
            ],
            [
                "title_link" => "Distrito",
                "icono" => "fas fa-building",
                "section_text" => "Distrito",
                "section_list" => [
                    ["href" => "distrito", "text" => "Listar"],
                    ["href" => "distrito.new", "text" => "Crear"]
                ]
            ]
        ],
        "text" => "Coberturas",
        "is_multi" => true,
    ],
    
];
$navigation_links = array_to_object($links);
@endphp

<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">
                <img class="d-inline-block" width="32px" height="30.61px" src="" alt="">
            </a>
        </div>
        @foreach ($navigation_links as $link)
        <ul class="sidebar-menu">
            <li class="menu-header">{{ $link->text }}</li>
            @if (!$link->is_multi)
            <li class="{{ Request::routeIs($link->href) ? 'active' : '' }}">
                <a class="nav-link" href="{{ route($link->href) }}"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            @else
                @foreach ($link->href as $section)
                    @php
                    $routes = collect($section->section_list)->map(function ($child) {
                        return Request::routeIs($child->href);
                    })->toArray();

                    $is_active = in_array(true, $routes);
                    @endphp

                    <li class="dropdown {{ ($is_active) ? 'active' : '' }}">
                        <a title="{{ $section->title_link }}" href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $section->icono }}"></i> <span>{{ $section->section_text }}</span></a>
                        <ul class="dropdown-menu">
                            @foreach ($section->section_list as $child)
                                <li class="{{ Request::routeIs($child->href) ? 'active' : '' }}"><a class="nav-link" href="{{ route($child->href) }}">{{ $child->text }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                @endforeach
            @endif
        </ul>
        @endforeach
    </aside>
</div>
