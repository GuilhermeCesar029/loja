<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CadastroController extends Controller
{
    public function index(){
        return view('cadastro.index');
    }

    public function cadastrar(Request $request){

        $this->validate($request,[
        'nome'            => 'required',
        'email'           => 'required', 
        'password'        => 'required',
        'sobrenome'       => 'required',
        'cpf'             => 'required',
        'rg'              => 'required',
        'data_nascimento' => 'required',
        'celular'         => 'required',
        'telefone'        => 'required',
        ]);

        //criptografand a senha
        $request['password'] = bcrypt($request['password']);

        User::create($request->all());

        return redirect()->route('site.login.index');
    }
}
