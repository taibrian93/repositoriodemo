<?php

namespace App\Http\Controllers;

use App\Models\DistritoModel;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    //
    public function index_view ()
    {
        return view('pages.distrito.distrito-data', [
            'distrito' => DistritoModel::class
        ]);
    }
}
