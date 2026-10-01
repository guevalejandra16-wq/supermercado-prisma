<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $factura->numero_factura }} - Ticket</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 20px;
            background: #e5e7eb;
            font-family: Arial, Helvetica, sans-serif;
            color: #111827;
        }

        .ticket {
            width: 80mm;
            max-width: 80mm;
            margin: 0 auto;
            background: white;
            padding: 8mm 5mm;
        }

        .center {
            text-align: center;
        }

        .empresa {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .slogan {
            font-size: 11px;
            color: #555;
            margin-bottom: 12px;
        }

        .titulo {
            font-size: 14px;
            font-weight: bold;
            margin: 8px 0;
        }

        .numero {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .linea {
            border-top: 1px dashed #555;
            margin: 8px 0;
        }

        .info {
            font-size: 11px;
            line-height: 1.6;
        }

        .productos {
            width: 100%;
            border-collapse: collapse;
            margin-top: 8px;
            font-size: 10px;
        }

        .productos th {
            border-bottom: 1px dashed #555;
            padding: 5px 2px;
            text-align: left;
        }

        .productos td {
            padding: 5px 2px;
            vertical-align: top;
        }

        .derecha {
            text-align: right;
        }

        .totales {
            font-size: 11px;
            line-height: 1.8;
        }

        .total-final {
            font-size: 17px;
            font-weight: bold;
            margin-top: 5px;
        }

        .gracias {
            text-align: center;
            font-size: 11px;
            margin-top: 14px;
        }

        .acciones {
            width: 80mm;
            max-width: 80mm;
            margin: 15px auto;
            display: flex;
            gap: 8px;
        }

        .acciones button,
        .acciones a {
            flex: 1;
            padding: 10px 5px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
            font-size: 11px;
            font-weight: bold;
            cursor: pointer;
        }

        .imprimir {
            background: #4f46e5;
            color: white;
        }

        .volver {
            background: #374151;
            color: white;
        }

        @media print {

            @page {
                size: 80mm auto;
                margin: 0;
            }

            html,
            body {
                width: 80mm;
                margin: 0;
                padding: 0;
                background: white;
            }

            .ticket {
                width: 80mm;
                max-width: 80mm;
                margin: 0;
                padding: 5mm;
            }

            .acciones {
                display: none;
            }
        }
    </style>
</head>

<body>

    <!-- TICKET -->

    <div class="ticket">

        <div class="center">

            <div class="empresa">
                SUPERMERCADO PRISMA
            </div>

            <div class="slogan">
                Todo lo que necesitas, en un solo lugar.
            </div>

            <div class="titulo">
                FACTURA
            </div>

            <div class="numero">
                {{ $factura->numero_factura }}
            </div>

        </div>


        <div class="linea"></div>


        <!-- INFORMACIÓN -->

        <div class="info">

            <strong>Venta:</strong>
            {{ $factura->venta->numero_venta ?? 'N/A' }}

            <br>

            <strong>Fecha:</strong>
            {{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y H:i') }}

            <br>

            <strong>Cliente:</strong>

            @if($factura->venta && $factura->venta->cliente)

                {{ $factura->venta->cliente->nombre }}
                {{ $factura->venta->cliente->apellido }}

            @else

                Cliente general

            @endif

            <br>

            <strong>Cajero:</strong>
            {{ $factura->venta->usuario->name ?? 'N/A' }}

        </div>


        <div class="linea"></div>


        <!-- PRODUCTOS -->

        <table class="productos">

            <thead>

                <tr>

                    <th>
                        Producto
                    </th>

                    <th class="derecha">
                        Cant.
                    </th>

                    <th class="derecha">
                        Total
                    </th>

                </tr>

            </thead>


            <tbody>

                @if($factura->venta)

                    @foreach($factura->venta->detalles as $detalle)

                        <tr>

                            <td>

                                {{ $detalle->producto->nombre ?? 'Producto' }}

                                <br>

                                <small>
                                    {{ $detalle->producto->codigo ?? '' }}
                                </small>

                            </td>

                            <td class="derecha">

                                {{ $detalle->cantidad }}

                            </td>

                            <td class="derecha">

                                L {{ number_format($detalle->subtotal, 2) }}

                            </td>

                        </tr>

                    @endforeach

                @endif

            </tbody>

        </table>


        <div class="linea"></div>


        <!-- TOTALES -->

        <div class="totales">

            <div>

                <strong>Subtotal:</strong>

                <span style="float: right;">
                    L {{ number_format($factura->subtotal, 2) }}
                </span>

            </div>


            <div>

                <strong>Descuento:</strong>

                <span style="float: right;">
                    L {{ number_format($factura->descuento, 2) }}
                </span>

            </div>


            <div>

                <strong>Impuesto:</strong>

                <span style="float: right;">
                    L {{ number_format($factura->impuesto, 2) }}
                </span>

            </div>


            <div class="total-final">

                <strong>TOTAL:</strong>

                <span style="float: right;">
                    L {{ number_format($factura->total, 2) }}
                </span>

            </div>

        </div>


        <div class="linea"></div>


        <!-- PAGO -->

        @if($factura->venta)

            <div class="info">

                <strong>Método:</strong>
                {{ strtoupper($factura->venta->metodo_pago) }}

                <br>

                <strong>Efectivo:</strong>

                L {{ number_format($factura->venta->efectivo_recibido, 2) }}

                <br>

                <strong>Cambio:</strong>

                L {{ number_format($factura->venta->cambio, 2) }}

            </div>

        @endif


        <div class="linea"></div>


        <div class="gracias">

            Gracias por su compra.

            <br>

            Conserve este comprobante.

        </div>

    </div>


    <!-- BOTONES -->

    <div class="acciones">

        <button
            type="button"
            class="imprimir"
            onclick="window.print()">

            Imprimir ticket

        </button>


        <a
            href="{{ route('facturas.show', $factura->id) }}"
            class="volver">

            Volver

        </a>

    </div>


</body>

</html>