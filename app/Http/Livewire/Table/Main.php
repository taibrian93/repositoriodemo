<?php

namespace App\Http\Livewire\Table;

use Livewire\Component;
use Livewire\WithPagination;

class Main extends Component
{
    use WithPagination;

    public $model;
    public $name;

    public $perPage = 10;
    public $sortField = "id";
    public $sortAsc = false;
    public $search = '';

    protected $listeners = [ "deleteItem" => "delete_item" ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = ! $this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function get_pagination_data ()
    {
        switch ($this->name) {

            case 'user':
                $users = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.user',
                    "users" => $users,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('user.new'),
                            'create_new_text' => 'Crear Usuario',
                            'export' => '#',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
            break;

            case 'tipoDocumento':
                $tipoDocumentos = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.tipoDocumento',
                    "tipoDocumentos" => $tipoDocumentos,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('tipoDocumento.new'),
                            'create_new_text' => 'Crear Tipo Documento',
                            'export' => '#',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
            break;

            case 'tipoFormato':
                $tipoFormatos = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.tipoFormato',
                    "tipoFormatos" => $tipoFormatos,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('tipoFormato.new'),
                            'create_new_text' => 'Crear Tipo Formato',
                            'export' => '#',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
            break;

            case 'idioma':
                $idiomas = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.idioma',
                    "idiomas" => $idiomas,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('idioma.new'),
                            'create_new_text' => 'Crear Idioma',
                            'export' => '#',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
            break;

            case 'nodo':
                $nodos = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.nodo',
                    "nodos" => $nodos,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('nodo.new'),
                            'create_new_text' => 'Crear nodo',
                            'export' => '#',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
            break;

            case 'departamento':
                $departamentos = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.departamento',
                    "departamentos" => $departamentos,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('departamento.new'),
                            'create_new_text' => 'Crear departamento',
                            'export' => '#',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
            break;

            case 'provincia':
                $provincias = $this->model::search($this->search)
                    ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                    ->paginate($this->perPage);

                return [
                    "view" => 'livewire.table.provincia',
                    "provincias" => $provincias,
                    "data" => array_to_object([
                        'href' => [
                            'create_new' => route('provincia.new'),
                            'create_new_text' => 'Crear provincia',
                            'export' => '#',
                            'export_text' => 'Exportar'
                        ]
                    ])
                ];
            break;

            default:
                # code...
            break;
        }
    }

    public function delete_item ($id)
    {
        $data = $this->model::find($id);

        if (!$data) {
            $this->emit("deleteResult", [
                "status" => false,
                "message" => "Gagal menghapus data " . $this->name
            ]);
            return;
        }

        $data->delete();
        $this->emit("deleteResult", [
            "status" => true,
            //"message" => "Data " . $this->name . " berhasil dihapus!"
        ]);
    }

    public function render()
    {
        $data = $this->get_pagination_data();

        return view($data['view'], $data);
    }
}
