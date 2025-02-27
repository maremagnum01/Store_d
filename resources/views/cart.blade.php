@extends('layouts.template')

@section('content')

    

    <div class="container"  style="margin-top: 80px; padding-bottom: 150px ">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/tienda">Tienda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </nav>
        @if($message = Session::get('success'))     
        <div class="alert alert-success">
          <p id="message">{{ $message }}</p>
        </div>
        @endif

        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @if(\Cart::getTotalQuantity()>0)
                    <h4>{{ \Cart::getTotalQuantity()}} Producto(s) en el carrito</h4><br>
                @else
                    <h4>No hay productos en su carrito.</h4><br>
                    <a href="/tienda" class="btn btn-dark">Continue en la tienda</a>
                @endif

                @foreach($cartCollection as $item)
                    <div class="row" id="carritostyle">
                        <div class="col-lg-3">
                            <img src="{{ Storage::url($item['img']) }}" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b><a href="/tienda">{{ $item->marca }} {{$item->modelo}}</a></b><br>
                                <b>Memoria:</b> {{ $item->memoria }}<br>
                                <b>Estado:</b> {{ $item->estado }} <br>
                                <b>Color:</b> {{ $item->color }} <br>
                                <b>Precio: </b>U$S {{ $item->precio }} /u.<br>
                                <b>Sub Total: </b>${{ \Cart::get($item->id)->getPriceSum() }}<br>
                                {{-- <b>With Discount: </b>${{ \Cart::get($item->id)->getPriceSumWithConditions() }}--}}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <form action="{{ route('cart.update') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <input type="hidden" value="{{ $item->id}}" id="id" name="id">
                                        <input type="number" class="form-control form-control-sm" value="{{ $item->quantity }}"
                                               id="quantity" name="quantity" style="width: 70px; margin-right: 10px;" min="1" max="{{ $item->stock }}">
                                        <button class="btn btn-primary btn-sm" style="margin-right: 25px; width:33px"><i class="fa fa-edit"></i></button>
                                    </div>
                                </form>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group row">
                                        <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                        <button class="btn btn-dark btn-sm" style="margin-right: 10px; width: 33px"><i class="fa fa-trash"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @if(count($cartCollection)>0)
                    <form action="{{ route('cart.clear') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-md">Borrar Carrito</button> 
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>Total: </b>U$S {{ \Cart::getTotal() }}</li>
                        </ul>
                    </div>
                    <br><a href="/" class="btn btn-dark">Explorar tienda</a><br>
                    @Auth
                    <!-- <a href="/checkout" class="btn btn-success">Proceder al Checkout</a> -->
                    @endauth
                    
                    <br><a href="/" class="btn btn-primary">Comprar</a><br>
                </div>
            @endif
        </div>
        <br><br>
    </div>
@endsection
