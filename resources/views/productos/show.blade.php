<x-app-layout>

    <style>
        .producto-show-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .producto-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .producto-header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .producto-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .producto-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .producto-header p {
            margin: 8px 0 0;
            color: #cbd5e1;
            font-size: 15px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 9px 15px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
        }

        .status-active {
            background: #dcfce7;
            color: #15803d;
        }

        .status-inactive {
            background: #fee2e2;
            color: #b91c1c;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-bottom: 24px;
        }

        .info-card {
            background: white;
            border-radius: 18px;
            padding: 26px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .08);
        }

        .info-card h2 {
            margin: 0 0 20px;
            color: #0f172a;
            font-size: 20px;
            font-weight: 800;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
            padding: 12px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #64748b;
            font-size: 14px;
        }

        .info-value {
            color: #0f172a;
            font-size: 14px;
            font-weight: 700;
            text-align: right;
        }

        .code {
            font-family: monospace;
            color: #4338ca;
            font-weight: 800;
        }

        .category-badge {
            display: inline-flex;
            padding: 7px 11px;
            border-radius: 999px;
            background: #eef2ff;
            color: #4338ca;
            font-size: 12px;
            font-weight: 800;
        }

        .description-card {
            background: white;
            border-radius: 18px;
            padding: 26px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .08);
            margin-bottom: 24px;
        }

        .description-card h2 {
            margin: 0 0 14px;
            color: #0f172a;
            font-size: 20px;
            font-weight: 800;
        }

        .description {
            color: #475569;
            font-size: 14px;
            line-height: 1.7;
            white-space: pre-line;
        }

        .description.empty {
            color: #94a3b8;
            font-style: italic;
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
            font-size: 27px;
            font-weight: 900;
        }

        .stat-extra {
            margin-top: 5px;
            color: #94a3b8;
            font-size: 12px;
        }

        .stock-normal {
            color: #15803d;
        }

        .stock-low {
            color: #dc2626;
        }

        .price-card {
            background: #0f172a;
            color: white;
            border-radius: 18px;
            padding: 26px;
            margin-bottom: 24px;
        }

        .price-card h2 {
            margin: 0 0 20px;
            font-size: 20px;
            font-weight: 800;
        }

        .price-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .price-item {
            padding: 18px;
            background: #1e293b;
            border-radius: 12px;
        }

        .price-item span {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .price-item strong {
            display: block;
            color: white;
            font-size: 22px;
            font-weight: 900;
        }

        .price-sale {
            color: #10b981 !important;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .actions-left,
        .actions-right {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 46px;
            padding: 0 20px;
            border-radius: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 800;
            transition: .2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #cbd5e1;
        }

        .btn-primary {
            background: #4f46e5;
            color: white;
        }

        .btn-primary:hover {
            background: #4338ca;
        }

        .btn-danger {
            background: #fee2e2;
            color: #b91c1c;
        }

        .btn-danger:hover {
            background: #fecaca;
        }

        .btn svg {
            width: 18px;
            height: 18px;
        }

        @media (max-width: 900px) {
            .info-grid {
                grid-template-columns: 1fr;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .price-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 650px) {
            .producto-show-page {
                padding: 20px 14px 35px;
            }

            .producto-header {
                padding: 23px;
            }

            .producto-header-top {
                flex-direction: column;
            }

            .producto-header h1 {
                font-size: 25px;
            }

            .info-card,
            .description-card,
            .price-card {
                padding: 21px;
            }

            .info-row {
                flex-direction: column;
                gap: 5px;
            }

            .info-value {
                text-align: left;
            }

            .actions,
            .actions-left,
            .actions-right {
                width: 100%;
            }

            .btn {
                width: 100%;
            }
        }
    </style>


    <div class="producto-show-page">

        {{-- ENCABEZADO --}}
        <div class="producto-header">

            <div class="producto-header-top">

                <div>

                    <small>Supermercado Prisma</small>

                    <h1>
                        {{ $producto->nombre }}
                    </h1>

                    <p>
                        Detalle completo del producto
                        · {{ $producto->codigo }}
                    </p>

                </div>


                @if($producto->estado)

                    <span class="status-badge status-active">
                        Activo
                    </span>

                @else

                    <span class="status-badge status-inactive">
                        Inactivo
                    </span>

                @endif

            </div>

        </div>


        {{-- INFORMACIÓN GENERAL --}}
        <div class="info-grid">

            <div class="info-card">

                <h2>
                    Información del producto
                </h2>


                <div class="info-row">

                    <span class="info-label">
                        Código
                    </span>

                    <span class="info-value code">
                        {{ $producto->codigo }}
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Nombre
                    </span>

                    <span class="info-value">
                        {{ $producto->nombre }}
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Categoría
                    </span>

                    <span class="info-value">

                        @if($producto->categoria)

                            <span class="category-badge">
                                {{ $producto->categoria->nombre }}
                            </span>

                        @else

                            Sin categoría

                        @endif

                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Proveedor
                    </span>

                    <span class="info-value">
                        {{ $producto->proveedor->nombre ?? 'Sin proveedor' }}
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Estado
                    </span>

                    <span class="info-value">

                        @if($producto->estado)
                            Activo
                        @else
                            Inactivo
                        @endif

                    </span>

                </div>

            </div>


            {{-- INVENTARIO --}}
            <div class="info-card">

                <h2>
                    Información de inventario
                </h2>


                <div class="info-row">

                    <span class="info-label">
                        Stock actual
                    </span>

                    <span class="info-value">

                        @if($producto->stock <= $producto->stock_minimo)

                            <span style="color:#dc2626;">
                                {{ $producto->stock }} unidades
                            </span>

                        @else

                            <span style="color:#15803d;">
                                {{ $producto->stock }} unidades
                            </span>

                        @endif

                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Stock mínimo
                    </span>

                    <span class="info-value">
                        {{ $producto->stock_minimo }} unidades
                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Estado del stock
                    </span>

                    <span class="info-value">

                        @if($producto->stock <= $producto->stock_minimo)

                            <span style="color:#dc2626;">
                                Stock bajo
                            </span>

                        @else

                            <span style="color:#15803d;">
                                Stock disponible
                            </span>

                        @endif

                    </span>

                </div>


                <div class="info-row">

                    <span class="info-label">
                        Vencimiento
                    </span>

                    <span class="info-value">

                        @if($producto->fecha_vencimiento)

                            {{ \Carbon\Carbon::parse($producto->fecha_vencimiento)->format('d/m/Y') }}

                        @else

                            No establecido

                        @endif

                    </span>

                </div>

            </div>

        </div>


        {{-- DESCRIPCIÓN --}}
        <div class="description-card">

            <h2>
                Descripción
            </h2>

            @if($producto->descripcion)

                <div class="description">
                    {{ $producto->descripcion }}
                </div>

            @else

                <div class="description empty">
                    Este producto no tiene una descripción registrada.
                </div>

            @endif

        </div>


        {{-- ESTADÍSTICAS --}}
        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-label">
                    Stock actual
                </div>

                <div class="stat-value
                    {{ $producto->stock <= $producto->stock_minimo ? 'stock-low' : 'stock-normal' }}">

                    {{ $producto->stock }}

                </div>

                <div class="stat-extra">
                    Unidades disponibles
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Stock mínimo
                </div>

                <div class="stat-value">
                    {{ $producto->stock_minimo }}
                </div>

                <div class="stat-extra">
                    Límite establecido
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Impuesto
                </div>

                <div class="stat-value">
                    {{ number_format($producto->impuesto_porcentaje, 2) }}%
                </div>

                <div class="stat-extra">
                    Porcentaje aplicable
                </div>

            </div>

        </div>


        {{-- PRECIOS --}}
        <div class="price-card">

            <h2>
                Información de precios
            </h2>

            <div class="price-grid">

                <div class="price-item">

                    <span>
                        Precio de compra
                    </span>

                    <strong>
                        L {{ number_format($producto->precio_compra, 2) }}
                    </strong>

                </div>


                <div class="price-item">

                    <span>
                        Precio de venta
                    </span>

                    <strong class="price-sale">
                        L {{ number_format($producto->precio_venta, 2) }}
                    </strong>

                </div>


                <div class="price-item">

                    <span>
                        Margen unitario
                    </span>

                    <strong>
                        L {{ number_format($producto->precio_venta - $producto->precio_compra, 2) }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- ACCIONES --}}
        <div class="actions">

            <div class="actions-left">

                <a href="{{ route('productos.index') }}"
                   class="btn btn-secondary">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M19 12H5"/>
                        <path d="m12 19-7-7 7-7"/>

                    </svg>

                    Volver a productos

                </a>

            </div>


            <div class="actions-right">

                @if(auth()->user()->hasPrivilege('productos.editar'))

                    <a href="{{ route('productos.edit', $producto->id) }}"
                       class="btn btn-primary">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M12 20h9"/>
                            <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"/>

                        </svg>

                        Editar producto

                    </a>

                @endif


                @if(auth()->user()->hasPrivilege('productos.eliminar'))

                    <form action="{{ route('productos.destroy', $producto->id) }}"
                          method="POST"
                          onsubmit="return confirm('¿Estás seguro de eliminar este producto?');">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger">

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

                            Eliminar producto

                        </button>

                    </form>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>