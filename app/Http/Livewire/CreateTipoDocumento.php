<?php

namespace App\Http\Livewire;

use App\Models\TipoDocumentoModel;
use Livewire\Component;

class CreateTipoDocumento extends Component
{
    public $action;
    public $button;
    public $tipoDocumentoId;
    public $tipoDocumento;
    

    protected function getRules()
    {
        
        $rules = ($this->action == "updateTipoDocumento") ? [
            
            'tipoDocumento.codigo' => 'required|unique:tipodocumento,codigo,' . $this->tipoDocumentoId
            //'tipoDocumento.idDublincore' => NULL
        ] : [
            //'tipoDocumento.descripcion' => 'required',
            //'tipoDocumento.observacion' => 'required', // livewire need this
            //'tipoDocumento.codigo' => 'required',
            //'tipoDocumento.estado' => 'required'
        ];

        return array_merge([
            
            'tipoDocumento.descripcion' => 'required|min:3',
            'tipoDocumento.observacion' => 'required',
            'tipoDocumento.codigo' => 'required|unique:tipodocumento,codigo',
            'tipoDocumento.estado' => 'required'
        ], $rules);
    }

    public function createTipoDocumento ()
    {
        $this->resetErrorBag();
        $this->validate();

        // $password = $this->user['password'];

        // if ( !empty($password) ) {
        //     $this->user['password'] = Hash::make($password);
        // }

        TipoDocumentoModel::create($this->tipoDocumento);

        $this->emit('saved');
        $this->reset('tipoDocumento');
    }

    public function updateTipoDocumento ()
    {
        $this->resetErrorBag();
        $this->validate();

        TipoDocumentoModel::query()->where('id',$this->tipoDocumentoId)->update($this->tipoDocumento);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!!$this->tipoDocumentoId) {
            $tipoDocumento = TipoDocumentoModel::find($this->tipoDocumentoId);

            $this->tipoDocumento = [
                // "idDublincore" => $tipoDocumento->idDublincore,
                "descripcion" => $tipoDocumento->descripcion,
                "observacion" => $tipoDocumento->observacion,
                "codigo" => $tipoDocumento->codigo,
                "estado" => $tipoDocumento->estado,
            ];
        }


        $this->button = create_button($this->action, "Tipo Documento");
    }


    public function render()
    {
        return view('livewire.create-tipo-documento');
    }
}
