<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;

class PetaController extends Controller
{
    public function index(){
        $query = Kecamatan::all();
        return view('peta', [
            'peta' => $query
        ]);
    }
}
