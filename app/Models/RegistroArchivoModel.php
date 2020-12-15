<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroArchivoModel extends Model
{
    use HasFactory;

    protected $table = "registroarchivo";
    //protected $primaryKey = "id";

    protected $fillable = ['idTipoDocumento','idIdioma','idDepartamento','idProvincia','idDistrito','idAutor','idDerecho','titulo', 'descripcion', 'enlace', 'mimeType', 'extensionArchivo', 'sizeFile', 'codigo','estado'];

    public static function search($query)
    {
        return empty($query) ? static::query() : static::where('descripcion', 'like', '%'.$query.'%')->orWhere('codigo', 'like', '%'.$query.'%');
    }

    public function departamento(){
        return $this->belongsTo('App\Models\DepartamentoModel','idDepartamento','id');
    }

    public function provincia(){
        return $this->belongsTo('App\Models\ProvinciaModel','idProvincia','id');
    }

    public function distrito(){
        return $this->belongsTo('App\Models\DistritoModel','idDistrito','id');
    }

    //autor
    public function user(){
        return $this->belongsTo('App\Models\User','idAutor','id');
    }

    public function documento(){
        return $this->belongsTo('App\Models\TipoDocumentoModel','idTipoDocumento','id');
    }

    // public function formato(){
    //     return $this->belongsTo('App\Models\TipoFormatoModel','idTipoFormato','id');
    // }

    public function idioma(){
        return $this->belongsTo('App\Models\IdiomaModel','idIdioma','id');
    }
    //nodo
    public function derecho(){
        return $this->belongsTo('App\Models\NodoModel','idDerecho','id');
    }
}
