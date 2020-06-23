@extends('layout.app')

@section('titulo','Cadastre-se')

@section('conteudo')
    <div class="text-center">
        <h2>Cadastre-se Gratis</h2>
    </div>&emsp;
    <div class="container">
        <div class="offset-md-4">
            <section>
                <form action="{{route('site.cadastro')}}" method="POST">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group col-md-5">
                            <label for="nome">PRIMEIRO NOME</label>
                            <input type="text" class="form-control" name="nome" placeholder="Digite seu nome" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="sobrenome">SOBRENOME</label>
                            <input type="text" class="form-control" name="sobrenome" placeholder="Digite seu Sobrenome" required>
                        </div>                    
                    
                        <div class="form-group col-md-5">
                            <label for="email">EMAIL</label>
                            <input type="email" class="form-control" name="email" placeholder="Digite seu melhor email" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="senha">SENHA</label>
                            <input type="password" class="form-control" name="password" placeholder="Digite sua senha" required>
                        </div>
                    
                    
                        <div class="form-group col-md-5">
                            <label for="celular">CELULAR</label>
                            <input type="tel" class="form-control" name="celular" placeholder="(61) 92010-1229" required>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="checkemail" type="checkbox">
                            <label class="form-check-label1">Li e concordo com os termos de uso e política de privacidade</label>
                        </div>                        
                        <button class="btn btn-warning">Cadastre-se</button>&emsp;<br>
                        <label for="">
                            Já tem Login?
                            <a class="btn btn-link" href="{{route('site.login.index')}}">Fazer Login</a>
                        </label>
                    </div>&emsp;
                </form>
            </section>
        </div>    
    </div>
@endsection 