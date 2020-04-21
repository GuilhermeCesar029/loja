<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index(){
        return view('cadastro.index');
    }

    public function cadastrar(Request $request){
        $teste = $request->all();
        dd($teste);
    }
}
