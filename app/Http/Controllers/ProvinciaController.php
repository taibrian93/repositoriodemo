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

    // public function getProvincia(Request $request){
    //     $provincia = ProvinciaModel::where('idDepartamento',$request->idDepartamento)->get();
    //     echo json_encode($provincia);
    // }
}
