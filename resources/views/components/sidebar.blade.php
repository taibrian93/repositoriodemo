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
            // [
            //     "section_text" => "Archivo",
            //     "section_list" => [
            //         ["href" => "archivo", "text" => "Listar"],
            //         ["href" => "archivo.new", "text" => "Crear"]
            //     ]
            // ],
            [
                "icono" => "fas fa-file-alt",
                "section_text" => "Tipo Documento",
                "section_list" => [
                    ["href" => "tipoDocumento", "text" => "Listar"],
                    ["href" => "tipoDocumento.new", "text" => "Crear"]
                ]
            ],
            [
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
                        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="{{ $section->icono }}"></i> <span>{{ $section->section_text }}</span></a>
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
