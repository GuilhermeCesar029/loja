@extends('layout.app')

@section('titulo','Atualizar')

@section('conteudo')
    <div class="text-center">
        <h2>Editar produtos</h2>
    </div>&emsp;
    <div class="container">
        <div class="offset-md-4">
            <section>
                <form action="{{route('cadastro.produto.atualizar', $produtos->id)}}" method="POST" enctype="multipart/form-data" >
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put">
                    @include('admin.form')
                    <div class="form-row">
                        <button class="btn btn-success">Atualizar</button>
                    </div>
                </form>
                <a href="{{route('admin')}}">Modificar Produtos</a>
            </section>
        </div>    
    </div>
@endsection