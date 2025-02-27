@extends('layouts.app')

@section('template_title')
    Stock
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Stock') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('stocks.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Marca</th>
										<th>Modelo</th>
										<th>Memoria</th>
										<th>Estado</th>
										<th>Color</th>
										<th>Stock</th>
										<th>Imagen</th>
										<th>Descripcion</th>
										<th>Precio en U$S</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stocks as $stock)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $stock->marca }}</td>
											<td>{{ $stock->modelo }}</td>
											<td>{{ $stock->memoria }}</td>
											<td>{{ $stock->estado }}</td>
											<td>{{ $stock->color }}</td>
											<td>{{ $stock->stock }}</td>
                                            @if($stock->img == NULL)
											<td>Sin imagen</td>                                        
                                            @else
											<td>{{ $stock->img }}</td>
                                            @endif
                                            @if($stock->descripcion == NULL)
                                            <td>Producto nuevo.</td>
                                            @else
											<td>{{ $stock->descripcion }}</td>
                                            @endif
											<td> U$S {{ $stock->precio }}</td>

                                            <td>
                                                <form action="{{ route('stocks.destroy',$stock->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('stocks.show',$stock->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('stocks.edit',$stock->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $stocks->links() !!}
            </div>
        </div>
    </div>
@endsection
