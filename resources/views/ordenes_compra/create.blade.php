@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" id="crear_orden_compra_form">
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
                    <form class="form-horizontal">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="cliente">Cliente</label>
                                    <select class="form-control" name="cliente" v-model="cliente">
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
                                    <select class="form-control" name="producto" id="producto_select" v-on:change="setPrecioUnitario" v-model="form_producto.producto_id">
                                        <option value="">-- Seleccione un producto --</option>
                                        @foreach ($productos as $producto)
                                            <option value="{{$producto->id}}" data-precio="{{$producto->precio}}">{{$producto->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="precio_unitario">P/U</label>
                                            <input type="number" name="precio_unitario" value="{{old('precio_unitario')}}" class="form-control" id="precio_unitario"
                                            v-model="form_producto.precio_unitario">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label for="unidades">Unidades</label>
                                            <input type="number" name="unidades" value="{{old('unidades')}}" class="form-control" v-model="form_producto.unidades">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label>Importe</label>
                                    <p class="form-control-static">
                                        @{{ _.round(importe, 2) }}
                                    </p>
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="">Descripcion</label>
                                    <input type="text" name="descripcion" class="form-control" v-model="form_producto.descripcion">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <button type="button" class="btn btn-success" v-on:click="agregarProducto">
                                    Agregar
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>P/U</th>
                                            <th>Unidades</th>
                                            <th>Importe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="producto in productos">
                                            <td>@{{ producto.descripcion }}</td>
                                            <td>@{{ producto.precio_unitario }}</td>
                                            <td>@{{ producto.unidades }}</td>
                                            <td>@{{ (producto.unidades * producto.precio_unitario) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
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
