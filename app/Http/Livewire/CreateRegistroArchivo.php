<?php

namespace App\Http\Livewire;


use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\DepartamentoModel;
use App\Models\DistritoModel;
use App\Models\IdiomaModel;
use App\Models\NodoModel;
use App\Models\ProvinciaModel;
use App\Models\RegistroArchivoModel;
use App\Models\TipoDocumentoModel;
use App\Models\TipoFormatoModel;
use App\Models\User;

class CreateRegistroArchivo extends Component
{
    use WithFileUploads;

    public $action;
    public $button;
    public $registroArchivoId;
    public $registroArchivo;

    public $tipoDocumentos;
    public $tipoDocumentoCodigo;
    public $codigoTipoDocumento = '';

    public $tipoFormatos;
    public $tipoFormatoCodigo;
    public $codigoTipoFormato = '';

    public $idiomas;
    public $idiomaCodigo;
    public $codigoIdioma = '';

    //usuarios
    public $autores;
    public $autorCodigo;
    //nodos
    public $derechos;
    public $derechoCodigo;
    public $codigoDerecho = '';
    
    public $departamentos;
    public $getDepartamentos;
    public $departamentoCodigo = '';
    public $codigoDepartamental = '';

    public $provincias;
    public $provinciaCodigo = '';
    public $codigoProvincial = '';

    public $distritos;
    public $distritoCodigo = '';
    public $codigoDistrital = '';
    

    protected function getRules()
    {
        
        $rules = ($this->action == "updateRegistroArchivo") ? [
            //'departamento.iso_639_1' => 'required|unique:departamento,iso_639_1,' . $this->departamentoId,
            'registroArchivo.codigo' => 'required|min:12|regex:/^[0-9]*$/|unique:registroArchivo,codigo,' . $this->registroArchivoId
            //'registroArchivo.idDublincore' => NULL
        ] : [
            //'registroArchivo.descripcion' => 'required',
            //'registroArchivo.observacion' => 'required', // livewire need this
            //'registroArchivo.codigo' => 'required',
            //'registroArchivo.estado' => 'required'
        ];

        return array_merge([
            'registroArchivo.idTipoDocumento' => 'required',
            'registroArchivo.idTipoFormato' => 'required',
            'registroArchivo.idIdioma' => 'required',
            'registroArchivo.idDepartamento' => 'required',
            'registroArchivo.idProvincia' => 'required',
            'registroArchivo.idDistrito' => 'required',
            'registroArchivo.idAutor' => 'required',
            'registroArchivo.idDerecho' => 'required',
            'registroArchivo.titulo' => 'required',
            'registroArchivo.descripcion' => 'required|min:3',
            'registroArchivo.enlace' => 'required',
            // 'registroArchivo.observacion' => 'required',
            //'registroArchivo.iso_639_1' => 'required|unique:registroArchivo,iso_639_1',
            'registroArchivo.codigo' => 'required|min:12|regex:/^[0-9]*$/|unique:registroArchivo,codigo',
            'registroArchivo.estado' => 'required'
        ], $rules);
    }

    public function createRegistroArchivo()
    {
        $this->resetErrorBag();
        $this->validate();

        // $password = $this->user['password'];

        // if ( !empty($password) ) {
        //     $this->user['password'] = Hash::make($password);
        // }

        
        
        if (!empty($this->registroArchivo['enlace'])) {
            $this->registroArchivo['enlace']->store('public/archivos');
        }
        $this->registroArchivo['enlace'] = $this->registroArchivo['enlace']->hashName();
        RegistroArchivoModel::create($this->registroArchivo);

        $this->emit('saved');
        $this->reset('registroArchivo');
    }

    public function updateRegistroArchivo ()
    {
        $this->resetErrorBag();
        $this->validate();
        
        $updateRegistroArchivo = $this->registroArchivo;
        //unset($updateRegistroArchivo['idDepartamento']);
        RegistroArchivoModel::query()->where('id',$this->registroArchivoId)->update($this->registroArchivo);

        $this->emit('saved');
    }

    public function mount ()
    {
        $this->departamentos = DepartamentoModel::all();
        $this->tipoDocumentos = TipoDocumentoModel::all();
        $this->tipoFormatos = TipoFormatoModel::all();
        $this->idiomas = IdiomaModel::all();
        $this->autores = User::all();
        $this->derechos = NodoModel::all();

        if (!!$this->registroArchivoId) {

            $registroArchivo = DB::table('registroarchivo')
            ->select('tipodocumento.codigo as cTD','tipoformato.codigo as cTF','tipoformato.codigo as cTF','idioma.codigo as cID','departamento.codigoDepartamental as cDP','provincia.codigo as cPR','distrito.codigo as cDI','nodo.codigo as cNO','registroarchivo.*')
            ->leftJoin('tipodocumento', 'registroarchivo.idTipoDocumento', '=', 'tipodocumento.id')
            ->leftJoin('tipoformato', 'registroarchivo.idTipoFormato', '=', 'tipoformato.id')
            ->leftJoin('idioma', 'registroarchivo.idIdioma', '=', 'idioma.id')
            ->leftJoin('departamento', 'registroarchivo.idDepartamento', '=', 'departamento.id')
            ->leftJoin('provincia', 'registroarchivo.idProvincia', '=', 'provincia.id')
            ->leftJoin('distrito', 'registroarchivo.idDistrito', '=', 'distrito.id')
            ->leftJoin('nodo', 'registroarchivo.idDerecho', '=', 'nodo.id')
            ->where('registroarchivo.id','=',$this->registroArchivoId)
            ->first();

            //dd($registroArchivo);

            $this->departamentoCodigo = $registroArchivo->idDepartamento;
            $this->codigoDepartamental = $registroArchivo->cDP;

            $provincia = ProvinciaModel::where('idDepartamento',$registroArchivo->idDepartamento)->get();
            $this->provincias = $provincia;
            $this->provinciaCodigo = $registroArchivo->idProvincia;
            $this->codigoProvincial = $registroArchivo->cPR;
            
            $distrito = DistritoModel::where('idProvincia',$registroArchivo->idProvincia)->get();
            $this->distritos = $distrito;
            $this->distritoCodigo = $registroArchivo->idDistrito;
            $this->codigodistrital = $registroArchivo->cDI;

            $this->codigoTipoDocumento = $registroArchivo->cTD;
            $this->codigoTipoFormato = $registroArchivo->cTF;
            $this->codigoIdioma = $registroArchivo->cID;
            // $this->autorCodigo = $registroArchivo->c;
            $this->codigoDerecho = $registroArchivo->cNO;

            $this->registroArchivo = [
                'idTipoDocumento' => $registroArchivo->idTipoDocumento,
                'idTipoFormato' => $registroArchivo->idTipoFormato,
                'idIdioma' => $registroArchivo->idIdioma,
                'idDepartamento' => $registroArchivo->idDepartamento,
                'idProvincia' => $registroArchivo->idProvincia,
                'idDistrito' => $registroArchivo->idDistrito,
                'idAutor' => $registroArchivo->idAutor,
                'idDerecho' => $registroArchivo->idDerecho,
                'titulo' => $registroArchivo->titulo,
                'descripcion' => $registroArchivo->descripcion,
                'enlace' => $registroArchivo->enlace,
                'codigo' => $registroArchivo->codigo,
                'estado' => $registroArchivo->estado,

            ];

        }
        
        $this->button = create_button($this->action, "registroArchivo");
    }

    // public function departamentos(){
    //     return $departamentos = DepartamentoModel::all();  
    // }

    // public function tiposDocumentos(){
    //     return $tipoDocumentos = TipoDocumentoModel::all();  
    // }

    // public function tiposFormatos(){
    //     return $tipoFormatos = TipoFormatoModel::all();  
    // }

    // public function idiomas(){
    //     return $idiomas = IdiomaModel::all();  
    // }

    // public function autores(){
    //     return $autores = User::all();  
    // }

    // public function nodos(){
    //     return $nodos = NodoModel::all();  
    // }

    public function getCodigoDepartamento()
    {
        $this->codigoProvincial = '';
        if ($this->departamentoCodigo != '') {

            $departamento = DepartamentoModel::select('id','codigoDepartamental')->where('id','=',$this->departamentoCodigo)->first();
            $provincia = ProvinciaModel::where('idDepartamento',$departamento->id)->get();
            $this->provincias = $provincia;
            
            $this->codigoDepartamental = $departamento->codigoDepartamental;
            $codigoCobertura = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigoCobertura;
        } 
        else
        {
            $this->codigoDepartamental = '';
            $this->provincias = NULL;
            $codigoCobertura = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigoCobertura;
        }
    }

    public function getCodigoProvincia(){
        $this->codigoDistrital = '';
        if ($this->provinciaCodigo != '') {
            
            $provincia = ProvinciaModel::select('id','codigo')->where('id','=',$this->provinciaCodigo)->first();
            $distrito = DistritoModel::where('idProvincia',$provincia->id)->get();
            //dd($distrito);
            $this->distritos = $distrito;
            
            $this->codigoProvincial = $provincia->codigo;
            $codigoCobertura = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            //dd($codigoCobertura);
            $this->registroArchivo["codigo"] = $codigoCobertura;
        }
        else
        {
            $this->codigoProvincial = '';
            $codigoCobertura = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigoCobertura;
        }
    }

    public function getCodigoDistrito(){
        if ($this->distritoCodigo != '') {
            $distrito = DistritoModel::select('id','codigo')->where('id','=',$this->distritoCodigo)->first();
            $this->codigoDistrital = $distrito->codigo;

            $codigoCobertura = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigoCobertura;
        }
        else
        {
            $this->codigoDistrital = '';
            $codigoCobertura = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigoCobertura;
        }
    }

    public function getCodigoTipoDocumento(){
        if ($this->tipoDocumentoCodigo != '') {
            $tipoDocumento = TipoDocumentoModel::select('id','codigo')->where('id','=',$this->tipoDocumentoCodigo)->first();
            $this->codigoTipoDocumento = $tipoDocumento->codigo;

            $codigo = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigo;
        }
        else
        {
            $this->codigoTipoDocumento = '';
            $codigo = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigo;
        }
    }

    public function getCodigoTipoFormato(){
        if ($this->tipoFormatoCodigo != '') {
            $tipoFormato = TipoFormatoModel::select('id','codigo')->where('id','=',$this->tipoFormatoCodigo)->first();
            $this->codigoTipoFormato = $tipoFormato->codigo;

            $codigo = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigo;
        }
        else
        {
            $this->codigoTipoFormato = '';
            $codigo = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigo;
        }
    }

    public function getCodigoIdioma(){
        if ($this->idiomaCodigo != '') {
            $idioma = IdiomaModel::select('id','codigo')->where('id','=',$this->idiomaCodigo)->first();
            $this->codigoIdioma = $idioma->codigo;

            $codigo = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigo;
        }
        else
        {
            $this->codigoIdioma = '';
            $codigo = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigo;
        }
    }

    // public function getCodigoAutor(){
    //     if ($this->autorCodigo != '') {
            
    //     }
    //     else
    //     {
            
    //     }
    // }


    //NODOS
    public function getCodigoDerecho(){
        if ($this->derechoCodigo != '') {
            $nodo = NodoModel::select('id','codigo')->where('id','=',$this->derechoCodigo)->first();
            $this->codigoDerecho = $nodo->codigo;

            $codigo = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigo;
        }
        else
        {
            $this->codigoDerecho = '';
            $codigo = $this->codigoTipoDocumento.''.$this->codigoTipoFormato.''.$this->codigoIdioma.''.$this->codigoDepartamental.''.$this->codigoProvincial.''.$this->codigoDistrital.''.$this->codigoDerecho;
            $this->registroArchivo["codigo"] = $codigo;
        }
    }
    
    public function render()
    {
        return view('livewire.create-registro-archivo');
    }
}
