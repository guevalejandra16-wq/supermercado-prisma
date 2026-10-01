<x-app-layout>

    <style>
        .productos-page {
            max-width: 1450px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .productos-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .productos-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .productos-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .productos-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .productos-header p {
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

        .productos-table {
            width: 100%;
            border-collapse: collapse;
        }

        .productos-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 13px;
            font-weight: 800;
            text-align: left;
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .productos-table td {
            padding: 17px 20px;
            color: #334155;
            font-size: 14px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .productos-table tbody tr:last-child td {
            border-bottom: none;
        }

        .productos-table tbody tr:hover {
            background: #f8fafc;
        }

        .codigo {
            font-family: monospace;
            color: #4338ca;
            font-weight: 800;
        }

        .producto-nombre {
            color: #0f172a;
            font-weight: 800;
        }

        .producto-descripcion {
            margin-top: 4px;
            color: #94a3b8;
            font-size: 12px;
            max-width: 260px;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .precio {
            color: #0f172a;
            font-weight: 800;
        }

        .stock {
            font-weight: 800;
        }

        .stock-normal {
            color: #15803d;
        }

        .stock-bajo {
            color: #dc2626;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 7px 11px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
        }

        .badge-active {
            background: #dcfce7;
            color: #15803d;
        }

        .badge-inactive {
            background: #fee2e2;
            color: #b91c1c;
        }

        .badge-category {
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

        .action-edit {
            background: #fef3c7;
            color: #b45309;
        }

        .action-edit:hover {
            background: #fde68a;
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

        @media (max-width: 1000px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .productos-page {
                padding: 20px 14px 35px;
            }

            .productos-header {
                padding: 23px;
            }

            .productos-header-top {
                align-items: flex-start;
                flex-direction: column;
            }

            .productos-header h1 {
                font-size: 25px;
            }

            .btn-primary {
                width: 100%;
            }
        }
    </style>


    <div class="productos-page">

        {{-- ENCABEZADO --}}
        <div class="productos-header">

            <div class="productos-header-top">

                <div>
                    <small>Supermercado Prisma</small>

                    <h1>Productos</h1>

                    <p>
                        Administración del catálogo, precios y existencias del supermercado.
                    </p>
                </div>

                @if(auth()->user()->hasPrivilege('productos.crear'))

                    <a href="{{ route('productos.create') }}"
                       class="btn-primary">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M12 5v14"/>
                            <path d="M5 12h14"/>

                        </svg>

                        Nuevo producto

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

            $productosActivos = $productos
                ->where('estado', true)
                ->count();

            $productosStockBajo = $productos
                ->filter(function ($producto) {
                    return $producto->estado &&
                           $producto->stock <= $producto->stock_minimo;
                })
                ->count();

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
                    Catálogo total
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Productos activos
                </div>

                <div class="stat-value">
                    {{ $productosActivos }}
                </div>

                <div class="stat-extra">
                    Disponibles en el sistema
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Stock bajo
                </div>

                <div class="stat-value">
                    {{ $productosStockBajo }}
                </div>

                <div class="stat-extra">
                    En o por debajo del mínimo
                </div>

            </div>

        </div>


        {{-- TABLA --}}
        <div class="table-card">

            <div class="table-header">

                <h2>
                    Catálogo de productos
                </h2>

                <p>
                    Consulta y administra los productos registrados.
                </p>

            </div>


            @if($productos->count() > 0)

                <div class="table-wrapper">

                    <table class="productos-table">

                        <thead>

                            <tr>

                                <th>Código</th>

                                <th>Producto</th>

                                <th>Categoría</th>

                                <th>Proveedor</th>

                                <th>Precio venta</th>

                                <th>Stock</th>

                                <th>Estado</th>

                                <th>Acciones</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($productos as $producto)

                                <tr>

                                    {{-- CÓDIGO --}}
                                    <td>

                                        <span class="codigo">
                                            {{ $producto->codigo }}
                                        </span>

                                    </td>


                                    {{-- PRODUCTO --}}
                                    <td>

                                        <div class="producto-nombre">
                                            {{ $producto->nombre }}
                                        </div>

                                        @if($producto->descripcion)

                                            <div class="producto-descripcion">
                                                {{ $producto->descripcion }}
                                            </div>

                                        @endif

                                    </td>


                                    {{-- CATEGORÍA --}}
                                    <td>

                                        @if($producto->categoria)

                                            <span class="badge badge-category">
                                                {{ $producto->categoria->nombre }}
                                            </span>

                                        @else

                                            <span style="color:#94a3b8;">
                                                Sin categoría
                                            </span>

                                        @endif

                                    </td>


                                    {{-- PROVEEDOR --}}
                                    <td>

                                        {{ $producto->proveedor->nombre ?? 'Sin proveedor' }}

                                    </td>


                                    {{-- PRECIO --}}
                                    <td>

                                        <span class="precio">
                                            L {{ number_format($producto->precio_venta, 2) }}
                                        </span>

                                    </td>


                                    {{-- STOCK --}}
                                    <td>

                                        @if($producto->stock <= $producto->stock_minimo)

                                            <span class="stock stock-bajo">
                                                {{ $producto->stock }}
                                            </span>

                                            <div style="
                                                margin-top:3px;
                                                color:#dc2626;
                                                font-size:11px;
                                            ">
                                                Stock bajo
                                            </div>

                                        @else

                                            <span class="stock stock-normal">
                                                {{ $producto->stock }}
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ESTADO --}}
                                    <td>

                                        @if($producto->estado)

                                            <span class="badge badge-active">
                                                Activo
                                            </span>

                                        @else

                                            <span class="badge badge-inactive">
                                                Inactivo
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ACCIONES --}}
                                    <td>

                                        <div class="actions">

                                            {{-- VER --}}
                                            @if(auth()->user()->hasPrivilege('productos.ver'))

                                                <a href="{{ route('productos.show', $producto->id) }}"
                                                   class="action-btn action-view"
                                                   title="Ver producto">

                                                    <svg viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2">

                                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                                        <circle cx="12" cy="12" r="3"/>

                                                    </svg>

                                                </a>

                                            @endif


                                            {{-- EDITAR --}}
                                            @if(auth()->user()->hasPrivilege('productos.editar'))

                                                <a href="{{ route('productos.edit', $producto->id) }}"
                                                   class="action-btn action-edit"
                                                   title="Editar producto">

                                                    <svg viewBox="0 0 24 24"
                                                         fill="none"
                                                         stroke="currentColor"
                                                         stroke-width="2">

                                                        <path d="M12 20h9"/>
                                                        <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"/>

                                                    </svg>

                                                </a>

                                            @endif


                                            {{-- ELIMINAR --}}
                                            @if(auth()->user()->hasPrivilege('productos.eliminar'))

                                                <form action="{{ route('productos.destroy', $producto->id) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="action-btn action-delete"
                                                            title="Eliminar producto">

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
                    <strong>{{ $productos->count() }}</strong>
                    producto(s) registrado(s).

                </div>


            @else

                <div class="empty-state">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.7">

                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                        <line x1="12" y1="22.08" x2="12" y2="12"/>

                    </svg>

                    <h3>
                        No hay productos registrados
                    </h3>

                    <p>
                        Cuando registres un producto aparecerá aquí.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>