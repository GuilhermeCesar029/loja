@extends('layout.app')

@section('titulo','Cadastro de Produtos')

@section('conteudo')
    <div class="text-center">
        <h2>Cadastro de produtos</h2>
    </div>&emsp;
    <div class="container">
        <div class="offset-md-4">
            <section>
                <form action="{{route('produto.cadastrar')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-row ">
                        <div class="form-group col-md-5">
                            <label for="titulo">TITULO</label>
                            <input type="text" class="form-control" name="titulo" placeholder="Digite o titulo do produto" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="descricao">DESCRIÇÃO</label>
                            <input type="text" class="form-control" name="descricao" placeholder="Digite a descrição do produto" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5 mb-4">
                            <label for="valor">VALOR</label>
                            <input type="text" class="form-control" name="valor" placeholder="Digite o valor do produto" required>
                        </div>
                    </div>
                    <div class="form-row">                        
                        <div class="input-group col-md-5 mb-4">
                            <label class="custom-file-label" for="imagem">IMAGEM</label>                          
                            <input type="file" class="custom-file-input" name="imagem" >  
                        </div>
                    </div>
                    <div class="form-row">
                        <button class="btn btn-success">Enviar</button>
                    </div>
                </form>
            </section>
        </div>    
    </div>
@endsection 