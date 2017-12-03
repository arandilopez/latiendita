@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 pull-right">
                            <a href="{{route('ordenes_compra.pdf', ['id' => $ordenCompra->id])}}" target="_blank" class="btn btn-default">Ver PDF</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <strong>Folio:</strong>
                            {{ 'ODC-' . $ordenCompra->id }}
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <strong>Usuario:</strong>
                            {{ $ordenCompra->user->name }}
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <strong>Cliente:</strong>
                            {{ $ordenCompra->cliente->nombre }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>P/U</th>
                                        <th>Unidades</th>
                                        <th>Importe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ordenCompra->productos as $producto)
                                        <tr>
                                            <td>
                                                {{ $producto->nombre }} <br>
                                                {{ $producto->movimiento->descripcion }}
                                            </td>
                                            <td>
                                                $ {{ $producto->movimiento->precio_unitario }}
                                            </td>
                                            <td>
                                                {{ $producto->movimiento->unidades }}
                                            </td>
                                            <td>
                                                $ {{ $producto->movimiento->importe }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot style="text-align: right;">
                                    <tr>
                                        <td colspan="3"><strong>Subtotal:</strong></td>
                                        <td>$ {{ $ordenCompra->subtotal }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Descuento:</strong></td>
                                        <td>$ {{ $ordenCompra->descuento }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>IVA:</strong></td>
                                        <td>$ {{ $ordenCompra->iva }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"><strong>Total:</strong></td>
                                        <td>$ {{ $ordenCompra->total }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
