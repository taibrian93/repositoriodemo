<?php

namespace App\Http\Controllers;

use App\Models\RegistroArchivoModel;
use Illuminate\Http\Request;

class RegistroArchivoController extends Controller
{
    //
    public function index_view ()
    {
        return view('pages.registroArchivo.registroArchivo-data', [
            'registroArchivo' => RegistroArchivoModel::class
        ]);
    }
}
