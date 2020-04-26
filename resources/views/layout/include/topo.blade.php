<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>@yield('titulo')</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Bootstrap core CSS -->
  <link href={{asset('app-assets/vendor/bootstrap/css/bootstrap.min.css')}} rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href={{asset('app-assets/css/shop-homepage.css')}} rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href=" {{route('produto.index')}} ">Elaine cosmeticos</a>
    <div class="container">                 
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" style="min-width:400px;" placeholder="Pesquisar" aria-label="Search">
        <button class="btn btn-outline-primary" type="submit">Pesquisar</button>
      </form>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contato</a>
          </li>
          @if(Auth::guest())
            <li class="nav-item">
              <a class="btn btn-outline-primary" href="{{route('site.login.index')}}">Fazer login</a>&ensp;
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-primary" href="{{route('site.cadastro.index')}}">Cadastre-se</a>
            </li>
          @else
            <li class="nav-item">
              <a class="btn btn-outline-primary" href="{{route('site.login.sair')}}">Sair</a>
            </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>&emsp;