<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistritoModel extends Model
{
    use HasFactory;

    protected $table = "distrito";

    protected $fillable = ['idProvincia','descripcion', 'codigoDistrital', 'codigo', 'estado'];

    public static function search($query)
    {
        return empty($query) ? static::query() : static::where('descripcion', 'like', '%'.$query.'%')->orWhere('codigoDistrital', 'like', '%'.$query.'%');
    }

    public function provincia(){
        return $this->belongsTo('App\Models\ProvinciaModel','idProvincia','id');
    }

    public function archivos(){
        return $this->hasMany('App\Models\RegistroArchivoModel');
    }
}
