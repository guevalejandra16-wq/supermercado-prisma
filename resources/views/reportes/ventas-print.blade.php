<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Reporte de Ventas - Prisma</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, Helvetica, sans-serif;
            color: #111827;
            background: #ffffff;
        }

        .reporte-print {
            max-width: 1100px;
            margin: 0 auto;
        }

        .reporte-print-header {
            border-bottom: 3px solid #2563eb;
            padding-bottom: 18px;
            margin-bottom: 25px;
        }

        .reporte-print-header h1 {
            margin: 0;
            font-size: 28px;
        }

        .reporte-print-header p {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .reporte-print-periodo {
            margin-bottom: 25px;
            padding: 15px;
            background: #f3f4f6;
            border-radius: 8px;
            font-size: 14px;
        }

        .reporte-print-resumen {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 12px;
            margin-bottom: 25px;
        }

        .reporte-print-resumen-item {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 14px;
        }

        .reporte-print-resumen-label {
            font-size: 11px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .reporte-print-resumen-value {
            font-size: 17px;
            font-weight: bold;
        }

        .reporte-print-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }

        .reporte-print-table th {
            background: #f3f4f6;
            border-bottom: 1px solid #d1d5db;
            padding: 10px;
            text-align: left;
        }

        .reporte-print-table td {
            border-bottom: 1px solid #e5e7eb;
            padding: 9px 10px;
        }

        .reporte-print-total {
            font-weight: bold;
        }

        .reporte-print-footer {
            margin-top: 30px;
            padding-top: 15px;
            border-top: 1px solid #d1d5db;
            display: flex;
            justify-content: space-between;
            color: #6b7280;
            font-size: 11px;
        }

        .reporte-print-actions {
            max-width: 1100px;
            margin: 0 auto 20px;
            display: flex;
            gap: 10px;
        }

        .reporte-print-button {
            border: none;
            padding: 10px 18px;
            border-radius: 7px;
            background: #2563eb;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }

        .reporte-print-back {
            display: inline-flex;
            align-items: center;
            padding: 10px 18px;
            border-radius: 7px;
            background: #f3f4f6;
            color: #374151;
            text-decoration: none;
            font-weight: bold;
        }

        @media print {

            body {
                padding: 0;
            }

            .reporte-print-actions {
                display: none;
            }

            .reporte-print {
                max-width: none;
            }

        }

        @media (max-width: 800px) {

            body {
                padding: 15px;
            }

            .reporte-print-resumen {
                grid-template-columns: repeat(2, 1fr);
            }

        }

    </style>

</head>

<body>

    <div class="reporte-print-actions">

        <button
            type="button"
            class="reporte-print-button"
            onclick="window.print()"
        >
            Imprimir reporte
        </button>

        <a
            href="{{ route('reportes.ventas', [
                'fecha_inicio' => $fechaInicio,
                'fecha_fin' => $fechaFin
            ]) }}"
            class="reporte-print-back"
        >
            Regresar al reporte
        </a>

    </div>


    <div class="reporte-print">

        <div class="reporte-print-header">

            <h1>Supermercado Prisma</h1>

            <p>
                Reporte de ventas
            </p>

        </div>


        <div class="reporte-print-periodo">

            <strong>Período:</strong>

            @if($fechaInicio && $fechaFin)

                {{ \Carbon\Carbon::parse($fechaInicio)->format('d/m/Y') }}
                -
                {{ \Carbon\Carbon::parse($fechaFin)->format('d/m/Y') }}

            @elseif($fechaInicio)

                Desde
                {{ \Carbon\Carbon::parse($fechaInicio)->format('d/m/Y') }}

            @elseif($fechaFin)

                Hasta
                {{ \Carbon\Carbon::parse($fechaFin)->format('d/m/Y') }}

            @else

                Todas las ventas registradas

            @endif

        </div>


        <div class="reporte-print-resumen">

            <div class="reporte-print-resumen-item">

                <div class="reporte-print-resumen-label">
                    Ventas
                </div>

                <div class="reporte-print-resumen-value">
                    {{ $totalVentas }}
                </div>

            </div>


            <div class="reporte-print-resumen-item">

                <div class="reporte-print-resumen-label">
                    Subtotal
                </div>

                <div class="reporte-print-resumen-value">
                    L {{ number_format($subtotal, 2) }}
                </div>

            </div>


            <div class="reporte-print-resumen-item">

                <div class="reporte-print-resumen-label">
                    Descuentos
                </div>

                <div class="reporte-print-resumen-value">
                    L {{ number_format($descuentos, 2) }}
                </div>

            </div>


            <div class="reporte-print-resumen-item">

                <div class="reporte-print-resumen-label">
                    Impuestos
                </div>

                <div class="reporte-print-resumen-value">
                    L {{ number_format($impuestos, 2) }}
                </div>

            </div>


            <div class="reporte-print-resumen-item">

                <div class="reporte-print-resumen-label">
                    Total vendido
                </div>

                <div class="reporte-print-resumen-value">
                    L {{ number_format($total, 2) }}
                </div>

            </div>

        </div>


        <table class="reporte-print-table">

            <thead>

                <tr>

                    <th>Venta</th>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Cajero</th>
                    <th>Método</th>
                    <th>Subtotal</th>
                    <th>Impuesto</th>
                    <th>Total</th>

                </tr>

            </thead>

            <tbody>

                @foreach($ventas as $venta)

                    <tr>

                        <td>
                            {{ $venta->numero_venta }}
                        </td>

                        <td>
                            {{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y H:i') }}
                        </td>

                        <td>

                            @if($venta->cliente)

                                {{ $venta->cliente->nombre }}
                                {{ $venta->cliente->apellido }}

                            @else

                                Consumidor final

                            @endif

                        </td>

                        <td>
                            {{ $venta->usuario->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $venta->metodo_pago }}
                        </td>

                        <td>
                            L {{ number_format($venta->subtotal, 2) }}
                        </td>

                        <td>
                            L {{ number_format($venta->impuesto, 2) }}
                        </td>

                        <td class="reporte-print-total">
                            L {{ number_format($venta->total, 2) }}
                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>


        <div class="reporte-print-footer">

            <span>
                Supermercado Prisma
            </span>

            <span>
                Generado el {{ now()->format('d/m/Y H:i') }}
            </span>

        </div>

    </div>

</body>

</html>