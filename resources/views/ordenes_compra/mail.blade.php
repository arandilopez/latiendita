<b>Folio:</b>
{{ 'ODC-' . $orden->id }}<br>
<b>Fecha:</b>
{{ $orden->created_at->toFormattedDateString() }}<br>
<b>Subtotal:</b>
$ {{ $orden->subtotal }}<br>
<b>Descuento:</b>
$ {{ $orden->descuento }}<br>
<b>IVA:</b>
$ {{ $orden->iva }}<br>
<b>Total:</b>
$ {{ $orden->total }}<br>
<p>
    <i>¡Gracias por su compra!</i>
</p>
