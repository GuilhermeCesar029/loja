@extends('layout.app')

@section('titulo', 'Produto')

@section('conteudo')
<div class="card">
  <div class="card-body">
    <h4 class="card-title"> {{$produto->titulo}} </h4>
    <div class="card-img">
      <img class="" src=" {{asset($produto->imagem)}} " alt=" {{$produto->titulo}} ">      
    </div>
    <p class="card-text">{{$produto->descricao}}</p>
  </div>
</div>
@endsection