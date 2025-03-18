@extends('layouts.template')


@section('content')
    
    
      <div class="container">

      @if(\Cart::getTotalQuantity()>0)
        <script>
          setTimeout(function(){
          $('#modalAbandonedCart').modal('show');
          },2000);
        </script>
      @endif
        
            <div class="row">
            @foreach ($stocks as $stock)
                <div class='col-4 d-flex justify-content-evenly' style="margin-top: 20px; margin-bottom: 20px">
                        <div class="" style="width: 18rem;">
                            <img src="{{ Storage::url($stock['img']) }}" class="card-img-top" style="object-fit:contain; height: 300px" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $stock->marca }} {{ $stock->modelo }}</h5>
                                <span>{{ $stock->color }}, {{ $stock->memoria }}</span>
                                <br>
                                <span>
                                    @if($stock->estado == "Usado")
                                    {{$stock->estado}}, {{$stock->descripcion}}
                                    @else
                                    {{$stock->estado}}
                                    @endif
                                </span>
                                <br>
                                <span>U$S {{$stock->precio}}</span>
                                <br>
                                <span>
                                    @if ($stock->stock == 0)                        
                                    <b style="color:red"> Sin stock. </b>
                                    @elseif($stock->stock == 1)
                                    <b style="color:green"> Ultima unidad. </b> ({{$stock->stock}})
                                    @elseif($stock->stock <= 5)
                                    <b style="color:orange"> Pocas unidades. </b> ({{$stock->stock}})
                                    @elseif($stock->stock > 5)
                                    <br>
                                    @endif
                                </span>
                                <p class="card-text"></p>
                                @if($stock->stock > 0)
                                <button id="select_product" class="btn btn-primary" data-toggle="modal" data-target="#modalQuickView_{{$stock->id}}" onclick="capturar({{$stock->id}});">Ver producto</button>
                                @endif
                            </div>
                        </div>
                </div>
            @endforeach
            </div>       
      </div>
        @foreach ($stocks as $stock)
        <!-- Modal             -->
        
          <div class="modal fade show " id="modalQuickView_{{$stock->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
            data-gtm-vis-first-on-screen2340190_1302="4761" data-gtm-vis-total-visible-time2340190_1302="100" data-gtm-vis-has-fired2340190_1302="1" aria-modal="true" role="dialog"
            style="">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-body">
                  <div class="row">
                    <div class="col-lg-5">
                      <!--Carousel Wrapper-->
                      <div id="carousel-thumb" class="carousel slide carousel-fade carousel-thumbnails" data-ride="carousel">
                        <!--Slides-->
                        <div class="carousel-inner" role="listbox">
                        <img src="{{ Storage::url($stock['img']) }}" class="card-img-top" style="object-fit:contain; height: 300px" alt="...">
                          <!-- <div class="carousel-item active carousel-item-left">
                            <img class="d-block w-100" src="{{ Storage::url($stock['img']) }}" alt="First slide">
                          </div>
                          <div class="carousel-item carousel-item-next carousel-item-left">
                            <img class="d-block w-100" src="" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="" alt="Third slide">
                          </div> -->
                        </div>
                        <!--/.Slides-->
                        <!--Controls-->
                        <!-- <a class="carousel-control-prev" href="#carousel-thumb" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel-thumb" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a> -->
                        <!--/.Controls-->
                        <!-- <ol class="carousel-indicators">
                          <li data-target="#carousel-thumb" data-slide-to="0" class=""> <img class="d-block" src=""></li>
                          <li data-target="#carousel-thumb" data-slide-to="1" class="active"><img class="d-block" src=""></li>
                          <li data-target="#carousel-thumb" data-slide-to="2" class=""><img class="d-block" src=""></li>
                        </ol> -->
                      </div>
                      <!--/.Carousel Wrapper-->
                    </div>
                    <div class="col-lg-7">
                      <h2 class="h2-responsive product-name">
                        <strong>{{ $stock->marca }} {{ $stock->modelo }}</strong>
                      </h2>
                      <h4 class="h4-responsive">
                        <span class="green-text">
                          <strong> U$S {{ $stock->precio }}</strong>
                        </span>
                      </h4>

                      <!--Accordion wrapper-->
                      <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">

                        <!-- Accordion card -->
                        <div class="card">

                          <!-- Card header -->
                          <div class="card-header" role="tab" id="headingOne1">
                            <span data-toggle="" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                              <h5 class="mb-0">
                                Informacion del producto 
                              </h5>
                            </span>
                          </div>

                          <!-- Card body -->
                          <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                            <div class="card-body">
                              @if($stock->estado == "Usado")
                                Producto usado en perfecto estado.
                                <br>
                                Los seleccionamos en un estado impecable sin problemas de hardware ni de software. Los usados tienen 30 dias de garantia.
                                <br>
                                <br>
                                <b> Estado: </b> {{ $stock->estado }}
                                <br>
                                <b> Color: </b> {{ $stock->color }}
                                <br>
                                <b> Memoria: </b> {{ $stock->memoria }}
                                <br>
                                <b> {{ $stock->descripcion }} </b>
                                <br>
                              @elseif ($stock->estado == "Nuevo")
                                Producto nuevo. Garantia oficial de Apple: 1 año.
                                <br>
                                <br>
                                <b> Color: </b> {{ $stock->color }}
                                <br>
                                <b> Memoria: </b> {{ $stock->memoria }}
                                <br>
                              @endif
                            </div>
                          </div>

                        </div>
                        <!-- Accordion card -->

                      </div>
                      <!-- Accordion wrapper -->

                      <!-- Add to Cart -->
                      <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <input type="hidden" value="{{ $stock->id }}" id="id" name="id">
                          <input type="hidden" value="{{ $stock->marca }}" id="marca" name="marca">
                          <input type="hidden" value="{{ $stock->modelo }}" id="modelo" name="modelo">
                          <input type="hidden" value="{{ $stock->precio }}" id="precio" name="precio">
                          <input type="hidden" value="{{ $stock->img }}" id="img" name="img">
                          <input type="hidden" value="{{ $stock->color }}" id="color" name="color">
                          <input type="hidden" value="{{ $stock->memoria }}" id="memoria" name="memoria">
                          <input type="hidden" value="{{ $stock->estado }}" id="estado" name="estado">
                          <input type="hidden" value="{{ $stock->stock }}" id="stock" name="stock">
                          <input type="hidden" value="1" id="quantity" name="quantity">

                        
                          <div class="text-center">

                            <button type="reset" class="btn btn-secondary waves-effect waves-light" id="close_modal" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" title="add to cart" id="agregar_al_carrito">Agregar al carrito.
                              <i class="fas fa-cart-plus ml-2" aria-hidden="true"></i>
                            </button>
                          </div>
                        </div>
                      </form>
                      <!-- /.Add to Cart -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach

  <!-- Modal: modalAbandonedCart-->
      <div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true" data-backdrop="false" style="">
        <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
          <!--Content-->
          <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
              <h4 class="heading">Producto agregado al carrito.
              </h4>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_cart2">
                <span aria-hidden="true" class="white-text">&times;</span>
              </button>
            </div>

            <!--Body-->
            <div class="modal-body">

              <div class="row">
                <div class="col-3">
                  <p></p>
                  <p class="text-center"><i class="fas fa-shopping-cart fa-4x"></i></p>
                </div>

                <div class="col-9">
                  <p>Tu producto te estara esperando en el carrito de compras.</p>
                  <p>¿Quieres seguir explorando la tienda?</p>
                </div>
              </div>
            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
              <a type="button" href="/cart" class="btn bg-dark" style="color:white">Ir al carrito.</a>
              <a type="button" class="btn bg-dark waves-effect" data-dismiss="modal" style="color:white" id="close_cart">Cerrar</a>
            </div>
          </div>
          <!--/.Content-->
        </div>
      </div>
  <!-- Modal: modalAbandonedCart-->
  


    


    <script>

      function capturar(e){
        let valor = e;
        document.getElementById('id_stock').value=valor;
        console.log(valor);
      };


      $('#select_product').on('click', function(){
          $('#modalQuickView').modal('show');
      });

      $('#close_modal').on('click', function(){
        $('#modalQuickView').modal('hide');
      });

      $('#close_cart').on('click', function(){
        $('#modalAbandonedCart').modal('hide');
      });

      $('#close_cart2').on('click', function(){
        $('#modalAbandonedCart').modal('hide');
      });
    
     
      
    </script>
@endsection