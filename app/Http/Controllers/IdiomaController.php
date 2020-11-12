<?php

namespace App\Http\Controllers;

use App\Models\IdiomaModel;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    //
    public function index_view ()
    {
        return view('pages.idioma.idioma-data', [
            'idioma' => IdiomaModel::class
        ]);
    }
}
