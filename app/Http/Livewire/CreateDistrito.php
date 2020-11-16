<?php

namespace App\Http\Livewire;

use App\Models\DepartamentoModel;
use App\Models\DistritoModel;
use App\Models\ProvinciaModel;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use PhpParser\Node\Stmt\ElseIf_;

class CreateDistrito extends Component
{

    public $action;
    public $button;
    public $distritoId;
    public $distrito;

    public $departamentoCodigo = '';
    public $provinciaCodigo = '';

    public $distritoCodigo = '';

    public $departamentos;
    public $getDepartamentos;

    public $provincias;
    public $getprovincias;


    public $idProvincia;
    public $descripcion;
    public $codigoDistrital = '';
    public $codigoDepartamental = '';
    public $codigoProvincial = '';
    public $codigo;
    public $estado;

    protected function getRules()
    {
        
        $rules = ($this->action == "updateDistrito") ? [
            //'departamento.iso_639_1' => 'required|unique:departamento,iso_639_1,' . $this->departamentoId,
            'distrito.codigoDistrital' => 'required|min:6|max:6|regex:/^[0-9]*$/|unique:distrito,codigoDistrital,' . $this->distritoId
            //'distrito.idDublincore' => NULL
        ] : [
            //'distrito.descripcion' => 'required',
            //'distrito.observacion' => 'required', // livewire need this
            //'distrito.codigo' => 'required',
            //'distrito.estado' => 'required'
        ];

        return array_merge([
            'distrito.idDepartamento' => 'required',
            'distrito.idProvincia' => 'required',
            'distrito.descripcion' => 'required|min:3',
            // 'distrito.observacion' => 'required',
            //'distrito.iso_639_1' => 'required|unique:distrito,iso_639_1',
            'distrito.codigoDistrital' => 'required|min:6|max:6|regex:/^[0-9]*$/|unique:distrito,codigoDistrital',
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
        unset($this->distrito['idDepartamento']);
        //dd($this->distrito);
 
        $this->emit('saved');
        $this->reset('distrito');
    }

    public function updateDistrito ()
    {
        $this->resetErrorBag();
        $this->validate();
        
        $updateDistrito = $this->distrito;
        unset($updateDistrito['idDepartamento']);
        DistritoModel::query()->where('id',$this->distritoId)->update($updateDistrito);

        $this->emit('saved');
    }

    public function mount ()
    {
        $this->departamentos = $this->departamentos();

        if (!!$this->distritoId) {
            $distrito = DB::table('distrito')
                        ->select('distrito.id','distrito.idProvincia','distrito.descripcion','distrito.codigoDistrital','distrito.codigo','distrito.estado','provincia.idDepartamento')
                        ->leftJoin('provincia', 'distrito.idProvincia', '=', 'provincia.id')
                        ->where('distrito.id','=',$this->distritoId)
                        ->first();
            //dd($distrito);

            $departamento = DepartamentoModel::select('id','codigoDepartamental')->where('id','=',$distrito->idDepartamento)->first();
            //dd($departamento);
            $this->departamentoCodigo = $departamento->codigoDepartamental;
            $this->codigoDepartamental = $departamento->codigoDepartamental;

            $provincia = ProvinciaModel::select('id','codigo')->where('id','=',$distrito->idProvincia)->first();
            $this->provinciaCodigo = $provincia->codigo;
            $this->codigoProvincial = $provincia->codigo;

            $this->distrito = [
 
                "idDepartamento" => $distrito->idDepartamento,
                "idProvincia" => $distrito->idProvincia,
                "descripcion" => $distrito->descripcion,
                "codigoDistrital" => $distrito->codigoDistrital,
                "codigo" => $distrito->codigo,
                "estado" => $distrito->estado,
            ];

            $this->provincias = $this->getListaProvincia($distrito->idDepartamento);

            $this->distritoCodigo = $this->distrito["codigo"];

        }
        
        $this->button = create_button($this->action, "distrito");
    }

    public function departamentos(){
        $departamento = DepartamentoModel::all();
        return $this->getdepartamentos = $departamento;
    }

    public function provincias(){
        $provincia = ProvinciaModel::all();
        return $this->getprovincias = $provincia;
    }

    public function getListaProvincia($id){
        return $provincia = ProvinciaModel::where('idDepartamento',$id)->get();
    }

    public function getCodigoDepartamento()
    {
        $this->codigoProvincial = '';
        if ($this->departamentoCodigo != '') {

            $departamento = DepartamentoModel::select('id','codigoDepartamental')->where('id','=',$this->departamentoCodigo)->first();
            $provincia = ProvinciaModel::where('idDepartamento',$departamento->id)->get();
            $this->provincias = $provincia;
            
            $this->codigoDepartamental = $departamento->codigoDepartamental;
            $codigoUbigeo = $this->codigoDepartamental.''.$this->codigoProvincial.''.$this->distritoCodigo;
            $this->distrito["codigoDistrital"] = $codigoUbigeo;
        } 
        else
        {
            $this->codigoDepartamental = '';
            $this->provincias = NULL;
            $codigoUbigeo = $this->codigoDepartamental.''.$this->codigoProvincial.''.$this->distritoCodigo;
            $this->distrito["codigoDistrital"] = $codigoUbigeo;
        }
    }

    public function getCodigoProvincia(){
        if ($this->provinciaCodigo != '') {
            $provincia = ProvinciaModel::select('id','codigo')->where('id','=',$this->provinciaCodigo)->first();
            $this->codigoProvincial = $provincia->codigo;
            $codigoUbigeo = $this->codigoDepartamental.''.$this->codigoProvincial.''.$this->distritoCodigo;
            //dd($codigoUbigeo);
            $this->distrito["codigoDistrital"] = $codigoUbigeo;
        }
        else
        {
            $this->codigoDistrital = '';
            $codigoUbigeo = $this->codigoDepartamental.''.$this->codigoProvincial.''.$this->distritoCodigo;
            $this->distrito["codigoDistrital"] = $codigoUbigeo;
        }
    }

    public function getCodigoDistrito(){
        if ($this->provinciaCodigo != '' || $this->departamentoCodigo != '') {
            $codigoUbigeo = $this->codigoDepartamental.''.$this->codigoProvincial.''.$this->distritoCodigo;
            //dd($codigoUbigeo);
            $this->distrito["codigoDistrital"] = $codigoUbigeo;
        }
    }

    public function render()
    {
        return view('livewire.create-distrito');
    }
}
