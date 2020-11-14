<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\DepartamentoModel;

class CreateDepartamento extends Component
{

    public $action;
    public $button;
    public $departamentoId;
    public $departamento;

    protected function getRules()
    {
        
        $rules = ($this->action == "updateDepartamento") ? [
            //'departamento.iso_639_1' => 'required|unique:departamento,iso_639_1,' . $this->departamentoId,
            'departamento.codigoDepartamental' => 'required|unique:departamento,codigoDepartamental,' . $this->departamentoId
            //'departamento.idDublincore' => NULL
        ] : [
            //'departamento.descripcion' => 'required',
            //'departamento.observacion' => 'required', // livewire need this
            //'departamento.codigo' => 'required',
            //'departamento.estado' => 'required'
        ];

        return array_merge([
            
            'departamento.descripcion' => 'required|min:3',
            // 'departamento.observacion' => 'required',
            //'departamento.iso_639_1' => 'required|unique:departamento,iso_639_1',
            'departamento.codigoDepartamental' => 'required|unique:departamento,codigoDepartamental',
            'departamento.estado' => 'required'
        ], $rules);
    }

    public function createDepartamento ()
    {
        $this->resetErrorBag();
        $this->validate();

        // $password = $this->user['password'];

        // if ( !empty($password) ) {
        //     $this->user['password'] = Hash::make($password);
        // }

        DepartamentoModel::create($this->departamento);
        //dd($this->departamento);
        $this->emit('saved');
        $this->reset('departamento');
    }

    public function updateDepartamento ()
    {
        $this->resetErrorBag();
        $this->validate();

        DepartamentoModel::query()->where('id',$this->departamentoId)->update($this->departamento);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!!$this->departamentoId) {
            $departamento = DepartamentoModel::find($this->departamentoId);

            $this->departamento = [
                // "idDublincore" => $departamento->idDublincore,
                "descripcion" => $departamento->descripcion,
                "codigoDepartamental" => $departamento->codigoDepartamental,
                //"codigo" => $departamento->codigo,
                "estado" => $departamento->estado,
            ];
        }


        $this->button = create_button($this->action, "Departamento");
    }

    public function render()
    {
        return view('livewire.create-departamento');
    }
}
