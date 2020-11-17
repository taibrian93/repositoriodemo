<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProvinciaModel extends Model
{
    use HasFactory;

    protected $table = "provincia";
    //protected $primaryKey = "id";

    protected $fillable = ['idDepartamento','descripcion', 'codigoProvincial', 'codigo', 'estado'];

    public static function search($query)
    {
        return empty($query) ? static::query() : static::where('descripcion', 'like', '%'.$query.'%')->orWhere('codigoProvincial', 'like', '%'.$query.'%');
    }

    public function departamento(){
        return $this->belongsTo('App\Models\DepartamentoModel','idDepartamento','id');
    }

    public function distritos(){
        return $this->hasMany('App\Models\DistritoModel');
    }

    public function archivos(){
        return $this->hasMany('App\Models\RegistroArchivoModel');
    }
}
