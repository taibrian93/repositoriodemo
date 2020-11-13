<?php

namespace App\Http\Controllers;

use App\Models\NodoModel;
use Illuminate\Http\Request;

class NodoController extends Controller
{
    //
    public function index_view ()
    {
        return view('pages.nodo.nodo-data', [
            'nodo' => NodoModel::class
        ]);
    }
}
