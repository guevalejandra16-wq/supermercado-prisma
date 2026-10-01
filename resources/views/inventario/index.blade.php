<x-app-layout>

    <style>
        .inventario-page {
            max-width: 1450px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .inventario-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .inventario-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .inventario-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .inventario-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .inventario-header p {
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
            margin-bottom: 24px;
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

        .inventory-table {
            width: 100%;
            border-collapse: collapse;
        }

        .inventory-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 13px;
            font-weight: 800;
            text-align: left;
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .inventory-table td {
            padding: 17px 20px;
            color: #334155;
            font-size: 14px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .inventory-table tbody tr:last-child td {
            border-bottom: none;
        }

        .inventory-table tbody tr:hover {
            background: #f8fafc;
        }

        .codigo {
            font-family: monospace;
            color: #4338ca;
            font-weight: 800;
        }

        .producto {
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

        .badge-entry {
            background: #dcfce7;
            color: #15803d;
        }

        .badge-exit {
            background: #fee2e2;
            color: #b91c1c;
        }

        .badge-low {
            background: #fef3c7;
            color: #b45309;
        }

        .stock-normal {
            color: #15803d;
            font-weight: 900;
        }

        .stock-low {
            color: #dc2626;
            font-weight: 900;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #e0e7ff;
            color: #4338ca;
            text-decoration: none;
            transition: .2s ease;
        }

        .action-btn:hover {
            background: #c7d2fe;
            transform: translateY(-1px);
        }

        .action-btn svg {
            width: 17px;
            height: 17px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 25px;
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

        @media (max-width: 900px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .inventario-page {
                padding: 20px 14px 35px;
            }

            .inventario-header {
                padding: 23px;
            }

            .inventario-header-top {
                flex-direction: column;
                align-items: flex-start;
            }

            .inventario-header h1 {
                font-size: 25px;
            }

            .btn-primary {
                width: 100%;
            }
        }
    </style>


    <div class="inventario-page">

        {{-- ENCABEZADO --}}
        <div class="inventario-header">

            <div class="inventario-header-top">

                <div>
                    <small>Supermercado Prisma</small>

                    <h1>Inventario</h1>

                    <p>
                        Control de existencias y movimientos del inventario.
                    </p>
                </div>

                @if(auth()->user()->hasPrivilege('inventario.movimientos'))

                    <a href="{{ route('inventario.create') }}"
                       class="btn-primary">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M12 5v14"/>
                            <path d="M5 12h14"/>

                        </svg>

                        Nuevo movimiento

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

            $totalProductos = $productos->count();

            $totalMovimientos = $movimientos->count();

            $totalStockBajo = $productosStockBajo->count();

        @endphp


        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-label">
                    Productos registrados
                </div>

                <div class="stat-value">
                    {{ $totalProductos }}
                </div>

                <div class="stat-extra">
                    Productos en catálogo
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Movimientos registrados
                </div>

                <div class="stat-value">
                    {{ $totalMovimientos }}
                </div>

                <div class="stat-extra">
                    Historial de inventario
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Productos con stock bajo
                </div>

                <div class="stat-value">
                    {{ $totalStockBajo }}
                </div>

                <div class="stat-extra">
                    En o por debajo del mínimo
                </div>

            </div>

        </div>


        {{-- PRODUCTOS Y STOCK --}}
        <div class="section-card">

            <div class="section-header">

                <h2>
                    Existencias actuales
                </h2>

                <p>
                    Consulta el stock disponible de cada producto.
                </p>

            </div>


            @if($productos->count() > 0)

                <div class="table-wrapper">

                    <table class="inventory-table">

                        <thead>

                            <tr>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Categoría</th>
                                <th>Proveedor</th>
                                <th>Stock</th>
                                <th>Stock mínimo</th>
                                <th>Estado</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($productos as $producto)

                                <tr>

                                    <td>
                                        <span class="codigo">
                                            {{ $producto->codigo }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="producto">
                                            {{ $producto->nombre }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                                    </td>

                                    <td>
                                        {{ $producto->proveedor->nombre ?? 'Sin proveedor' }}
                                    </td>

                                    <td>

                                        @if($producto->stock <= $producto->stock_minimo)

                                            <span class="stock-low">
                                                {{ $producto->stock }}
                                            </span>

                                        @else

                                            <span class="stock-normal">
                                                {{ $producto->stock }}
                                            </span>

                                        @endif

                                    </td>

                                    <td>
                                        {{ $producto->stock_minimo }}
                                    </td>

                                    <td>

                                        @if($producto->stock <= $producto->stock_minimo)

                                            <span class="badge badge-low">
                                                Stock bajo
                                            </span>

                                        @else

                                            <span class="badge badge-entry">
                                                Stock disponible
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty-state">

                    <h3>
                        No hay productos registrados
                    </h3>

                    <p>
                        Los productos aparecerán aquí cuando sean registrados.
                    </p>

                </div>

            @endif

        </div>


        {{-- PRODUCTOS CON STOCK BAJO --}}
        @if($productosStockBajo->count() > 0)

            <div class="section-card">

                <div class="section-header">

                    <h2>
                        Productos con stock bajo
                    </h2>

                    <p>
                        Productos que requieren atención por encontrarse en o por debajo del stock mínimo.
                    </p>

                </div>

                <div class="table-wrapper">

                    <table class="inventory-table">

                        <thead>

                            <tr>
                                <th>Código</th>
                                <th>Producto</th>
                                <th>Stock actual</th>
                                <th>Stock mínimo</th>
                                <th>Diferencia</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($productosStockBajo as $producto)

                                <tr>

                                    <td>
                                        <span class="codigo">
                                            {{ $producto->codigo }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="producto">
                                            {{ $producto->nombre }}
                                        </span>
                                    </td>

                                    <td>
                                        <span class="stock-low">
                                            {{ $producto->stock }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $producto->stock_minimo }}
                                    </td>

                                    <td>
                                        {{ $producto->stock - $producto->stock_minimo }}
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @endif


        {{-- HISTORIAL --}}
        <div class="section-card">

            <div class="section-header">

                <h2>
                    Historial de movimientos
                </h2>

                <p>
                    Registro permanente de entradas y salidas de inventario.
                </p>

            </div>


            @if($movimientos->count() > 0)

                <div class="table-wrapper">

                    <table class="inventory-table">

                        <thead>

                            <tr>
                                <th>Fecha</th>
                                <th>Producto</th>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                                <th>Motivo</th>
                                <th>Referencia</th>
                                <th>Usuario</th>
                                <th>Detalle</th>
                            </tr>

                        </thead>

                        <tbody>

                            @foreach($movimientos as $movimiento)

                                <tr>

                                    <td>
                                        {{ \Carbon\Carbon::parse($movimiento->fecha)->format('d/m/Y H:i') }}
                                    </td>

                                    <td>

                                        <span class="producto">
                                            {{ $movimiento->producto->nombre ?? 'Producto eliminado' }}
                                        </span>

                                    </td>

                                    <td>

                                        @if($movimiento->tipo === 'ENTRADA')

                                            <span class="badge badge-entry">
                                                ENTRADA
                                            </span>

                                        @else

                                            <span class="badge badge-exit">
                                                SALIDA
                                            </span>

                                        @endif

                                    </td>

                                    <td>
                                        <strong>
                                            {{ $movimiento->cantidad }}
                                        </strong>
                                    </td>

                                    <td>
                                        {{ $movimiento->motivo ?? 'Sin motivo' }}
                                    </td>

                                    <td>
                                        {{ $movimiento->referencia ?? '—' }}
                                    </td>

                                    <td>
                                        {{ $movimiento->usuario->name ?? 'Sin usuario' }}
                                    </td>

                                    <td>

                                        @if(auth()->user()->hasPrivilege('inventario.ver'))

                                            <a href="{{ route('inventario.show', $movimiento->id) }}"
                                               class="action-btn"
                                               title="Ver movimiento">

                                                <svg viewBox="0 0 24 24"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     stroke-width="2">

                                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                                    <circle cx="12" cy="12" r="3"/>

                                                </svg>

                                            </a>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

                <div class="table-footer">

                    Mostrando
                    <strong>{{ $movimientos->count() }}</strong>
                    movimiento(s) registrado(s).

                    <br>

                    Los movimientos forman parte del historial permanente del inventario.

                </div>

            @else

                <div class="empty-state">

                    <h3>
                        No hay movimientos registrados
                    </h3>

                    <p>
                        Las entradas y salidas de inventario aparecerán aquí.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>