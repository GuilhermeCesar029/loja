@extends('layout.app')

@section('titulo','Cadastro de Produtos')

@section('conteudo')
    <div class="text-center">
        <h2>Cadastro de produtos</h2>
    </div>&emsp;
    <div class="container">
        <div class="offset-md-2">
            <section>
                <form action="{{route('produto.cadastrar')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-row ">
                        <div class="form-group col-md-5">
                            <label for="nome">Titulo</label>
                            <input type="text" class="form-control" name="nome" placeholder="Digite seu nome" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="sobrenome">SOBRENOME</label>
                            <input type="text" class="form-control" name="sobrenome" placeholder="Digite seu Sobrenome" required>
                        </div>
                    </div>
                </form>
            </section>
        </div>    
    </div>
@endsection 