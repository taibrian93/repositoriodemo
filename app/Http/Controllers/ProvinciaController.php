<?php

namespace App\Http\Controllers;

use App\Models\ProvinciaModel;
use Illuminate\Http\Request;

class ProvinciaController extends Controller
{
    //
    public function index_view ()
    {
        return view('pages.provincia.provincia-data', [
            'provincia' => ProvinciaModel::class
        ]);
    }
}
