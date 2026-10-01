<x-app-layout>

    <style>
        .reporte-ventas-page {
            padding: 30px;
            background: #f5f7fb;
            min-height: calc(100vh - 70px);
        }

        .reporte-ventas-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .reporte-ventas-header {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            border-radius: 18px;
            padding: 28px 30px;
            margin-bottom: 24px;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.15);
        }

        .reporte-ventas-header small {
            display: block;
            font-size: 13px;
            font-weight: 600;
            opacity: 0.85;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .reporte-ventas-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }

        .reporte-ventas-header p {
            margin: 8px 0 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .reporte-ventas-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.05);
        }

        .reporte-ventas-card-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .reporte-ventas-card-title h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: #111827;
        }

        .reporte-ventas-filter-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr) auto;
            gap: 16px;
            align-items: end;
        }

        .reporte-ventas-field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .reporte-ventas-field label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
        }

        .reporte-ventas-field input {
            width: 100%;
            height: 44px;
            border: 1px solid #d1d5db;
            border-radius: 9px;
            padding: 0 12px;
            font-size: 14px;
            color: #111827;
            background: white;
            outline: none;
            transition: 0.2s;
        }

        .reporte-ventas-field input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .reporte-ventas-button {
            height: 44px;
            border: none;
            border-radius: 9px;
            padding: 0 22px;
            background: #2563eb;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.2s;
        }

        .reporte-ventas-button:hover {
            background: #1d4ed8;
        }

        .reporte-ventas-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            height: 44px;
            padding: 0 18px;
            border-radius: 9px;
            background: #f3f4f6;
            color: #374151;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            margin-left: 8px;
        }

        .reporte-ventas-secondary:hover {
            background: #e5e7eb;
        }

        .reporte-ventas-stats {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .reporte-ventas-stat {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.04);
        }

        .reporte-ventas-stat-label {
            color: #6b7280;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .reporte-ventas-stat-value {
            color: #111827;
            font-size: 23px;
            font-weight: 700;
        }

        .reporte-ventas-stat-value.total {
            color: #2563eb;
        }

        .reporte-ventas-table-wrapper {
            overflow-x: auto;
        }

        .reporte-ventas-table {
            width: 100%;
            border-collapse: collapse;
        }

        .reporte-ventas-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
            text-align: left;
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .reporte-ventas-table td {
            padding: 15px 14px;
            border-bottom: 1px solid #eef2f7;
            color: #374151;
            font-size: 13px;
            vertical-align: middle;
        }

        .reporte-ventas-table tbody tr:hover {
            background: #f8fafc;
        }

        .reporte-ventas-number {
            font-weight: 700;
            color: #2563eb;
        }

        .reporte-ventas-total {
            font-weight: 700;
            color: #111827;
        }

        .reporte-ventas-empty {
            text-align: center;
            padding: 55px 20px;
            color: #6b7280;
        }

        .reporte-ventas-empty-title {
            font-size: 17px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 6px;
        }

        .reporte-ventas-empty-text {
            font-size: 13px;
        }

        .reporte-ventas-detail {
            margin-top: 5px;
            font-size: 12px;
            color: #6b7280;
        }

        @media (max-width: 1100px) {
            .reporte-ventas-stats {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 800px) {
            .reporte-ventas-page {
                padding: 18px;
            }

            .reporte-ventas-filter-grid {
                grid-template-columns: 1fr;
            }

            .reporte-ventas-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 520px) {
            .reporte-ventas-stats {
                grid-template-columns: 1fr;
            }

            .reporte-ventas-header h1 {
                font-size: 23px;
            }
        }
    </style>

    <div class="reporte-ventas-page">

        <div class="reporte-ventas-container">

            {{-- ENCABEZADO --}}
            <div class="reporte-ventas-header">
                <small>Supermercado Prisma</small>

                <h1>
                    Reporte de ventas
                </h1>

                <p>
                    Consulta y analiza las ventas registradas en el sistema.
                </p>
            </div>


            {{-- FILTROS --}}
            <div class="reporte-ventas-card">

                <div class="reporte-ventas-card-title">
                    <h2>
                        Filtros del reporte
                    </h2>
                </div>

                <form
                    method="GET"
                    action="{{ route('reportes.ventas') }}"
                >

                    <div class="reporte-ventas-filter-grid">

                        <div class="reporte-ventas-field">

                            <label for="fecha_inicio">
                                Fecha inicial
                            </label>

                            <input
                                type="date"
                                id="fecha_inicio"
                                name="fecha_inicio"
                                value="{{ $fechaInicio }}"
                            >

                        </div>


                        <div class="reporte-ventas-field">

                            <label for="fecha_fin">
                                Fecha final
                            </label>

                            <input
                                type="date"
                                id="fecha_fin"
                                name="fecha_fin"
                                value="{{ $fechaFin }}"
                            >

                        </div>


                        <div>

                            <button
                                type="submit"
                                class="reporte-ventas-button"
                            >
                                Generar reporte
                            </button>


                            <a
                                href="{{ route('reportes.ventas.imprimir', [
                                    'fecha_inicio' => $fechaInicio,
                                    'fecha_fin' => $fechaFin
                                ]) }}"
                                target="_blank"
                                class="reporte-ventas-secondary"
                            >
                                Imprimir reporte
                            </a>


                            <a
                                href="{{ route('reportes.ventas') }}"
                                class="reporte-ventas-secondary"
                            >
                                Limpiar
                            </a>

                        </div>

                    </div>

                </form>

            </div>


            {{-- TARJETAS DE RESUMEN --}}
            <div class="reporte-ventas-stats">

                <div class="reporte-ventas-stat">

                    <div class="reporte-ventas-stat-label">
                        Ventas registradas
                    </div>

                    <div class="reporte-ventas-stat-value">
                        {{ $totalVentas }}
                    </div>

                </div>


                <div class="reporte-ventas-stat">

                    <div class="reporte-ventas-stat-label">
                        Subtotal
                    </div>

                    <div class="reporte-ventas-stat-value">
                        L {{ number_format($subtotal, 2) }}
                    </div>

                </div>


                <div class="reporte-ventas-stat">

                    <div class="reporte-ventas-stat-label">
                        Descuentos
                    </div>

                    <div class="reporte-ventas-stat-value">
                        L {{ number_format($descuentos, 2) }}
                    </div>

                </div>


                <div class="reporte-ventas-stat">

                    <div class="reporte-ventas-stat-label">
                        Impuestos
                    </div>

                    <div class="reporte-ventas-stat-value">
                        L {{ number_format($impuestos, 2) }}
                    </div>

                </div>


                <div class="reporte-ventas-stat">

                    <div class="reporte-ventas-stat-label">
                        Total vendido
                    </div>

                    <div class="reporte-ventas-stat-value total">
                        L {{ number_format($total, 2) }}
                    </div>

                </div>

            </div>


            {{-- TABLA --}}
            <div class="reporte-ventas-card">

                <div class="reporte-ventas-card-title">

                    <h2>
                        Detalle de ventas
                    </h2>

                </div>


                @if($ventas->count())

                    <div class="reporte-ventas-table-wrapper">

                        <table class="reporte-ventas-table">

                            <thead>

                                <tr>

                                    <th>
                                        Venta
                                    </th>

                                    <th>
                                        Fecha
                                    </th>

                                    <th>
                                        Cliente
                                    </th>

                                    <th>
                                        Cajero
                                    </th>

                                    <th>
                                        Método de pago
                                    </th>

                                    <th>
                                        Subtotal
                                    </th>

                                    <th>
                                        Descuento
                                    </th>

                                    <th>
                                        Impuesto
                                    </th>

                                    <th>
                                        Total
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($ventas as $venta)

                                    <tr>

                                        <td>

                                            <span class="reporte-ventas-number">
                                                {{ $venta->numero_venta }}
                                            </span>

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

                                            L {{ number_format($venta->descuento, 2) }}

                                        </td>


                                        <td>

                                            L {{ number_format($venta->impuesto, 2) }}

                                        </td>


                                        <td class="reporte-ventas-total">

                                            L {{ number_format($venta->total, 2) }}

                                        </td>

                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="reporte-ventas-empty">

                        <div class="reporte-ventas-empty-title">

                            No hay ventas para mostrar

                        </div>

                        <div class="reporte-ventas-empty-text">

                            No se encontraron ventas dentro del período seleccionado.

                        </div>

                    </div>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>