@extends('layout.app')

@section('titulo', 'Lista de Produtos')

@section('conteudo')
  <div class="row">
    <div class="container col-md-8 offset-md-2">
      <div class="carder border">
          <div class="card-header">
              <div class="card-title text-center">
                  <h3>Lista de Produtos</h3>
              </div>
          </div>
          <div class="card-body">
            <table class="table table-ordered table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">NOME</th>
                  <th scope="col">PREÇO</th>
                  <th scope="col">DESCRIÇÃO</th>
                  <th scope="col">IMAGEM</th>
                  <th scope="col">AÇÃO</th>
                </tr>
              </thead>
              <tbody>
                  @foreach ($produtos as $produto)  
                      <tr>
                        <th> {{$produto->id}} </th>
                        <td> {{$produto->titulo}} </td>
                        <td> {{$produto->valor}} </td>
                        <td> {{$produto->descricao}} </td>
                        <td><img height="60" src="{{$produto->imagem}}" alt="{{$produto->titulo}}"></td>
                        <td>
                          <a href="{{route('cadastro.produto.editar', $produto->id)}}" class="btn btn-primary btn-sm">Editar</a>
                          <a href="{{route('cadastro.produto.excluir', $produto->id)}}" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                      </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
          <div class="row">
              <button class="btn btn-sm btn-primary" role="button" onclick="novoProduto()">Novo Produto</button>
          </div>
      </div>
    </div>
  </div>
<div class="modal" tabindex="-1" role="dialog" id="cadastroProdutos">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form class="form-horizontal" id="formProdutos" action="{{route('cadastro.produto.submit')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-header">
                    <h5 class="modal-title">Novo Produto</h5>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="id" class="form-control">
                    <div class="form-group">
                        <label for="tituloProduto" class="control-label">Titulo</label>
                        <div class="input-group">
                            <input type="text" name="titulo" class="form-control" id="tituloProduto" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descricaoProduto" class="control-label">Descrição</label>
                        <div class="input-group">
                            <input type="text" name="descricao" class="form-control" id="descricaoProduto" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="valorProduto" class="control-label">Valor</label>
                        <div class="input-group">
                            <input type="text" name="valor" class="form-control" id="valorProduto" required>
                        </div>
                    </div>

                    <div class="form-group">        
                        <div class="form-row">                        
                            <div class="file-input input-group col-md-5 mb-4">                            
                                <label class="custom-file-label" for="imagem">IMAGEM</label>                          
                                <input type="file" class="custom-file-input" name="imagem" required>                            
                            </div>    
                        </div>
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="cancel" class="btn btn-danger" data-dissmiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="mx-auto" style="width: 300px;">
    {{$produtos->links()}}
  </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        //função para aparecer o formulario na tela
        function novoProduto(){
            $('#cadastroProdutos').modal('show');
        }
    </script>
@endsection