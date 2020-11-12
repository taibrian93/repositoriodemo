<?php

namespace App\Http\Controllers;

use App\Models\TipoFormatoModel;
use Illuminate\Http\Request;

class TipoFormatoController extends Controller
{
    //
    public function index_view ()
    {
        return view('pages.tipoFormato.tipoFormato-data', [
            'tipoFormato' => TipoFormatoModel::class
        ]);
    }
}
