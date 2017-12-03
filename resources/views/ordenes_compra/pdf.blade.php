<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
        body {
            background-color: #fff;
            font-size: 16px;
            line-height: 16px;
            font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
            color: #303030;
        }

        table {
            width: 100%;
            text-align: left;
        }

        table.productos > tbody > tr > td, table.productos > tbody > tr > th {
            border-bottom: 1px solid #303030;
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
                <td colspan="4" style="text-align: center;">
                    <h1>La Tiendita</h1>
                    <h4>La Tiendita S.A. de C.V.</h4>
                    Tablaje ctastral 687687 CP:97000
                </td>
            </tr>
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
                    <strong>Fecha:</strong>
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
                                <td>$ {{ $producto->movimiento->precio_unitario }}</td>
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
