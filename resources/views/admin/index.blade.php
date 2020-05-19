@extends('layout.app')

@section('titulo', 'Lista de Produtos')

@section('conteudo')
    <div class="text-center">
        <h2>Lista de produtos</h2>
    </div>&emsp;
    <div class="container col-md-8">
        <table class="table table-striped">
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
                        <a href="{{route('cadastro.produto.editar', $produto->id)}}">Editar</a>
                        <a href="">Excluir</a>
                      </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          <div class="row">
            <a class="btn btn-warning" href="{{route('cadastro.produto.index')}}">Adicionar Produto</a>
          </div>
    </div>
@endsection