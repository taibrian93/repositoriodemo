<?php

namespace App\Http\Livewire;

use App\Models\TipoFormatoModel;
use Livewire\Component;

class CreateTipoFormato extends Component
{
    public $tipoFormato;
    public $tipoFormatoId;
    public $action;
    public $button;

    protected function getRules()
    {
        
        $rules = ($this->action == "updateTipoFormato") ? [
            
            'tipoFormato.codigo' => 'required|unique:tipoformato,codigo,' . $this->tipoFormatoId
            //'tipoFormato.idDublincore' => NULL
        ] : [
            //'tipoFormato.descripcion' => 'required',
            //'tipoFormato.observacion' => 'required', // livewire need this
            //'tipoFormato.codigo' => 'required',
            //'tipoFormato.estado' => 'required'
        ];

        return array_merge([
            
            'tipoFormato.descripcion' => 'required|min:3',
            'tipoFormato.observacion' => 'required',
            'tipoFormato.codigo' => 'required|unique:tipoformato,codigo',
            'tipoFormato.estado' => 'required'
        ], $rules);
    }

    public function createTipoFormato ()
    {
        $this->resetErrorBag();
        $this->validate();

        // $password = $this->user['password'];

        // if ( !empty($password) ) {
        //     $this->user['password'] = Hash::make($password);
        // }

        TipoFormatoModel::create($this->tipoFormato);

        $this->emit('saved');
        $this->reset('tipoFormato');
    }

    public function updateTipoFormato ()
    {
        $this->resetErrorBag();
        $this->validate();

        TipoFormatoModel::query()->where('id',$this->tipoFormatoId)->update($this->tipoFormato);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!!$this->tipoFormatoId) {
            $tipoFormato = TipoFormatoModel::find($this->tipoFormatoId);

            $this->tipoFormato = [
                // "idDublincore" => $tipoFormato->idDublincore,
                "descripcion" => $tipoFormato->descripcion,
                "observacion" => $tipoFormato->observacion,
                "codigo" => $tipoFormato->codigo,
                "estado" => $tipoFormato->estado,
            ];
        }


        $this->button = create_button($this->action, "Tipo Formato");
    }

    public function render()
    {
        return view('livewire.create-tipo-formato');
    }
}
