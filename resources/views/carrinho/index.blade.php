@extends('layout.app')

@section('titulo', 'Carrinho')

@section('conteudo')
    
    <div class="site-wrap">
        <div class="bg-light py-3">
          <div class="container">
            <div class="row">
              <div class="col-md-12 mb-0">
                <a href=" {{route('home')}} ">Home</a> <span class="mx-2 mb-0">/</span> 
                <strong class="text-black">Carrinho</strong>
              </div>
            </div>
          </div>
        </div>
        @if(Session::has('mensagem-sucesso'))
          <div>
            <strong> {{Session::get('mensagem-sucesso')}} </strong>
          </div>
        @endif
        @if(Session::has('mensagem-falha'))
          <div>
            <strong> {{Session::get('mensagem-falha')}} </strong>
          </div>
        @endif
        @forelse ($pedidos as $pedido)              
            <div class="site-section">
              <div class="container">
                <div class="row mb-8">
                   <div class="table">
                     <table class="table ">
                       <thead>
                         <tr>
                           <th class=""></th>
                           <th class="">Qtd</th>
                           <th class="">Produto</th>
                           <th class="">Valor Unit.</th>
                           <th class="">Desconto(s)</th>
                           <th class="">Total</th>
                         </tr>
                       </thead>
                       <tbody>
                           @php
                               $total_pedido = 0;
                           @endphp
                           @foreach ($pedido->pedido_produtos as $pedido_produto)
                               <tr>    
                                   <td>
                                       <img width="100" height="100" src=" {{$pedido_produto->produto->imagem}} ">              
                                   </td>
                                   <td>
                                        <div class="mb-5">
                                            <div class="input-group mb-3" style="max-width: 170px;">
                                              <div class="input-group-prepend">
                                                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                              </div>
                                              <span class="form-control text-center" > {{$pedido_produto->qtd}} </span>
                                              
                                              <div class="input-group-append">
                                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                              </div>
                                            </div>  
                                            <a href="#" class="" >Retirar produto</a>
                                        </div>                                        
                                   </td>
                                   <td> {{$pedido_produto->produto->titulo}} </td>
                                   <td> R$ {{number_format($pedido_produto->valores, 2, ',', '.' )}} </td>
                                   <td>R$ {{number_format($pedido_produto->descontos, 2, ',', '.' )}}</td>
                                   @php
                                       $total_produto = $pedido_produto->valores - $pedido_produto->descontos;
                                       $total_pedido += $total_produto;
                                   @endphp
                                   <td>R$ {{number_format($total_produto, 2, ',', '.')}} </td>
                               </tr>
                           @endforeach
                       </tbody>
                     </table>
                   </div>
                </div>
            
                <div class="row">
                  <div class="col-md-6">
                    <div class="row mb-5">
                      <div class="col-md-6">
                       <!--link-->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Cupom de Desconto</label>
                        <p>Digite seu código de cupom, se você tiver um.</p>
                      </div>
                      <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Cupom">
                      </div>
                      <div class="col-md-4">
                        <button class="btn btn-primary btn-md px-4">Aplicar cupom</button>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 pl-5">
                    <div class="row justify-content-end">
                      <div class="col-md-7">
                        <div class="row">
                          <div class="col-md-12 text-right border-bottom mb-5">
                            <h3 class="text-black h4 text-uppercase">Total do Pedido</h3>
                          </div>
                        </div>        
                        <div class="row mb-5">
                          <div class="col-md-6">
                            <strong class="text-black">Total do pedido:</strong>                            
                          </div>
                          <div class="col-md-6 text-right">
                            <span class="text-black">R$ {{number_format($total_pedido, 2, ',', '.')}} </span>
                          </div>
                        </div>
                    
                        <div class="row">
                          <div class="col-md-12">
                            <a href="{{route('home')}}" class="btn btn-primary btn-lg btn-block">Continuar Comprando</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
        @empty
            <h5>Não há nenhum pedido no carrinho</h5>
        @endforelse 
        
        <form id="form-remover-produto" method="POST" action=" {{route('carrinho.remover')}} ">
          {{csrf_field()}}
          {{method_field('DELETE')}}
          <input type="hidden" name="pedido_id">
          <input type="hidden" name="produto_id">
          <input type="hidden" name="item">
        </form>
        <form id="form-adicionar-produto" method="POST" action=" {{route('carrinho.adicionar')}} ">
          {{csrf_field()}}
          <input type="hidden" name="id">
        </form>

@endsection