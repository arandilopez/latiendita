<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Orden de Compra</title>
        <style>
        body {
            background-color: #fff;
            font-size: 16px;
            line-height: 16px;
            font-family: "Helvetica";
            color: #303030;
        }

        table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        table.productos > tbody > tr > td, table.productos > tbody > tr > th {
            border-bottom: 1px solid #303030;
            margin: 0 auto;
        }

        table.productos > tbody > tr.totales {
            text-align: right;
        }

        table.productos > tbody > tr.totales > td {
            border-bottom: none;
        }

        td {
          padding: 5px;
          vertical-align: middle;
          word-wrap: break-word;
        }

        th {
            font-weight: bold;
        }
        </style>
    </head>
    <body>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <strong>Folio:</strong>
                    {{ 'ODC-' . $ordenCompra->id }}
                </td>
                <td>
                    <strong>Cliente:</strong>
                    {{ $ordenCompra->cliente->nombre }}
                </td>
                <td>
                    <strong>Usuario:</strong>
                    {{ $ordenCompra->user->name }}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <table class="productos">
                        <tr>
                            <th>Descripcion</th>
                            <th>P/U</th>
                            <th>Unidades</th>
                            <th>Importe</th>
                        </tr>
                        @forelse ($ordenCompra->productos as $producto)
                            <tr>
                                <td>
                                    {{ $producto->nombre }} <br>
                                    {{ $producto->movimiento->descripcion }}
                                </td>
                                <td>{{ $producto->movimiento->precio_unitario }}</td>
                                <td>{{ $producto->movimiento->unidades }}</td>
                                <td>$ {{ $producto->movimiento->importe }}</td>
                            @empty
                                <td colspan="4">No hay productos</td>
                            </tr>
                        @endforelse
                        <tr class="totales">
                            <td colspan="3">
                                <strong>Subtotal:</strong><br>
                                <strong>Descuento:</strong><br>
                                <strong>IVA:</strong><br>
                                <strong>Total:</strong><br>
                            </td>
                            <td>
                                $ {{ $ordenCompra->subtotal }} <br>
                                $ {{ $ordenCompra->descuento }} <br>
                                $ {{ $ordenCompra->iva }} <br>
                                $ {{ $ordenCompra->total }} <br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
