<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
</head>

<body style="margin: 0; padding: 0; max-width: 800px; margin: auto;background-image: url({{public_path('storage/logo/Logotipo_twoWheels_bn.png')}}); background-size: auto; background-position: center; background-repeat: no-repeat; ">
    <div style="padding: 30px; ">
        <table style="width: 100%">
            <tr>
                <td style="margin-right: 40% ">
                    <img src="{{ public_path('storage/logo/Logotipo_twoWheels.png') }}"
                        style="width:100%; max-width:150px;"><br>
                    Two Wheel<br>
                    Calle Cualquiera 123<br>
                    Cualquier Lugar, CP: 12345<br>
                    hola@unsitiogenial.es
                </td>
                <td style="text-align: right;">
                    <p style="font-family: Arial, sans-serif; font-size: 40px; font-style: bold;  margin-top: 5px; ">
                        FACTURA&nbsp;&nbsp;
                    </p>
                    <p style="text-align: center; font-size: 20px; font-style: bold; margin-top: -25px;">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;01234
                    </p>
                    <p>Fecha de
                        emision:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        {{ $pedido->created_at->format('d/m/Y') }}</p>
                    <p>N.º de
                        pedido:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        {{ $pedido->id }}</p>
                </td>
            </tr>
        </table>

        <br>
        <br>
        <table style="width: 100%;">
            <tr>
                <td>
                    <b>DATOS DEL CLIENTE</b><br>
                    {{ $pedido->user->name }}<br>
                    {{ $pedido->user->direccion }},<br>
                    {{ $pedido->user->ciudad }}, CP: {{ $pedido->user->zipcode }} <br>
                    {{ $pedido->user->email }}<br>
                    911-234-567
                </td>
            </tr>
        </table>
        <br>
        <table id="productos-pedido" style="border-collapse: separate; border-spacing: 2px; width: 100%;">
            <tr>
                <th colspan="3" style="background-color: #C0E8B1; padding: 8px; text-align: center; "> PRODUCTO /
                    SERVICIO</th>
                <th style="background-color: #C0E8B1; padding: 8px; text-align: center;">CANTIDAD</th>
                <th style="background-color: #C0E8B1; padding: 8px; text-align: center;">PRECIO</th>
                <th style="background-color: #C0E8B1; padding: 8px; text-align: center;">IVA</th>
                <th style="background-color: #C0E8B1; padding: 8px; text-align: center;">TOTAL</th>
            </tr>
            @foreach ($pedido->productos as $producto)
                <tr style="text-align: left;">
                    <td colspan="3" style="background-color: #E5F4E0; padding: 8px; "> {{ $producto->nombre }}</td>
                    <td style="background-color: #E5F4E0; padding: 8px; ">{{ $producto->pivot->cantidad }}</td>
                    <td style="background-color: #E5F4E0; padding: 8px; ">
                        <?php
                        $precioSinPunto = str_replace('.', '', $producto->precio);
                        $precioSinComa = str_replace(',', '.', $precioSinPunto);
                        $precio = (float) $precioSinComa * 0.79;
                        echo number_format($precio, 2, ',', '.');
                        ?>
                        €</td>
                    <td style="background-color: #E5F4E0; padding: 8px; ">
                        <?php
                        $precioSinPunto = str_replace('.', '', $producto->precio);
                        $precioSinComa = str_replace(',', '.', $precioSinPunto);
                        $precio = (float) $precioSinComa * 0.21;
                        echo number_format($precio, 2, ',', '.');
                        ?>
                        €</td>
                    <td style="background-color: #E5F4E0; padding: 8px; ">{{ $producto->precio }} €</td>
                </tr>
            @endforeach
        </table>
        <br>
        <div style="margin-top: 14px;  overflow: visible;">
            <div style="display: inline-block; width: 48.5%; background-color: yellow;  text-align: center;">Div
                1
            </div>
            <div style="display: inline-block; width: 50%; text-align: center; transform: translateX(1.5%);">
                <table style="border-collapse: separate; border-spacing: 2px; width: 100%;">
                    <tr>
                        <th style="background-color: #C0E8B1; padding: 8px; text-align: center; ">BASE IMPONIBLE</th>
                        <td style="background-color: #E5F4E0; padding: 8px; text-align: right;">
                            <?php
                            $total = 0;
                            foreach ($pedido->productos as $producto) {
                                $precioSinPunto = str_replace('.', '', $producto->precio);
                                $precioSinComa = str_replace(',', '.', $precioSinPunto);
                                $total += (float) $precioSinComa ;
                            }
                            $total = $total* 0.79;
                            echo number_format($total, 2, ',', '.');;
                            ?>    
                        €</td>
                    </tr>
                    <tr>
                        <th style="background-color: #C0E8B1; padding: 8px; text-align: center; ">IVA (21%)</th>
                        <td style="background-color: #E5F4E0; padding: 8px; text-align: right;">
                            <?php
                            $total = 0;
                            foreach ($pedido->productos as $producto) {
                                $precioSinPunto = str_replace('.', '', $producto->precio);
                                $precioSinComa = str_replace(',', '.', $precioSinPunto);
                                $total += (float) $precioSinComa ;
                            }
                            $total = $total * 0.21;
                            echo number_format($total, 2, ',', '.');;
                            ?>  €</td>
                    </tr>
                    <tr>
                        <th style="background-color: #C0E8B1; padding: 8px; text-align: center; ">DESCUENTO</th>
                        <td style="background-color: #E5F4E0; padding: 8px; text-align: right;">- 0,00 €</td>
                    </tr>
                    <tr>
                        <th style="font-size: 20px; background-color: #C0E8B1; padding: 8px; text-align: center; ">TOTAL
                        </th>
                        <td style="background-color: #E5F4E0; padding: 8px; text-align: right;"><b>
                                <?php
                                $total = 0;
                                foreach ($pedido->productos as $producto) {
                                    $precioSinPunto = str_replace('.', '', $producto->precio);
                                    $precioSinComa = str_replace(',', '.', $precioSinPunto);
                                    $total += (float) $precioSinComa ;
                                }
                                echo number_format($total, 2, ',', '.');;
                                ?> €</b></td>
                    </tr>
                </table>
            </div>
        </div>
        <h3 style="font-size: 30px; margin-bottom: 0; text-align: center; margin-top: -5px;">
            ¡GRACIAS POR SU CONFIANZA!
        </h3>
    </div>
    <footer style="background-color: #C0E8B1; height: 100px; width: 120%; margin-left: -10%; "></footer>
</body>

</html>
