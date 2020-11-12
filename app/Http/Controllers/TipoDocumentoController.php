<?php

namespace App\Http\Controllers;

use App\Models\TipoDocumentoModel;
use Illuminate\Http\Request;

class TipoDocumentoController extends Controller
{
    //
    public function index_view ()
    {
        return view('pages.tipoDocumento.tipoDocumento-data', [
            'tipoDocumento' => TipoDocumentoModel::class
        ]);
    }
}
