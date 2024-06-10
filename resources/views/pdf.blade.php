<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        @page {
            margin: 0cm 0cm;
        }

        body {
            margin: 0;
            padding: 0;
            max-width: 800px;
            margin: auto;
            background-image: url({{ public_path('storage/logo/Logotipo_twoWheels_bn.png') }});
            background-size: auto;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            padding: 60px;
        }

        table {
            width: 100%;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #C0E8B1;
            text-align: center;
        }

        .tabla td {
            background-color: #E5F4E0;
        }

        #footer {
            background-color: #C0E8B1;
            height: 100px;
            width: 100%;
            text-align: center;
            position: fixed;
            bottom: 0;
            left: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <table>
            <tr>
                <td style="margin-right: 40%">
                    <img src="{{ public_path('storage/logo/Logotipo_twoWheels.png') }}"
                        style="width:100%; max-width:150px;"><br>
                    Two Wheel<br>
                    Calle Cualquiera 123<br>
                    Cualquier Lugar, CP: 12345<br>
                    hola@unsitiogenial.es
                </td>
                <td style="text-align: right;">
                    <p style="font-family: Arial, sans-serif; font-size: 40px; font-weight: bold; margin-top: 5px;">
                        FACTURA&nbsp;&nbsp;
                    </p>
                    <p style="text-align: center; font-size: 20px; font-weight: bold; margin-top: -25px;">
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
        <table>
            <tr>
                <td>
                    <b>DATOS DEL CLIENTE</b><br>
                    {{ $pedido->nombre }}<br>
                    {{ $pedido->direccion }},<br>
                    {{ $pedido->user->ciudad }}, CP: {{ $pedido->user->zipcode }}<br>
                    {{ $pedido->user->email }}<br>
                    {{ $pedido->user->num_telefono }}
                </td>
            </tr>
        </table>
        <br>
        <table class="tabla" id="productos-pedido" style="border-collapse: separate; border-spacing: 2px;">
            <tr>
                <th colspan="3">PRODUCTO / SERVICIO</th>
                <th>CANTIDAD</th>
                <th>PRECIO</th>
                <th>IVA</th>
                <th>TOTAL</th>
            </tr>
            @foreach ($pedido->productos as $producto)
                <tr>
                    <td colspan="3">{{ $producto->nombre }}</td>
                    <td>{{ $producto->pivot->cantidad }}</td>
                    <td>
                        <?php
                        $precioSinPunto = str_replace('.', '', $producto->precio);
                        $precioSinComa = str_replace(',', '.', $precioSinPunto);
                        $precio = (float) $precioSinComa * 0.79;
                        echo number_format($precio, 2, ',', '.');
                        ?>
                        €
                    </td>
                    <td>
                        <?php
                        $precioSinPunto = str_replace('.', '', $producto->precio);
                        $precioSinComa = str_replace(',', '.', $precioSinPunto);
                        $precio = (float) $precioSinComa * 0.21;
                        echo number_format($precio, 2, ',', '.');
                        ?>
                        €
                    </td>
                    <td>{{ $producto->precio }} €</td>
                </tr>
            @endforeach
        </table>
        <br>
        <div style="margin-top: 14px; overflow: visible;">
            <div style="display: inline-block; width: 48.5%; background-color: yellow; text-align: center;">Div
                1
            </div>
            <div style="display: inline-block; width: 50%; text-align: center; transform: translateX(1.5%);">
                <table class="tabla" style="border-collapse: separate; border-spacing: 2px; width: 100%;">
                    <tr>
                        <th>BASE IMPONIBLE</th>
                        <td style="text-align: right;">
                            <?php
                            $total = 0;
                            foreach ($pedido->productos as $producto) {
                                $precioSinPunto = str_replace('.', '', $producto->precio);
                                $precioSinComa = str_replace(',', '.', $precioSinPunto);
                                $total += (float) $precioSinComa;
                            }
                            $total = $total * 0.79;
                            echo number_format($total, 2, ',', '.');
                            ?>
                            €
                        </td>
                    </tr>
                    <tr>
                        <th>IVA (21%)</th>
                        <td style="text-align: right;">
                            <?php
                            $total = 0;
                            foreach ($pedido->productos as $producto) {
                                $precioSinPunto = str_replace('.', '', $producto->precio);
                                $precioSinComa = str_replace(',', '.', $precioSinPunto);
                                $total += (float) $precioSinComa;
                            }
                            $total = $total * 0.21;
                            echo number_format($total, 2, ',', '.');
                            ?>
                            €
                        </td>
                    </tr>
                    <tr>
                        <th>DESCUENTO</th>
                        <td style="text-align: right;">- 0,00 €</td>
                    </tr>
                    <tr>
                        <th style="font-size: 20px;">TOTAL</th>
                        <td style="text-align: right;">
                            <b>
                                <?php
                                $total = 0;
                                foreach ($pedido->productos as $producto) {
                                    $precioSinPunto = str_replace('.', '', $producto->precio);
                                    $precioSinComa = str_replace(',', '.', $precioSinPunto);
                                    $total += (float) $precioSinComa;
                                }
                                echo number_format($total, 2, ',', '.');
                                ?>
                                €
                            </b>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <h3 style="font-size: 30px; margin-bottom: 0; text-align: center; margin-top: -5px;">
            ¡GRACIAS POR SU CONFIANZA!
        </h3>
    </div>
    <footer id="footer"></footer>
</body>

</html>
