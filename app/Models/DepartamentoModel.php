<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentoModel extends Model
{
    use HasFactory;

    protected $table = "departamento";
    //protected $primaryKey = "id";

    protected $fillable = ['descripcion', 'codigoDepartamental', 'estado'];

    public static function search($query)
    {
        return empty($query) ? static::query() : static::where('descripcion', 'like', '%'.$query.'%')->orWhere('codigoDepartamental', 'like', '%'.$query.'%');
    }

    public function provincias(){
        return $this->hasMany('App\Models\ProvinciaModel');
    }

    public function archivos(){
        return $this->hasMany('App\Models\RegistroArchivoModel');
    }
}
