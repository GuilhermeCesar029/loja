@extends('layout.app')

@section('titulo','Cadastre-se')

@section('conteudo')
    <div class="text-center">
        <h2>Cadastre-se Gratis</h2>
    </div>&emsp;
    <div class="container">
        <div class="offset-md-2">
            <section>
                <form action="{{route('site.cadastro')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-row ">
                        <div class="form-group col-md-5">
                            <label for="nome">PRIMEIRO NOME</label>
                            <input type="text" class="form-control" name="nome" placeholder="Digite seu nome" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="sobrenome">SOBRENOME</label>
                            <input type="text" class="form-control" name="sobrenome" placeholder="Digite seu Sobrenome" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="cpf">CPF</label>
                            <input type="text" class="form-control" name="cpf" placeholder="Digite seu CPF" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="rg">RG</label>
                            <input type="text" class="form-control" name="rg" placeholder="Digite seu RG" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="email">EMAIL</label>
                            <input type="email" class="form-control" name="email" placeholder="Digite seu melhor email" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="senha">SENHA</label>
                            <input type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="data">DATA DE NASCIMENTO</label>
                            <input type="date" class="form-control" name="data" placeholder="Digite somente numeros. Ano/Mês/Dia" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="genero">GÊNERO</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="masculino" value="opcao1" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                  Masculino
                                </label>&emsp;&emsp;&ensp;
                                <input class="form-check-input" type="radio" name="feminino" value="opcao2" >
                                <label class="form-check-label" for="exampleRadios1">
                                  Feminino
                                </label>
                            </div>            
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="celular">CELULAR</label>
                            <input type="tel" class="form-control" name="celular" placeholder="(61) 92010-1229" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="telefone2">TELEFONE 2</label>
                            <input type="tel" class="form-control" name="telefone2" placeholder="(61) 3032-7190" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-check">
                            <input class="form-check-input" name="checkemail" type="checkbox">
                            <label class="form-check-label1">Li e concordo com os termos de uso e política de privacidade</label>
                        </div>        
                    </div>
                    <div class="form-row">
                        <button type="button" class="btn btn-warning">Cadastre-se</button>&emsp;
                        <a class="btn btn-success" href="{{route('site.login.index')}}">Fazer Login</a>
                    </div>&emsp;
                </form>
            </section>
        </div>    
    </div>
@endsection 