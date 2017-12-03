<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
        <table>
            <tr>
                <th>Folio</th>
                <th>Cliente</th>
                <th>Subtotal</th>
                <th>Descuento</th>
                <th>IVA</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
            @foreach ($ordenesCompra as $ordenCompra)
                <tr>
                    <td>{{ "ODC-" . $ordenCompra->id }}</td>
                    <td>{{ $ordenCompra->cliente->nombre }}</td>
                    <td>{{ $ordenCompra->subtotal }}</td>
                    <td>{{ $ordenCompra->descuento }}</td>
                    <td>{{ $ordenCompra->iva }}</td>
                    <td>{{ $ordenCompra->total }}</td>
                    <td>{{ $ordenCompra->created_at }}</td>
                </tr>
            @endforeach
        </table>
    </body>
</html>
