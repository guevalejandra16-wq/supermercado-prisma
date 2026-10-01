<x-app-layout>

    <style>
        .reporte-compras-page {
            padding: 30px;
            background: #f5f7fb;
            min-height: calc(100vh - 70px);
        }

        .reporte-compras-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .reporte-compras-header {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white;
            border-radius: 18px;
            padding: 28px 30px;
            margin-bottom: 24px;
            box-shadow: 0 10px 25px rgba(37, 99, 235, 0.15);
        }

        .reporte-compras-header small {
            display: block;
            font-size: 13px;
            font-weight: 600;
            opacity: 0.85;
            margin-bottom: 6px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .reporte-compras-header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }

        .reporte-compras-header p {
            margin: 8px 0 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .reporte-compras-card {
            background: white;
            border-radius: 16px;
            padding: 24px;
            margin-bottom: 24px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.05);
        }

        .reporte-compras-card-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .reporte-compras-card-title h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: #111827;
        }

        .reporte-compras-filter-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr) auto;
            gap: 16px;
            align-items: end;
        }

        .reporte-compras-field {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .reporte-compras-field label {
            font-size: 13px;
            font-weight: 600;
            color: #374151;
        }

        .reporte-compras-field input {
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

        .reporte-compras-field input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
        }

        .reporte-compras-button {
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

        .reporte-compras-button:hover {
            background: #1d4ed8;
        }

        .reporte-compras-secondary {
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

        .reporte-compras-secondary:hover {
            background: #e5e7eb;
        }

        .reporte-compras-stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }

        .reporte-compras-stat {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.04);
        }

        .reporte-compras-stat-label {
            color: #6b7280;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .reporte-compras-stat-value {
            color: #111827;
            font-size: 23px;
            font-weight: 700;
        }

        .reporte-compras-stat-value.total {
            color: #2563eb;
        }

        .reporte-compras-table-wrapper {
            overflow-x: auto;
        }

        .reporte-compras-table {
            width: 100%;
            border-collapse: collapse;
        }

        .reporte-compras-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            font-weight: 700;
            text-align: left;
            padding: 14px;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .reporte-compras-table td {
            padding: 15px 14px;
            border-bottom: 1px solid #eef2f7;
            color: #374151;
            font-size: 13px;
            vertical-align: middle;
        }

        .reporte-compras-table tbody tr:hover {
            background: #f8fafc;
        }

        .reporte-compras-number {
            font-weight: 700;
            color: #2563eb;
        }

        .reporte-compras-total {
            font-weight: 700;
            color: #111827;
        }

        .reporte-compras-empty {
            text-align: center;
            padding: 55px 20px;
            color: #6b7280;
        }

        .reporte-compras-empty-title {
            font-size: 17px;
            font-weight: 700;
            color: #374151;
            margin-bottom: 6px;
        }

        .reporte-compras-empty-text {
            font-size: 13px;
        }

        @media (max-width: 1100px) {
            .reporte-compras-stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 800px) {
            .reporte-compras-page {
                padding: 18px;
            }

            .reporte-compras-filter-grid {
                grid-template-columns: 1fr;
            }

            .reporte-compras-stats {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 520px) {
            .reporte-compras-header h1 {
                font-size: 23px;
            }
        }
    </style>


    <div class="reporte-compras-page">

        <div class="reporte-compras-container">


            {{-- ENCABEZADO --}}
            <div class="reporte-compras-header">

                <small>
                    Supermercado Prisma
                </small>

                <h1>
                    Reporte de compras
                </h1>

                <p>
                    Consulta y analiza las compras registradas en el sistema.
                </p>

            </div>


            {{-- FILTROS --}}
            <div class="reporte-compras-card">

                <div class="reporte-compras-card-title">

                    <h2>
                        Filtros del reporte
                    </h2>

                </div>


                <form
                    method="GET"
                    action="{{ route('reportes.compras') }}"
                >

                    <div class="reporte-compras-filter-grid">


                        <div class="reporte-compras-field">

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


                        <div class="reporte-compras-field">

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
                                class="reporte-compras-button"
                            >
                                Generar reporte
                            </button>


                            <a
                                href="{{ route('reportes.compras.imprimir', [
                                    'fecha_inicio' => $fechaInicio,
                                    'fecha_fin' => $fechaFin
                                ]) }}"
                                target="_blank"
                                class="reporte-compras-secondary"
                            >
                                Imprimir reporte
                            </a>


                            <a
                                href="{{ route('reportes.compras') }}"
                                class="reporte-compras-secondary"
                            >
                                Limpiar
                            </a>

                        </div>


                    </div>

                </form>

            </div>


            {{-- RESUMEN --}}
            <div class="reporte-compras-stats">


                <div class="reporte-compras-stat">

                    <div class="reporte-compras-stat-label">
                        Compras registradas
                    </div>

                    <div class="reporte-compras-stat-value">
                        {{ $totalCompras }}
                    </div>

                </div>


                <div class="reporte-compras-stat">

                    <div class="reporte-compras-stat-label">
                        Subtotal
                    </div>

                    <div class="reporte-compras-stat-value">
                        L {{ number_format($subtotal, 2) }}
                    </div>

                </div>


                <div class="reporte-compras-stat">

                    <div class="reporte-compras-stat-label">
                        Impuestos
                    </div>

                    <div class="reporte-compras-stat-value">
                        L {{ number_format($impuestos, 2) }}
                    </div>

                </div>


                <div class="reporte-compras-stat">

                    <div class="reporte-compras-stat-label">
                        Total comprado
                    </div>

                    <div class="reporte-compras-stat-value total">
                        L {{ number_format($total, 2) }}
                    </div>

                </div>


            </div>


            {{-- TABLA --}}
            <div class="reporte-compras-card">

                <div class="reporte-compras-card-title">

                    <h2>
                        Detalle de compras
                    </h2>

                </div>


                @if($compras->count())


                    <div class="reporte-compras-table-wrapper">

                        <table class="reporte-compras-table">


                            <thead>

                                <tr>

                                    <th>
                                        Compra
                                    </th>

                                    <th>
                                        Fecha
                                    </th>

                                    <th>
                                        Proveedor
                                    </th>

                                    <th>
                                        Encargado
                                    </th>

                                    <th>
                                        Estado
                                    </th>

                                    <th>
                                        Subtotal
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


                                @foreach($compras as $compra)


                                    <tr>


                                        <td>

                                            <span class="reporte-compras-number">
                                                {{ $compra->numero_compra }}
                                            </span>

                                        </td>


                                        <td>

                                            {{ \Carbon\Carbon::parse($compra->fecha)->format('d/m/Y H:i') }}

                                        </td>


                                        <td>

                                            @if($compra->proveedor)

                                                {{ $compra->proveedor->nombre }}

                                            @else

                                                N/A

                                            @endif

                                        </td>


                                        <td>

                                            {{ $compra->usuario->name ?? 'N/A' }}

                                        </td>


                                        <td>

                                            {{ $compra->estado }}

                                        </td>


                                        <td>

                                            L {{ number_format($compra->subtotal, 2) }}

                                        </td>


                                        <td>

                                            L {{ number_format($compra->impuesto, 2) }}

                                        </td>


                                        <td class="reporte-compras-total">

                                            L {{ number_format($compra->total, 2) }}

                                        </td>


                                    </tr>


                                @endforeach


                            </tbody>


                        </table>

                    </div>


                @else


                    <div class="reporte-compras-empty">

                        <div class="reporte-compras-empty-title">

                            No hay compras para mostrar

                        </div>

                        <div class="reporte-compras-empty-text">

                            No se encontraron compras dentro del período seleccionado.

                        </div>

                    </div>


                @endif


            </div>


        </div>

    </div>

</x-app-layout>