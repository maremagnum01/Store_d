<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height:100%; margin: 0">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>iStore D | iPhone nuevos y usados</title>
        <!-- Fonts -->
        <link rel="icon" href="imagenes/tienda-online.png" type="image/png">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />      
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('style.css') }}">
        <link rel="stylesheet" href="http://top-gennifer-maremagnum01-0648d6c6.koyeb.app/style.css">
        <link rel="stylesheet" href="https://top-gennifer-maremagnum01-0648d6c6.koyeb.app/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"> </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
<body style="display: flex; flex-direction: column; min-height:100%; margin: 0">
    <header>
    
        <nav class="navbar navbar-expand-md navbar-dark top bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            STORE  D
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('store') }}">TIENDA</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                       href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"
                    >
                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                        <ul class="list-group" style="margin: 20px;">
                        @if(count(\Cart::getContent()) > 0)
                            @foreach(\Cart::getContent() as $item)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <img src="{{ Storage::url($item['img']) }}"
                                                style="width: 50px; height: 50px;"
                                            >
                                        </div>
                                        <div class="col-lg-6">
                                            <b>{{$item->name}}</b>
                                            <br><small>Cantidad: {{$item->quantity}}</small>
                                        </div>
                                        <div class="col-lg-3">
                                            <p>${{ \Cart::get($item->id)->getPriceSum() }}</p>
                                        </div>
                                        <hr>
                                    </div>
                                </li>
                            @endforeach
                            <br>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-lg-10">
                                        <b>Total: </b>${{ \Cart::getTotal() }}
                                    </div>
                                    <div class="col-lg-2">
                                        <form action="{{ route('cart.clear') }}" method="POST">
                                            {{ csrf_field() }}
                                            <button class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <br>
                            <div class="row" style="margin: 0px;">
                                <a class="btn btn-dark btn-sm btn-block" href="{{ route('cart.index') }}">
                                    CARRITO <i class="fa fa-arrow-right"></i>
                                </a>
                                <a class="btn btn-dark btn-sm btn-block" href="#">
                                    CHECKOUT <i class="fa fa-arrow-right"></i>
                                </a>
                            </div>
                        @else
                            <li class="list-group-item">Tu carrito esta vacío</li>
                        @endif
                        </ul>
                            
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

</header>

    <main style="">
        @yield('content')
    </main>

    <footer class="footer navbar-dark bg-dark shadow-sm" id="footer"style="">
        <div class="container" style="padding-top: 50px; ">
            <div class="row">
                <div class="col-12 d-flex justify-content-evenly">
                    <div class="col-4 d-flex justify-content-evenly" style="">
                        <i class="fa-brands fa-whatsapp fa-2xl my-auto" style="color:white"></i>
                        <div>
                            <a href="https://wa.me/5491131756183" target="_blank" style="text-decoration:none; color:white"><h5>Whatsapp</h5></a>
                            <span style="color:white" class="test">Escribinos al Whatsapp</span>
                        </div>
                    </div>
                    <div class="col-4 d-flex justify-content-evenly">
                        <i class="fa-regular fa-envelope fa-2xl my-auto" style="color:white"></i>
                        <div>
                            <a href="mailto:eze.di.lallo@gmail.com" style="text-decoration:none; color: white"><h5>Mail</h5></a>
                            <span style="color:white" class="test">Enviame un correo</span>
                        </div>
                    </div>
                    <div class="col-4 d-flex justify-content-evenly">
                        <i class="fa-brands fa-square-facebook fa-2xl my-auto" style="color:white"></i>
                        <div>
                            <a href="https://www.facebook.com/profile.php?id=100075871160712&mibextid=LQQJ4d" target="_blank" style="text-decoration:none; color:white;"><h5>Facebook</h5></a>
                            <span style="color:white" class="test">Subimos stock diario</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <span class="d-flex justify-content-center" style="margin-top: 50px; color:white">Sitio creado por Ezequiel Di lallo</span>
    </footer>
</body>
</html>