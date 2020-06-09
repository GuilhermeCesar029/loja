@extends('layout.app')

@section('titulo','Fazer login')

@section('conteudo')    
    <div class="text-center">
        <h2>Fazer Login</h2>
    </div>&emsp;
    <div class="container" >
        <div class="offset-md-4">
            <section>
                <form action="{{route('site.login.entrar')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-row ">
                        <div class="form-group col-md-5">
                            <label for="nome">EMAIL</label>
                            <input type="email" class="form-control" name="email" placeholder="Digite seu email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-goup col-md-5">
                            <label for="senha">SENHA</label>
                            <input type="password" class="form-control" name="password" placeholder="Digite sua senha" required>
                        </div>
                    </div>&emsp;
                    <div class="form-row">
                        <button class="btn btn-success">Fazer Login</button>&emsp;                     
                    </div>&emsp;
                </form>    
            </section>
        </div>    
    </div>&emsp;
@endsection