<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdiomaModel extends Model
{
    use HasFactory;

    protected $table = "idioma";

    protected $fillable = ['descripcion', 'iso_639_1', 'codigo', 'estado',];

    public static function search($query)
    {
        return empty($query) ? static::query() : static::where('descripcion', 'like', '%'.$query.'%')->orWhere('codigo', 'like', '%'.$query.'%')->orWhere('iso_639_1', 'like', '%'.$query.'%');
    }
}
