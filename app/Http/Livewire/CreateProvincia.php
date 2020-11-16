<?php

namespace App\Http\Livewire;

use App\Models\DepartamentoModel;
use App\Models\ProvinciaModel;
use Livewire\Component;

class CreateProvincia extends Component
{

    public $action;
    public $button;
    public $provinciaId;
    public $provincia;

    public $departamentoCodigo = '';
    public $provinciaCodigo = '';

    public $departamentos;
    public $getDepartamentos;


    public $idDepartamento;
    public $descripcion;
    public $codigoProvincial = '';
    public $codigo;
    public $estado;

    protected function getRules()
    {
        
        $rules = ($this->action == "updateProvincia") ? [
            //'departamento.iso_639_1' => 'required|unique:departamento,iso_639_1,' . $this->departamentoId,
            'provincia.codigoProvincial' => 'required|min:4|max:4|regex:/^[0-9]*$/|unique:provincia,codigoProvincial,' . $this->provinciaId
            //'provincia.idDublincore' => NULL
        ] : [
            //'provincia.descripcion' => 'required',
            //'provincia.observacion' => 'required', // livewire need this
            //'provincia.codigo' => 'required',
            //'provincia.estado' => 'required'
        ];

        return array_merge([
            'provincia.idDepartamento' => 'required',
            'provincia.descripcion' => 'required|min:3',
            // 'provincia.observacion' => 'required',
            //'provincia.iso_639_1' => 'required|unique:provincia,iso_639_1',
            'provincia.codigoProvincial' => 'required|min:4|max:4|regex:/^[0-9]*$/|unique:provincia,codigoProvincial',
            'provincia.codigo' => 'required|min:2|max:2|regex:/^[0-9]*$/',
            'provincia.estado' => 'required'
        ], $rules);
    }

    public function createProvincia ()
    {
        $this->resetErrorBag();
        $this->validate();

        // $password = $this->user['password'];

        // if ( !empty($password) ) {
        //     $this->user['password'] = Hash::make($password);
        // }

        ProvinciaModel::create($this->provincia);
        //dd($this->provincia);
        $this->emit('saved');
        $this->reset('provincia');
    }

    public function updateProvincia ()
    {
        $this->resetErrorBag();
        $this->validate();

        ProvinciaModel::query()->where('id',$this->provinciaId)->update($this->provincia);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!!$this->provinciaId) {
            $provincia = ProvinciaModel::find($this->provinciaId);

            $this->provincia = [
                // "idDublincore" => $provincia->idDublincore,
                "idDepartamento" => $provincia->idDepartamento,
                "descripcion" => $provincia->descripcion,
                "codigoProvincial" => $provincia->codigoProvincial,
                "codigo" => $provincia->codigo,
                "estado" => $provincia->estado,
            ];

            $this->provinciaCodigo = $this->provincia["codigo"];

            // $this->idDepartamento = $provincia->idDepartamento;
            // $this->descripcion = $provincia->descripcion;
            // $this->codigoProvincial = $provincia->codigoProvincial;
            // $this->codigo = $provincia->codigo;
            // $this->estado = $provincia->estado;
        }
        
        //$this->provincia = ["codigoProvincial" => $this->getCodigo()];
        $this->departamentos = $this->departamentos();
        $this->button = create_button($this->action, "Provincia");
    }

    public function departamentos(){
        $departamento = DepartamentoModel::all();
        return $this->getDepartamentos = $departamento;
    }

    public function getCodigo()
    {
        if ($this->departamentoCodigo != '') {
            //dd($this->departamentoCodigo);
            $departamento = DepartamentoModel::select('codigoDepartamental')->where('id','=',$this->departamentoCodigo)->first();
            //dd($departamento->codigoDepartamental);
            $codigoUbigeo = $departamento->codigoDepartamental.''.$this->provinciaCodigo;
            //$provincia = ProvinciaModel::find($this->provinciaId);
            $this->provincia["codigoProvincial"] = $codigoUbigeo;
            //dd($this->codigoProvincial);
        }
        
        
    }

    public function render()
    {
        return view('livewire.create-provincia');
    }
}
