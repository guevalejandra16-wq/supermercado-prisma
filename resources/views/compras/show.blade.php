<x-app-layout>

    <div class="compras-show-page">

        {{-- ENCABEZADO --}}
        <div class="page-header">

            <div class="header-left">

                {{-- BOTÓN VOLVER --}}
                <a href="{{ route('compras.index') }}" class="back-button">

                    <svg width="18" height="18" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5"/>
                        <path d="M12 19l-7-7 7-7"/>
                    </svg>

                    Volver a compras

                </a>

                <span class="header-brand">
                    SUPERMERCADO PRISMA
                </span>

                <h1>Detalle de compra</h1>

                <p>
                    Información completa de la compra
                    <strong>{{ $compra->numero_compra }}</strong>
                </p>

            </div>

            {{-- BOTÓN EDITAR --}}
            @if(auth()->user()->hasPrivilege('compras.editar'))

                <div class="header-actions">

                    <a href="{{ route('compras.edit', $compra->id) }}"
                       class="btn btn-light">

                        <svg width="18" height="18"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M12 20h9"/>

                            <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/>

                        </svg>

                        Editar compra

                    </a>

                </div>

            @endif

        </div>


        {{-- INFORMACIÓN GENERAL --}}
        <div class="info-grid">

            {{-- NÚMERO DE COMPRA --}}
            <div class="info-card">

                <div class="info-icon">

                    <svg width="22" height="22"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M6 2h9l5 5v15H6z"/>
                        <path d="M15 2v6h5"/>
                        <path d="M9 13h6"/>
                        <path d="M9 17h6"/>

                    </svg>

                </div>

                <div>

                    <span>Número de compra</span>

                    <strong>
                        {{ $compra->numero_compra }}
                    </strong>

                </div>

            </div>


            {{-- PROVEEDOR --}}
            <div class="info-card">

                <div class="info-icon">

                    <svg width="22" height="22"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M3 21h18"/>
                        <path d="M5 21V8l7-5 7 5v13"/>
                        <path d="M9 21v-6h6v6"/>

                    </svg>

                </div>

                <div>

                    <span>Proveedor</span>

                    <strong>
                        {{ $compra->proveedor->nombre ?? 'Sin proveedor' }}
                    </strong>

                </div>

            </div>


            {{-- USUARIO --}}
            <div class="info-card">

                <div class="info-icon">

                    <svg width="22" height="22"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <circle cx="12" cy="8" r="4"/>
                        <path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"/>

                    </svg>

                </div>

                <div>

                    <span>Registrada por</span>

                    <strong>
                        {{ $compra->usuario->name ?? 'Usuario' }}
                    </strong>

                </div>

            </div>


            {{-- FECHA --}}
            <div class="info-card">

                <div class="info-icon">

                    <svg width="22" height="22"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <rect x="3" y="4" width="18" height="18" rx="2"/>
                        <path d="M16 2v4"/>
                        <path d="M8 2v4"/>
                        <path d="M3 10h18"/>

                    </svg>

                </div>

                <div>

                    <span>Fecha</span>

                    <strong>
                        {{ \Carbon\Carbon::parse($compra->fecha)->format('d/m/Y H:i') }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- ESTADO --}}
        <div class="status-card">

            <div>

                <span class="section-label">
                    Estado de la compra
                </span>

                <h2>
                    {{ $compra->estado }}
                </h2>

            </div>


            @if(strtoupper($compra->estado) === 'COMPLETADA')

                <span class="status-badge completed">
                    COMPLETADA
                </span>

            @elseif(strtoupper($compra->estado) === 'PENDIENTE')

                <span class="status-badge pending">
                    PENDIENTE
                </span>

            @else

                <span class="status-badge cancelled">
                    {{ $compra->estado }}
                </span>

            @endif

        </div>


        {{-- DETALLE DE PRODUCTOS --}}
        <div class="table-card">

            <div class="card-header">

                <div>

                    <span class="section-label">
                        Detalle de productos
                    </span>

                    <h2>
                        Productos incluidos en esta compra
                    </h2>

                </div>


                <div class="product-count">

                    {{ $compra->detalles->count() }}

                    {{ $compra->detalles->count() === 1
                        ? 'producto'
                        : 'productos'
                    }}

                </div>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Producto</th>

                            <th>Código</th>

                            <th class="text-center">
                                Cantidad
                            </th>

                            <th class="text-right">
                                Precio
                            </th>

                            <th class="text-right">
                                Subtotal
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($compra->detalles as $index => $detalle)

                            <tr>

                                {{-- NÚMERO --}}
                                <td class="number-cell">
                                    {{ $index + 1 }}
                                </td>


                                {{-- PRODUCTO --}}
                                <td>

                                    <div class="product-info">

                                        <div class="product-icon">

                                            <svg width="18" height="18"
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2">

                                                <path d="M6 2h12l2 5H4l2-5Z"/>
                                                <path d="M4 7h16v15H4z"/>

                                            </svg>

                                        </div>


                                        <div>

                                            <strong>
                                                {{ $detalle->producto->nombre ?? 'Producto eliminado' }}
                                            </strong>


                                            @if($detalle->producto?->categoria)

                                                <span>
                                                    {{ $detalle->producto->categoria->nombre }}
                                                </span>

                                            @endif

                                        </div>

                                    </div>

                                </td>


                                {{-- CÓDIGO --}}
                                <td>

                                    <span class="code-badge">
                                        {{ $detalle->producto->codigo ?? 'N/A' }}
                                    </span>

                                </td>


                                {{-- CANTIDAD --}}
                                <td class="text-center">

                                    <span class="quantity-badge">
                                        {{ $detalle->cantidad }}
                                    </span>

                                </td>


                                {{-- PRECIO --}}
                                <td class="text-right">

                                    L {{ number_format($detalle->precio, 2) }}

                                </td>


                                {{-- SUBTOTAL --}}
                                <td class="text-right subtotal-cell">

                                    L {{ number_format($detalle->subtotal, 2) }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6" class="empty-row">

                                    No hay productos registrados
                                    en esta compra.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- PARTE INFERIOR --}}
        <div class="bottom-grid">


            {{-- INFORMACIÓN DE INVENTARIO --}}
            <div class="note-card">

                <div class="note-icon">

                    <svg width="22" height="22"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 8v4"/>
                        <path d="M12 16h.01"/>

                    </svg>

                </div>


                <div>

                    <h3>
                        Información del inventario
                    </h3>

                    <p>
                        Esta compra genera automáticamente
                        una entrada en el inventario por cada
                        producto registrado.
                    </p>

                    <p>
                        Los movimientos de inventario forman
                        parte del historial del sistema y no
                        deben eliminarse.
                    </p>

                </div>

            </div>


            {{-- RESUMEN --}}
            <div class="summary-card">

                <div class="summary-row">

                    <span>
                        Subtotal
                    </span>

                    <strong>
                        L {{ number_format($compra->subtotal, 2) }}
                    </strong>

                </div>


                <div class="summary-row">

                    <span>
                        Impuesto
                    </span>

                    <strong>
                        L {{ number_format($compra->impuesto, 2) }}
                    </strong>

                </div>


                <div class="summary-divider"></div>


                <div class="summary-total">

                    <span>
                        Total
                    </span>

                    <strong>
                        L {{ number_format($compra->total, 2) }}
                    </strong>

                </div>

            </div>

        </div>

    </div>


    <style>

        /* ========================================
           CONTENEDOR PRINCIPAL
        ======================================== */

        .compras-show-page {

            max-width: 1400px;

            margin: 0 auto;

            /*
             * Espacio superior adicional para evitar
             * que el contenido quede debajo del header
             */
            padding: 45px 32px 32px;

            color: #172033;

        }


        /* ========================================
           ENCABEZADO
        ======================================== */

        .page-header {

            background:
                linear-gradient(
                    135deg,
                    #111827,
                    #1e293b
                );

            border-radius: 18px;

            padding: 30px 32px;

            color: white;

            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            gap: 25px;

            margin-bottom: 25px;

            box-shadow:
                0 12px 30px
                rgba(15, 23, 42, .12);

        }


        .header-left {

            min-width: 0;

        }


        /* ========================================
           BOTÓN VOLVER
        ======================================== */

        .back-button {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            background:
                rgba(255, 255, 255, 0.10);

            border:
                1px solid
                rgba(255, 255, 255, 0.18);

            color: white;

            text-decoration: none;

            font-size: 13px;

            font-weight: 700;

            padding: 9px 13px;

            border-radius: 9px;

            margin-bottom: 20px;

            transition:
                all .2s ease;

        }


        .back-button:hover {

            background:
                rgba(255, 255, 255, 0.18);

            transform:
                translateX(-2px);

        }


        /* ========================================
           MARCA
        ======================================== */

        .header-brand {

            display: block;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 2px;

            color: #94a3b8;

            margin-bottom: 6px;

        }


        .page-header h1 {

            margin: 0;

            font-size: 30px;

            font-weight: 800;

        }


        .page-header p {

            margin: 8px 0 0;

            color: #cbd5e1;

            font-size: 14px;

        }


        .page-header p strong {

            color: white;

        }


        .header-actions {

            flex-shrink: 0;

        }


        /* ========================================
           BOTONES
        ======================================== */

        .btn {

            border: none;

            border-radius: 10px;

            padding: 11px 16px;

            display: inline-flex;

            align-items: center;

            gap: 8px;

            text-decoration: none;

            font-weight: 700;

            font-size: 14px;

            cursor: pointer;

        }


        .btn-light {

            background: white;

            color: #172033;

        }


        .btn-light:hover {

            background: #f1f5f9;

        }


        /* ========================================
           INFORMACIÓN
        ======================================== */

        .info-grid {

            display: grid;

            grid-template-columns:
                repeat(4, 1fr);

            gap: 18px;

            margin-bottom: 20px;

        }


        .info-card {

            background: white;

            border:
                1px solid #e5e7eb;

            border-radius: 15px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 14px;

            box-shadow:
                0 5px 18px
                rgba(15, 23, 42, .05);

        }


        .info-icon {

            width: 45px;

            height: 45px;

            border-radius: 12px;

            background: #eef2ff;

            color: #1e3a8a;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

        }


        .info-card span {

            display: block;

            color: #64748b;

            font-size: 12px;

            margin-bottom: 5px;

        }


        .info-card strong {

            display: block;

            font-size: 14px;

            color: #172033;

        }


        /* ========================================
           ESTADO
        ======================================== */

        .status-card {

            background: white;

            border:
                1px solid #e5e7eb;

            border-radius: 15px;

            padding: 20px 24px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 20px;

            box-shadow:
                0 5px 18px
                rgba(15, 23, 42, .05);

        }


        .section-label {

            display: block;

            color: #64748b;

            text-transform: uppercase;

            letter-spacing: .8px;

            font-size: 11px;

            font-weight: 800;

            margin-bottom: 5px;

        }


        .status-card h2 {

            margin: 0;

            font-size: 17px;

        }


        .status-badge {

            padding: 8px 13px;

            border-radius: 999px;

            font-size: 11px;

            font-weight: 800;

        }


        .completed {

            background: #dcfce7;

            color: #166534;

        }


        .pending {

            background: #fef3c7;

            color: #92400e;

        }


        .cancelled {

            background: #fee2e2;

            color: #991b1b;

        }


        /* ========================================
           TABLA
        ======================================== */

        .table-card {

            background: white;

            border:
                1px solid #e5e7eb;

            border-radius: 17px;

            overflow: hidden;

            box-shadow:
                0 5px 18px
                rgba(15, 23, 42, .05);

            margin-bottom: 20px;

        }


        .card-header {

            padding: 22px 24px;

            border-bottom:
                1px solid #e5e7eb;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 15px;

        }


        .card-header h2 {

            margin: 0;

            font-size: 18px;

            color: #172033;

        }


        .product-count {

            background: #eef2ff;

            color: #1e3a8a;

            padding: 8px 12px;

            border-radius: 9px;

            font-size: 12px;

            font-weight: 800;

            white-space: nowrap;

        }


        .table-wrapper {

            overflow-x: auto;

        }


        table {

            width: 100%;

            border-collapse: collapse;

        }


        th {

            background: #f8fafc;

            color: #64748b;

            font-size: 11px;

            text-transform: uppercase;

            letter-spacing: .5px;

            padding: 14px 18px;

            text-align: left;

            white-space: nowrap;

        }


        td {

            padding: 17px 18px;

            border-top:
                1px solid #eef2f7;

            font-size: 14px;

            color: #334155;

        }


        .number-cell {

            color: #94a3b8;

            font-weight: 700;

            width: 45px;

        }


        .product-info {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .product-icon {

            width: 38px;

            height: 38px;

            border-radius: 10px;

            background: #f1f5f9;

            color: #334155;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

        }


        .product-info strong {

            display: block;

            color: #172033;

            font-size: 14px;

        }


        .product-info span {

            display: block;

            color: #94a3b8;

            font-size: 11px;

            margin-top: 3px;

        }


        .code-badge {

            display: inline-block;

            background: #f1f5f9;

            color: #475569;

            padding: 6px 9px;

            border-radius: 7px;

            font-size: 11px;

            font-weight: 800;

        }


        .quantity-badge {

            display: inline-block;

            min-width: 34px;

            text-align: center;

            background: #eef2ff;

            color: #1e3a8a;

            padding: 6px 9px;

            border-radius: 7px;

            font-weight: 800;

        }


        .text-center {

            text-align: center;

        }


        .text-right {

            text-align: right;

        }


        .subtotal-cell {

            font-weight: 800;

            color: #172033;

        }


        .empty-row {

            text-align: center;

            padding: 35px;

            color: #94a3b8;

        }


        /* ========================================
           PARTE INFERIOR
        ======================================== */

        .bottom-grid {

            display: grid;

            grid-template-columns:
                1fr 380px;

            gap: 20px;

            align-items: stretch;

        }


        /* ========================================
           NOTA
        ======================================== */

        .note-card {

            background: #f8fafc;

            border:
                1px solid #e5e7eb;

            border-radius: 15px;

            padding: 22px;

            display: flex;

            gap: 15px;

        }


        .note-icon {

            width: 42px;

            height: 42px;

            border-radius: 10px;

            background: #e0e7ff;

            color: #1e3a8a;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

        }


        .note-card h3 {

            margin: 0 0 7px;

            font-size: 15px;

            color: #172033;

        }


        .note-card p {

            margin: 4px 0;

            color: #64748b;

            font-size: 13px;

            line-height: 1.6;

        }


        /* ========================================
           RESUMEN
        ======================================== */

        .summary-card {

            background: white;

            border:
                1px solid #e5e7eb;

            border-radius: 15px;

            padding: 22px;

            box-shadow:
                0 5px 18px
                rgba(15, 23, 42, .05);

        }


        .summary-row {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            margin-bottom: 14px;

            font-size: 14px;

        }


        .summary-row span {

            color: #64748b;

        }


        .summary-row strong {

            color: #172033;

        }


        .summary-divider {

            height: 1px;

            background: #e5e7eb;

            margin: 18px 0;

        }


        .summary-total {

            display: flex;

            justify-content: space-between;

            align-items: center;

        }


        .summary-total span {

            color: #172033;

            font-size: 16px;

            font-weight: 800;

        }


        .summary-total strong {

            color: #1e3a8a;

            font-size: 23px;

            font-weight: 900;

        }


        /* ========================================
           RESPONSIVE
        ======================================== */

        @media (max-width: 1100px) {

            .info-grid {

                grid-template-columns:
                    repeat(2, 1fr);

            }


            .bottom-grid {

                grid-template-columns: 1fr;

            }

        }


        @media (max-width: 700px) {

            .compras-show-page {

                padding:
                    30px 18px 18px;

            }


            .page-header {

                padding: 22px;

                flex-direction: column;

                align-items: flex-start;

            }


            .page-header h1 {

                font-size: 25px;

            }


            .info-grid {

                grid-template-columns: 1fr;

            }


            .status-card {

                align-items: flex-start;

                flex-direction: column;

                gap: 12px;

            }


            .card-header {

                align-items: flex-start;

                flex-direction: column;

            }


            th,
            td {

                padding:
                    13px 12px;

            }

        }

    </style>

</x-app-layout>