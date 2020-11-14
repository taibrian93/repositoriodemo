<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DepartamentoModel;

class DepartamentoController extends Controller
{
    //
    public function index_view ()
    {
        return view('pages.departamento.departamento-data', [
            'departamento' => DepartamentoModel::class
        ]);
    }
}
