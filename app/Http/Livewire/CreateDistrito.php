<?php

namespace App\Http\Livewire;

use App\Models\DepartamentoModel;
use App\Models\DistritoModel;
use App\Models\ProvinciaModel;
use Livewire\Component;

class CreateDistrito extends Component
{

    public $action;
    public $button;
    public $distritoId;
    public $distrito;

    public $provinciaCodigo = '';
    public $distritoCodigo = '';

    public $departamentos;
    public $getDepartamentos;


    public $idProvincia;
    public $descripcion;
    public $codigoDistrital = '';
    public $codigo;
    public $estado;

    protected function getRules()
    {
        
        $rules = ($this->action == "updateDistrito") ? [
            //'departamento.iso_639_1' => 'required|unique:departamento,iso_639_1,' . $this->departamentoId,
            'distrito.codigoDistrital' => 'required|min:4|max:4|regex:/^[0-9]*$/|unique:distrito,codigoDistrital,' . $this->distritoId
            //'distrito.idDublincore' => NULL
        ] : [
            //'distrito.descripcion' => 'required',
            //'distrito.observacion' => 'required', // livewire need this
            //'distrito.codigo' => 'required',
            //'distrito.estado' => 'required'
        ];

        return array_merge([
            'distrito.idDepartamento' => 'required',
            'distrito.descripcion' => 'required|min:3',
            // 'distrito.observacion' => 'required',
            //'distrito.iso_639_1' => 'required|unique:distrito,iso_639_1',
            'distrito.codigoDistrital' => 'required|min:4|max:4|regex:/^[0-9]*$/|unique:distrito,codigoDistrital',
            'distrito.codigo' => 'required|min:2|max:2|regex:/^[0-9]*$/',
            'distrito.estado' => 'required'
        ], $rules);
    }

    public function createDistrito()
    {
        $this->resetErrorBag();
        $this->validate();

        // $password = $this->user['password'];

        // if ( !empty($password) ) {
        //     $this->user['password'] = Hash::make($password);
        // }

        DistritoModel::create($this->distrito);
        //dd($this->provincia);
        $this->emit('saved');
        $this->reset('distrito');
    }

    public function updateProvincia ()
    {
        $this->resetErrorBag();
        $this->validate();

        DistritoModel::query()->where('id',$this->provinciaId)->update($this->provincia);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!!$this->distritoId) {
            $distrito = DistritoModel::find($this->distritoId);

            $this->distrito = [
                // "idDublincore" => $distrito->idDublincore,
                "idProvincia" => $distrito->idProvincia,
                "descripcion" => $distrito->descripcion,
                "codigoDistrital" => $distrito->codigoDistrital,
                "codigo" => $distrito->codigo,
                "estado" => $distrito->estado,
            ];

            $this->distritoCodigo = $this->distrito["codigo"];

            // $this->idDepartamento = $distrito->idDepartamento;
            // $this->descripcion = $distrito->descripcion;
            // $this->codigodistritol = $distrito->codigodistritol;
            // $this->codigo = $distrito->codigo;
            // $this->estado = $distrito->estado;
        }
        
        //$this->distrito = ["codigodistritol" => $this->getCodigo()];
        //$this->distritos = $this->distritos();
        $this->button = create_button($this->action, "distrito");
    }

    public function departamentos(){
        $departamento = DepartamentoModel::all();
        return $this->getdepartamentos = $departamento;
    }

    public function getCodigo()
    {
        if ($this->departamentoCodigo != '') {
            //dd($this->departamentoCodigo);
            $provincia = ProvinciaModel::select('codigoDepartamental')->where('id','=',$this->departamentoCodigo)->first();
            //dd($departamento->codigoDepartamental);
            $codigoUbigeo = $provincia->codigoProvincial.''.$this->provinciaCodigo;
            //$provincia = ProvinciaModel::find($this->provinciaId);
            $this->provincia["codigoProvincial"] = $codigoUbigeo;
            //dd($this->codigoProvincial);
        }
        
        
    }

    public function render()
    {
        return view('livewire.create-distrito');
    }
}
