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

  <!-- icons -->
  <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
  
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="{{route('home')}}">Elaine cosmeticos</a>
    <div class="container">                 
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" style="min-width:400px;" placeholder="Pesquisar" aria-label="Search">
        <button class="btn btn-link" type="submit">Pesquisar</button>
      </form>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Contato</a>
          </li>
          @if(Auth::guest())
            <li class="nav-item">
              <a class="btn btn-link" href="{{route('login')}}">Fazer login</a>&ensp;
            </li>
            <li class="nav-item">
              <a class="btn btn-link" href="{{route('register')}}">Cadastre-se</a>
            </li>
          @else
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>
        
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                      {{ __('Sair') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>

                  <a class="dropdown-item" href="#">Carrinho</a>
                  <a class="dropdown-item" href=" {{route('carrinho.compras')}} ">Minhas compras</a>
              </div>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>&emsp;