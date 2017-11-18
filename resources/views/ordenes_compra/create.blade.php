@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear nueva orden de compra</div>
                <div class="panel-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-horizontal" action="" method="post">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="cliente">Cliente</label>
                                    <select class="form-control" name="cliente">
                                        @foreach ($clientes as $cliente)
                                            <option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="descuento">Descuento</label>
                                    <input type="number" name="descuento" class="form-control" value="{{old('descuento')}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="producto_select">Producto</label>
                                    <select class="form-control" name="producto" id="producto_select">
                                        @foreach ($productos as $producto)
                                            <option value="{{$producto->id}}" data-precio="{{$producto->precio}}">{{$producto->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="precio_unitario">P/U</label>
                                            <input type="number" name="precio_unitario" value="{{old('precio_unitario')}}" class="form-control" id="precio_unitario">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="unidades">Unidades</label>
                                            <input type="number" name="unidades" value="{{old('unidades')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customScripts')
<script src="{{ asset('js/ordenes_compra/form_orden_compra.js') }}" charset="utf-8"></script>
@endsection
