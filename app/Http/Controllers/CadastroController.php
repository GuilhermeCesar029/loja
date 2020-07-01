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
        $mensagens = [
            'required'     => 'O campo :attribute é OBRIGATORIO',
            'unique'       => 'O :attribute já existe',
            'password.min' => 'É necessario ter no minimo 8 caracteres',
            'password.min' => 'É necessario ter no maximo 12 caracteres',
        ];

        $this->validate($request,[
        'nome'            => 'required',
        'email'           => 'required|unique:user', 
        'password'        => 'required|min:8|max:12',
        'sobrenome'       => 'required',
        'cpf'             => 'required|unique:user',
        'rg'              => 'required|unique:user',
        'data_nascimento' => 'required',
        'celular'         => 'required|unique:user',
        'telefone'        => 'required|unique:user',
        ], $mensagens);

        //criptografand a senha
        $request['password'] = bcrypt($request['password']);

        User::create($request->all());

        return redirect()->route('login');
    }
}
