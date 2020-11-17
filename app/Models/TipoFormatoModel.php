<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFormatoModel extends Model
{
    use HasFactory;

    protected $table = "tipoformato";

    protected $fillable = ['descripcion', 'observacion', 'codigo', 'estado',];

    public static function search($query)
    {
        return empty($query) ? static::query() : static::where('descripcion', 'like', '%'.$query.'%')->orWhere('codigo', 'like', '%'.$query.'%');
    }

    public function archivos(){
        return $this->hasMany('App\Models\RegistroArchivoModel');
    }
}
