<?php

namespace App\Http\Livewire;

use App\Models\NodoModel;
use Livewire\Component;

class CreateNodo extends Component
{
    public $action;
    public $button;
    public $nodoId;
    public $nodo;

    protected function getRules()
    {
        
        $rules = ($this->action == "updateNodo") ? [
            //'nodo.iso_639_1' => 'required|unique:nodo,iso_639_1,' . $this->nodoId,
            'nodo.codigo' => 'required|unique:nodo,codigo,' . $this->nodoId
            //'nodo.idDublincore' => NULL
        ] : [
            //'nodo.descripcion' => 'required',
            //'nodo.observacion' => 'required', // livewire need this
            //'nodo.codigo' => 'required',
            //'nodo.estado' => 'required'
        ];

        return array_merge([
            
            'nodo.descripcion' => 'required|min:3',
            // 'nodo.observacion' => 'required',
            'nodo.observacion' => 'required',
            'nodo.codigo' => 'required|unique:nodo,codigo',
            'nodo.estado' => 'required'
        ], $rules);
    }

    public function createNodo ()
    {
        $this->resetErrorBag();
        $this->validate();

        // $password = $this->user['password'];

        // if ( !empty($password) ) {
        //     $this->user['password'] = Hash::make($password);
        // }

        NodoModel::create($this->nodo);

        $this->emit('saved');
        $this->reset('nodo');
    }

    public function updateNodo ()
    {
        $this->resetErrorBag();
        $this->validate();

        NodoModel::query()->where('id',$this->nodoId)->update($this->nodo);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!!$this->nodoId) {
            $nodo = NodoModel::find($this->nodoId);

            $this->nodo = [
                // "idDublincore" => $nodo->idDublincore,
                "descripcion" => $nodo->descripcion,
                "observacion" => $nodo->observacion,
                "codigo" => $nodo->codigo,
                "estado" => $nodo->estado,
            ];
        }


        $this->button = create_button($this->action, "Nodo");
    }

    public function render()
    {
        return view('livewire.create-nodo');
    }
}
