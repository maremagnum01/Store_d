@extends('layouts.app')

@section('template_title')
    {{ $stock->name ?? "{{ __('Show') Stock" }}}}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Stock</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('stocks.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $stock->marca }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $stock->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Memoria:</strong>
                            {{ $stock->memoria }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $stock->estado }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $stock->color }}
                        </div>
                        <div class="form-group">
                            <strong>Stock:</strong>
                            {{ $stock->stock }}
                        </div>
                        <div class="form-group">
                            <strong>Imagen:</strong>
                            {{ $stock->img }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $stock->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Precio U$S:</strong>
                            {{ $stock->precio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
