<x-app-layout>

    <style>
        .facturas-page {
            max-width: 1450px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .facturas-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .facturas-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .facturas-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .facturas-header p {
            margin: 8px 0 0;
            color: #cbd5e1;
            font-size: 15px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: white;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .07);
        }

        .stat-label {
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .stat-value {
            color: #0f172a;
            font-size: 28px;
            font-weight: 900;
        }

        .stat-extra {
            margin-top: 5px;
            color: #94a3b8;
            font-size: 12px;
        }

        .section-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .08);
        }

        .section-header {
            padding: 24px 26px;
            border-bottom: 1px solid #e2e8f0;
        }

        .section-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 20px;
            font-weight: 800;
        }

        .section-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .facturas-table {
            width: 100%;
            border-collapse: collapse;
        }

        .facturas-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 13px;
            font-weight: 800;
            text-align: left;
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .facturas-table td {
            padding: 17px 20px;
            color: #334155;
            font-size: 14px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .facturas-table tbody tr:last-child td {
            border-bottom: none;
        }

        .facturas-table tbody tr:hover {
            background: #f8fafc;
        }

        .factura-number {
            color: #4338ca;
            font-family: monospace;
            font-weight: 900;
        }

        .venta-number {
            color: #475569;
            font-family: monospace;
            font-weight: 700;
        }

        .cliente {
            color: #0f172a;
            font-weight: 800;
        }

        .total {
            color: #0f172a;
            font-weight: 900;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 7px 11px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
        }

        .badge-success {
            background: #dcfce7;
            color: #15803d;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            transition: .2s ease;
        }

        .action-btn svg {
            width: 17px;
            height: 17px;
        }

        .action-view {
            background: #e0e7ff;
            color: #4338ca;
        }

        .action-view:hover {
            background: #c7d2fe;
            transform: translateY(-1px);
        }

        .action-print {
            background: #dcfce7;
            color: #15803d;
        }

        .action-print:hover {
            background: #bbf7d0;
            transform: translateY(-1px);
        }

        .empty-state {
            text-align: center;
            padding: 65px 25px;
        }

        .empty-state svg {
            width: 50px;
            height: 50px;
            color: #94a3b8;
            margin-bottom: 15px;
        }

        .empty-state h3 {
            margin: 0;
            color: #0f172a;
            font-size: 18px;
            font-weight: 800;
        }

        .empty-state p {
            margin: 8px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .table-footer {
            padding: 16px 24px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 900px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .facturas-page {
                padding: 20px 14px 35px;
            }

            .facturas-header {
                padding: 23px;
            }

            .facturas-header h1 {
                font-size: 25px;
            }
        }
    </style>


    <div class="facturas-page">

        {{-- ENCABEZADO --}}
        <div class="facturas-header">

            <small>Supermercado Prisma</small>

            <h1>
                Facturas
            </h1>

            <p>
                Historial de facturas generadas automáticamente por las ventas.
            </p>

        </div>


        {{-- MENSAJES --}}
        @if(session('success'))

            <div style="
                background:#dcfce7;
                color:#166534;
                border:1px solid #bbf7d0;
                padding:14px 18px;
                border-radius:10px;
                margin-bottom:20px;
                font-size:14px;
                font-weight:600;
            ">
                {{ session('success') }}
            </div>

        @endif


        @if(session('error'))

            <div style="
                background:#fee2e2;
                color:#991b1b;
                border:1px solid #fecaca;
                padding:14px 18px;
                border-radius:10px;
                margin-bottom:20px;
                font-size:14px;
                font-weight:600;
            ">
                {{ session('error') }}
            </div>

        @endif


        {{-- ESTADÍSTICAS --}}
        @php

            $totalFacturas = $facturas->count();

            $totalFacturado = $facturas->sum('total');

            $facturaUltima = $facturas->first();

        @endphp


        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-label">
                    Facturas registradas
                </div>

                <div class="stat-value">
                    {{ $totalFacturas }}
                </div>

                <div class="stat-extra">
                    Documentos generados
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Total facturado
                </div>

                <div class="stat-value">
                    L. {{ number_format($totalFacturado, 2) }}
                </div>

                <div class="stat-extra">
                    Acumulado de facturas
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Última factura
                </div>

                <div class="stat-value" style="font-size:22px;">

                    {{ $facturaUltima->numero_factura ?? '—' }}

                </div>

                <div class="stat-extra">

                    @if($facturaUltima)
                        {{ \Carbon\Carbon::parse($facturaUltima->fecha)->format('d/m/Y H:i') }}
                    @else
                        No hay facturas
                    @endif

                </div>

            </div>

        </div>


        {{-- TABLA --}}
        <div class="section-card">

            <div class="section-header">

                <h2>
                    Historial de facturas
                </h2>

                <p>
                    Consulta, revisa e imprime las facturas generadas.
                </p>

            </div>


            @if($facturas->count() > 0)

                <div class="table-wrapper">

                    <table class="facturas-table">

                        <thead>

                            <tr>

                                <th>
                                    Factura
                                </th>

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
                                    Usuario
                                </th>

                                <th>
                                    Total
                                </th>

                                <th>
                                    Estado
                                </th>

                                <th>
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($facturas as $factura)

                                <tr>

                                    {{-- FACTURA --}}
                                    <td>

                                        <span class="factura-number">
                                            {{ $factura->numero_factura }}
                                        </span>

                                    </td>


                                    {{-- VENTA --}}
                                    <td>

                                        <span class="venta-number">
                                            {{ $factura->venta->numero_venta ?? '—' }}
                                        </span>

                                    </td>


                                    {{-- FECHA --}}
                                    <td>

                                        {{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y H:i') }}

                                    </td>


                                    {{-- CLIENTE --}}
                                    <td>

                                        @if($factura->venta?->cliente)

                                            <span class="cliente">

                                                {{ $factura->venta->cliente->nombre }}
                                                {{ $factura->venta->cliente->apellido }}

                                            </span>

                                        @else

                                            Consumidor final

                                        @endif

                                    </td>


                                    {{-- USUARIO --}}
                                    <td>

                                        {{ $factura->venta->usuario->name ?? '—' }}

                                    </td>


                                    {{-- TOTAL --}}
                                    <td>

                                        <span class="total">

                                            L.
                                            {{ number_format($factura->total, 2) }}

                                        </span>

                                    </td>


                                    {{-- ESTADO --}}
                                    <td>

                                        <span class="badge badge-success">
                                            GENERADA
                                        </span>

                                    </td>


                                    {{-- ACCIONES --}}
                                    <td>

                                        <div class="action-buttons">

                                            @if(auth()->user()->hasPrivilege('facturas.ver'))

                                                <a
                                                    href="{{ route('facturas.show', $factura->id) }}"
                                                    class="action-btn action-view"
                                                    title="Ver factura"
                                                >

                                                    <svg viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2">

                                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                                        <circle cx="12" cy="12" r="3"/>

                                                    </svg>

                                                </a>

                                            @endif


                                            @if(auth()->user()->hasPrivilege('facturas.reimprimir'))

                                                <a
                                                    href="{{ route('facturas.print', $factura->id) }}"
                                                    target="_blank"
                                                    class="action-btn action-print"
                                                    title="Reimprimir factura"
                                                >

                                                    <svg viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2">

                                                        <polyline points="6 9 6 2 18 2 18 9"/>
                                                        <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                                                        <rect x="6" y="14" width="12" height="8"/>

                                                    </svg>

                                                </a>

                                            @endif

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                <div class="table-footer">

                    Mostrando
                    <strong>{{ $facturas->count() }}</strong>
                    factura(s) registrada(s).

                </div>


            @else

                <div class="empty-state">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.7">

                        <path d="M6 2h9l4 4v16H6z"/>
                        <path d="M15 2v5h5"/>
                        <path d="M9 13h6"/>
                        <path d="M9 17h6"/>

                    </svg>

                    <h3>
                        No hay facturas registradas
                    </h3>

                    <p>
                        Las facturas aparecerán aquí automáticamente cuando se registren ventas.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>