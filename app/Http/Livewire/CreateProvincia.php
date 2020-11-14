<?php

namespace App\Http\Livewire;

use App\Models\ProvinciaModel;
use Livewire\Component;

class CreateProvincia extends Component
{

    public $action;
    public $button;
    public $provinciaId;
    public $provincia;

    protected function getRules()
    {
        
        $rules = ($this->action == "updateProvincia") ? [
            //'departamento.iso_639_1' => 'required|unique:departamento,iso_639_1,' . $this->departamentoId,
            'provincia.codigoProvincia' => 'required|unique:provincia,codigoProvincia,' . $this->provinciaId
            //'provincia.idDublincore' => NULL
        ] : [
            //'provincia.descripcion' => 'required',
            //'provincia.observacion' => 'required', // livewire need this
            //'provincia.codigo' => 'required',
            //'provincia.estado' => 'required'
        ];

        return array_merge([
            
            'provincia.descripcion' => 'required|min:3',
            // 'provincia.observacion' => 'required',
            //'provincia.iso_639_1' => 'required|unique:provincia,iso_639_1',
            'provincia.codigoProvincial' => 'required|unique:provincia,codigoProvincial',
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
                "descripcion" => $provincia->descripcion,
                "codigoDepartamental" => $provincia->codigoDepartamental,
                //"codigo" => $provincia->codigo,
                "estado" => $provincia->estado,
            ];
        }


        $this->button = create_button($this->action, "Provincia");
    }

    public function render()
    {
        return view('livewire.create-provincia');
    }
}
