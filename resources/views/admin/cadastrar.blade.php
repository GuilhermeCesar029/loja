@extends('layout.app')

@section('titulo', 'Cadastro de Produtod')

@section('conteudo')
<div class="text-center">
    <h2>Cadastro de produtos</h2>
</div>&emsp;
<div class="container">
    <div class="offset-md-4">
        <section>
            <form action="{{route('cadastro.produto.submit')}}" method="POST" enctype="multipart/form-data" >
                {{csrf_field()}}
                @include('admin.form')
                <div class="form-row">
                    <button class="btn btn-success">Enviar</button>
                </div>
            </form>
            <a href="{{route('admin')}}">Modificar Produtos</a>
        </section>
    </div>    
</div>
@endsection