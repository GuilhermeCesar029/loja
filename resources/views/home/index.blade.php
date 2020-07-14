@extends('layout.app')

@section('titulo', 'Pagina inicial')

@section('conteudo')
   <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Elaine Cosméticos</h1>
        <div class="list-group">
          <a href="#" class="list-group-item">Natura</a>
          <a href="#" class="list-group-item">Avon</a>
          <a href="{{route('login.admin')}}" class="list-group-item">Intranet</a> 
        </div>          
      </div>
      <!-- /.col-lg-3 -->

              
      
        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img class="d-block img-fluid" src={{asset('img/cuidados-para-voce.jpg')}} alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block img-fluid" src="{{asset('img/cuidados-diarios.jpg')}}" alt="Second slide">
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          
            <div class="row">
              @foreach($produtos as $produto)
                <div class="col-lg-4 col-md-6 mb-4">
                  <div class="card h-100">
                    <img class="card-img-top" src="{{asset($produto->imagem)}}">
                    <div class="card-body">
                      <h4 class="card-title">
                        <a href="{{route('produto', $produto->id)}}">{{$produto->titulo}}</a>
                      </h4>
                      <h5>{{$produto->valor}}</h5>
                      <p class="card-text">{{$produto->descricao}}</p>
                    </div>
                    <div class="card-footer">
                      <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                    </div>
                    <div class="card-action">
                      <a class="badge badge-info" href=" {{route('produto', $produto->id)}} ">Veja mais informações</a>
                    </div>
                  </div>
                </div>
              @endforeach
          </div>
          <!-- /.row -->
      </div>

      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <div class="mx-auto" style="width: 300px;">
    {{$produtos->links()}}
  </div>
@endsection