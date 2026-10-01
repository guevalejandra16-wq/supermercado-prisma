<x-app-layout>

    <style>
        .ventas-page {
            max-width: 1450px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .ventas-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .ventas-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .ventas-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .ventas-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .ventas-header p {
            margin: 8px 0 0;
            color: #cbd5e1;
            font-size: 15px;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 46px;
            padding: 0 20px;
            border-radius: 10px;
            background: #4f46e5;
            color: white;
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
            transition: .2s ease;
        }

        .btn-primary:hover {
            background: #4338ca;
            transform: translateY(-1px);
        }

        .btn-primary svg {
            width: 18px;
            height: 18px;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
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

        .table-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .08);
        }

        .table-header {
            padding: 24px 26px;
            border-bottom: 1px solid #e2e8f0;
        }

        .table-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 20px;
            font-weight: 800;
        }

        .table-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .ventas-table {
            width: 100%;
            border-collapse: collapse;
        }

        .ventas-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 13px;
            font-weight: 800;
            text-align: left;
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .ventas-table td {
            padding: 17px 20px;
            color: #334155;
            font-size: 14px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .ventas-table tbody tr:last-child td {
            border-bottom: none;
        }

        .ventas-table tbody tr:hover {
            background: #f8fafc;
        }

        .venta-number {
            font-family: monospace;
            color: #4338ca;
            font-weight: 800;
        }

        .cliente-name {
            color: #0f172a;
            font-weight: 700;
        }

        .date {
            color: #64748b;
            font-size: 13px;
        }

        .amount {
            color: #0f172a;
            font-weight: 800;
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

        .badge-payment {
            background: #eef2ff;
            color: #4338ca;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border: none;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            cursor: pointer;
            transition: .2s ease;
        }

        .action-btn:hover {
            transform: translateY(-1px);
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
        }

        .action-invoice {
            background: #dcfce7;
            color: #15803d;
        }

        .action-invoice:hover {
            background: #bbf7d0;
        }

        .action-delete {
            background: #fee2e2;
            color: #b91c1c;
        }

        .action-delete:hover {
            background: #fecaca;
        }

        .empty-state {
            text-align: center;
            padding: 65px 25px;
        }

        .empty-state svg {
            width: 52px;
            height: 52px;
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

        @media (max-width: 1100px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 700px) {
            .ventas-page {
                padding: 20px 14px 35px;
            }

            .ventas-header {
                padding: 23px;
            }

            .ventas-header-top {
                align-items: flex-start;
                flex-direction: column;
            }

            .btn-primary {
                width: 100%;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>


    <div class="ventas-page">

        {{-- ENCABEZADO --}}
        <div class="ventas-header">

            <div class="ventas-header-top">

                <div>
                    <small>Supermercado Prisma</small>

                    <h1>Ventas</h1>

                    <p>
                        Registro e historial de ventas realizadas en el supermercado.
                    </p>
                </div>

                @if(auth()->user()->hasPrivilege('ventas.crear'))

                    <a href="{{ route('ventas.create') }}"
                       class="btn-primary">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M12 5v14"/>
                            <path d="M5 12h14"/>

                        </svg>

                        Nueva venta

                    </a>

                @endif

            </div>

        </div>


        {{-- MENSAJES --}}
        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        @if(session('error'))

            <div class="alert alert-error">
                {{ session('error') }}
            </div>

        @endif


        {{-- ESTADÍSTICAS --}}
        @php
            $totalVentas = $ventas->count();

            $ventasCompletadas = $ventas
                ->where('estado', 'COMPLETADA')
                ->count();

            $ventasHoy = $ventas
                ->filter(function ($venta) {
                    return \Carbon\Carbon::parse($venta->fecha)->isToday();
                })
                ->count();

            $totalVendido = $ventas
                ->where('estado', 'COMPLETADA')
                ->sum('total');
        @endphp


        <div class="stats-grid">

            <div class="stat-card">
                <div class="stat-label">
                    Ventas registradas
                </div>

                <div class="stat-value">
                    {{ $totalVentas }}
                </div>

                <div class="stat-extra">
                    Historial total
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-label">
                    Ventas completadas
                </div>

                <div class="stat-value">
                    {{ $ventasCompletadas }}
                </div>

                <div class="stat-extra">
                    Operaciones completadas
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-label">
                    Ventas de hoy
                </div>

                <div class="stat-value">
                    {{ $ventasHoy }}
                </div>

                <div class="stat-extra">
                    Operaciones del día
                </div>
            </div>


            <div class="stat-card">
                <div class="stat-label">
                    Total vendido
                </div>

                <div class="stat-value">
                    L {{ number_format($totalVendido, 2) }}
                </div>

                <div class="stat-extra">
                    Ventas completadas
                </div>
            </div>

        </div>


        {{-- TABLA --}}
        <div class="table-card">

            <div class="table-header">

                <h2>Historial de ventas</h2>

                <p>
                    Consulta las ventas registradas y sus facturas asociadas.
                </p>

            </div>


            @if($ventas->count() > 0)

                <div class="table-wrapper">

                    <table class="ventas-table">

                        <thead>

                            <tr>
                                <th>Venta</th>
                                <th>Cliente</th>
                                <th>Cajero</th>
                                <th>Fecha</th>
                                <th>Método de pago</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($ventas as $venta)

                                <tr>

                                    <td>
                                        <span class="venta-number">
                                            {{ $venta->numero_venta }}
                                        </span>
                                    </td>


                                    <td>

                                        <span class="cliente-name">

                                            @if($venta->cliente)

                                                {{ $venta->cliente->nombre }}
                                                {{ $venta->cliente->apellido }}

                                            @else

                                                Consumidor final

                                            @endif

                                        </span>

                                    </td>


                                    <td>
                                        {{ $venta->usuario->name ?? 'Sin usuario' }}
                                    </td>


                                    <td>

                                        <span class="date">

                                            {{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y') }}

                                            <br>

                                            {{ \Carbon\Carbon::parse($venta->fecha)->format('H:i') }}

                                        </span>

                                    </td>


                                    <td>

                                        <span class="badge badge-payment">
                                            {{ $venta->metodo_pago }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="amount">
                                            L {{ number_format($venta->total, 2) }}
                                        </span>

                                    </td>


                                    <td>

                                        @if($venta->estado === 'COMPLETADA')

                                            <span class="badge badge-success">
                                                {{ $venta->estado }}
                                            </span>

                                        @else

                                            <span class="badge badge-payment">
                                                {{ $venta->estado }}
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        <div class="actions">


                                            {{-- VER VENTA --}}
                                            @if(auth()->user()->hasPrivilege('ventas.ver'))

                                                <a href="{{ route('ventas.show', $venta->id) }}"
                                                   class="action-btn action-view"
                                                   title="Ver venta">

                                                    <svg viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2">

                                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                                        <circle cx="12" cy="12" r="3"/>

                                                    </svg>

                                                </a>

                                            @endif


                                            {{-- FACTURA --}}
                                            @if($venta->factura)

                                                <a href="{{ route('facturas.show', $venta->factura->id) }}"
                                                   class="action-btn action-invoice"
                                                   title="Ver factura">

                                                    <svg viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2">

                                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                                        <path d="M14 2v6h6"/>
                                                        <path d="M8 13h8"/>
                                                        <path d="M8 17h5"/>

                                                    </svg>

                                                </a>

                                            @endif


                                            {{-- ELIMINAR --}}
                                            @if(auth()->user()->hasPrivilege('ventas.eliminar'))

                                                <form action="{{ route('ventas.destroy', $venta->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('¿Estás seguro de eliminar esta venta? El stock será restaurado y la factura asociada será eliminada.');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="action-btn action-delete"
                                                            title="Eliminar venta">

                                                        <svg viewBox="0 0 24 24"
                                                             fill="none"
                                                             stroke="currentColor"
                                                             stroke-width="2">

                                                            <polyline points="3 6 5 6 21 6"/>
                                                            <path d="M19 6l-1 14H6L5 6"/>
                                                            <path d="M10 11v6"/>
                                                            <path d="M14 11v6"/>
                                                            <path d="M9 6V4h6v2"/>

                                                        </svg>

                                                    </button>

                                                </form>

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
                    <strong>{{ $ventas->count() }}</strong>
                    venta(s) registrada(s).

                </div>


            @else

                <div class="empty-state">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.7">

                        <path d="M6 2h12v20H6z"/>
                        <path d="M9 6h6"/>
                        <path d="M9 10h6"/>
                        <path d="M9 14h4"/>

                    </svg>

                    <h3>
                        No hay ventas registradas
                    </h3>

                    <p>
                        Cuando registres una venta aparecerá aquí.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>