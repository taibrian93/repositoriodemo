<?php

namespace App\Http\Livewire;

use App\Models\IdiomaModel;
use Livewire\Component;

class CreateIdioma extends Component
{
    public $action;
    public $button;
    public $idiomaId;
    public $idioma;

    protected function getRules()
    {
        
        $rules = ($this->action == "updateIdioma") ? [
            'idioma.iso_639_1' => 'required|unique:idioma,iso_639_1,' . $this->idiomaId,
            'idioma.codigo' => 'required|unique:idioma,codigo,' . $this->idiomaId
            //'idioma.idDublincore' => NULL
        ] : [
            //'idioma.descripcion' => 'required',
            //'idioma.observacion' => 'required', // livewire need this
            //'idioma.codigo' => 'required',
            //'idioma.estado' => 'required'
        ];

        return array_merge([
            
            'idioma.descripcion' => 'required|min:3',
            // 'idioma.observacion' => 'required',
            'idioma.iso_639_1' => 'required|unique:idioma,iso_639_1',
            'idioma.codigo' => 'required|unique:idioma,codigo',
            'idioma.estado' => 'required'
        ], $rules);
    }

    public function createIdioma ()
    {
        $this->resetErrorBag();
        $this->validate();

        // $password = $this->user['password'];

        // if ( !empty($password) ) {
        //     $this->user['password'] = Hash::make($password);
        // }

        IdiomaModel::create($this->idioma);

        $this->emit('saved');
        $this->reset('idioma');
    }

    public function updateIdioma ()
    {
        $this->resetErrorBag();
        $this->validate();

        IdiomaModel::query()->where('id',$this->idiomaId)->update($this->idioma);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!!$this->idiomaId) {
            $idioma = IdiomaModel::find($this->idiomaId);

            $this->idioma = [
                // "idDublincore" => $idioma->idDublincore,
                "descripcion" => $idioma->descripcion,
                "iso_639_1" => $idioma->iso_639_1,
                "codigo" => $idioma->codigo,
                "estado" => $idioma->estado,
            ];
        }


        $this->button = create_button($this->action, "Idioma");
    }

    public function render()
    {
        return view('livewire.create-idioma');
    }
}
