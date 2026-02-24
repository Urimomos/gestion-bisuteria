<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Courier', monospace; font-size: 12px; text-align: center; }
        .header { font-weight: bold; margin-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { border-bottom: 1px dashed #000; text-align: left; }
        .total { font-weight: bold; font-size: 14px; margin-top: 15px; border-top: 1px solid #000; padding-top: 5px; }
        .footer { margin-top: 20px; font-size: 10px; }
    </style>
</head>
<body>
    <div class="header">
        BISUTERÍA ZACATELCO<br>
        TLAXCALA, MÉXICO<br>
        ---------------------------<br>
        TICKET DE VENTA
    </div>

    <div style="text-align: left;">
        FECHA: {{ $ventaDetalle[0]->Fecha }}<br>
        CLIENTE: {{ $ventaDetalle[0]->cliente }}<br>
        PAGO: {{ $ventaDetalle[0]->mpago }}
    </div>

    <table>
        <thead>
            <tr>
                <th>CANT.</th>
                <th>PRODUCTO</th>
                <th>SUBT.</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($ventaDetalle as $item)
                @php $subtotal = $item->Cantidad * $item->preventa; $total += $subtotal; @endphp
                <tr>
                    <td>{{ $item->Cantidad }}</td>
                    <td>{{ $item->producto }}</td>
                    <td>${{ number_format($subtotal, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="total">
        TOTAL A PAGAR: ${{ number_format($total, 2) }}
    </div>

    <div class="footer">
        ¡GRACIAS POR SU COMPRA!<br>
        Hecho a mano con amor.
    </div>
</body>
</html>