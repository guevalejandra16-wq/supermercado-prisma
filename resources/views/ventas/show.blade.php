<x-app-layout>

    <style>
        .venta-show {
            max-width: 1400px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .venta-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .venta-header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .venta-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .venta-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .venta-header p {
            margin: 8px 0 0;
            color: #cbd5e1;
            font-size: 15px;
        }

        .venta-status {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 16px;
            border-radius: 999px;
            background: #dcfce7;
            color: #15803d;
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
        }

        .venta-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        .info-card {
            background: white;
            border-radius: 18px;
            padding: 26px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.08);
        }

        .info-card h2 {
            margin: 0 0 22px;
            color: #0f172a;
            font-size: 20px;
            font-weight: 800;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 11px 0;
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

        .products-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.08);
            margin-bottom: 24px;
        }

        .products-title {
            padding: 25px 26px;
            border-bottom: 1px solid #e2e8f0;
        }

        .products-title h2 {
            margin: 0;
            color: #0f172a;
            font-size: 20px;
            font-weight: 800;
        }

        .products-title p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .products-table {
            width: 100%;
            border-collapse: collapse;
        }

        .products-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 13px;
            font-weight: 800;
            text-align: left;
            padding: 16px 26px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .products-table td {
            padding: 18px 26px;
            color: #334155;
            font-size: 14px;
            border-bottom: 1px solid #e2e8f0;
        }

        .products-table tbody tr:last-child td {
            border-bottom: none;
        }

        .products-table td strong {
            color: #0f172a;
        }

        .code {
            font-family: monospace;
            font-weight: 700;
            color: #475569;
        }

        .text-right {
            text-align: right !important;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }

        .summary-card {
            background: #0f172a;
            color: white;
            border-radius: 18px;
            padding: 28px;
        }

        .summary-card h2 {
            margin: 0 0 22px;
            font-size: 20px;
            font-weight: 800;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 10px 0;
            color: #cbd5e1;
        }

        .summary-row strong {
            color: white;
        }

        .summary-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 14px;
            padding-top: 18px;
            border-top: 1px solid #334155;
        }

        .summary-total span {
            font-size: 17px;
            font-weight: 800;
        }

        .summary-total strong {
            color: #10b981;
            font-size: 28px;
            font-weight: 900;
        }

        .payment-card {
            background: white;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.08);
        }

        .payment-card h2 {
            margin: 0 0 22px;
            color: #0f172a;
            font-size: 20px;
            font-weight: 800;
        }

        .payment-method {
            display: inline-flex;
            align-items: center;
            padding: 8px 14px;
            border-radius: 999px;
            background: #eef2ff;
            color: #4338ca;
            font-size: 13px;
            font-weight: 800;
        }

        .change {
            color: #2563eb !important;
            font-size: 16px !important;
        }

        .invoice-card {
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 24px;
            margin-bottom: 24px;
        }

        .invoice-card h2 {
            margin: 0 0 8px;
            color: #0f172a;
            font-size: 18px;
            font-weight: 800;
        }

        .invoice-card p {
            margin: 0;
            color: #64748b;
            font-size: 14px;
        }

        .invoice-number {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            border-radius: 8px;
            background: white;
            color: #0f172a;
            font-weight: 800;
            border: 1px solid #e2e8f0;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 14px;
            flex-wrap: wrap;
        }

        .actions-left,
        .actions-right {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;
            min-height: 46px;
            padding: 0 20px;
            border-radius: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-dark {
            background: #1e293b;
            color: white;
        }

        .btn-dark:hover {
            background: #0f172a;
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
            .venta-grid,
            .summary-grid {
                grid-template-columns: 1fr;
            }

            .venta-header-top {
                flex-direction: column;
            }
        }

        @media (max-width: 600px) {
            .venta-show {
                padding: 20px 14px 35px;
            }

            .venta-header {
                padding: 22px;
            }

            .venta-header h1 {
                font-size: 24px;
            }

            .info-card,
            .payment-card,
            .summary-card {
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

    <div class="venta-show">

        {{-- ENCABEZADO --}}
        <div class="venta-header">
            <div class="venta-header-top">

                <div>
                    <small>Supermercado Prisma</small>

                    <h1>
                        Venta {{ $venta->numero_venta }}
                    </h1>

                    <p>
                        Detalle completo de la venta registrada
                    </p>
                </div>

                <div class="venta-status">
                    <svg width="17" height="17" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M20 6 9 17l-5-5"/>
                    </svg>

                    {{ $venta->estado }}
                </div>

            </div>
        </div>


        {{-- INFORMACIÓN GENERAL --}}
        <div class="venta-grid">

            <div class="info-card">

                <h2>Información de la venta</h2>

                <div class="info-row">
                    <span class="info-label">Número de venta</span>
                    <span class="info-value">
                        {{ $venta->numero_venta }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Fecha</span>
                    <span class="info-value">
                        {{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y H:i') }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Cajero</span>
                    <span class="info-value">
                        {{ $venta->usuario->name ?? 'Sin usuario' }}
                    </span>
                </div>

                <div class="info-row">
                    <span class="info-label">Estado</span>
                    <span class="info-value">
                        {{ $venta->estado }}
                    </span>
                </div>

            </div>


            <div class="info-card">

                <h2>Información del cliente</h2>

                @if($venta->cliente)

                    <div class="info-row">
                        <span class="info-label">Nombre</span>
                        <span class="info-value">
                            {{ $venta->cliente->nombre }}
                            {{ $venta->cliente->apellido }}
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">DNI</span>
                        <span class="info-value">
                            {{ $venta->cliente->dni ?? 'No registrado' }}
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Teléfono</span>
                        <span class="info-value">
                            {{ $venta->cliente->telefono ?? 'No registrado' }}
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">Correo</span>
                        <span class="info-value">
                            {{ $venta->cliente->correo ?? 'No registrado' }}
                        </span>
                    </div>

                @else

                    <div style="
                        padding: 18px;
                        background: #f8fafc;
                        border-radius: 10px;
                        color: #64748b;
                        font-size: 14px;
                    ">
                        Venta realizada sin cliente registrado.
                    </div>

                @endif

            </div>

        </div>


        {{-- PRODUCTOS --}}
        <div class="products-card">

            <div class="products-title">

                <h2>Productos vendidos</h2>

                <p>
                    Productos incluidos en esta venta.
                </p>

            </div>

            <div class="table-wrapper">

                <table class="products-table">

                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th class="text-right">Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($venta->detalles as $detalle)

                            <tr>

                                <td class="code">
                                    {{ $detalle->producto->codigo ?? 'N/A' }}
                                </td>

                                <td>
                                    <strong>
                                        {{ $detalle->producto->nombre ?? 'Producto eliminado' }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $detalle->cantidad }}
                                </td>

                                <td>
                                    L {{ number_format($detalle->precio, 2) }}
                                </td>

                                <td class="text-right">
                                    <strong>
                                        L {{ number_format($detalle->subtotal, 2) }}
                                    </strong>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="5" style="
                                    text-align: center;
                                    padding: 35px;
                                    color: #64748b;
                                ">
                                    No hay productos registrados en esta venta.
                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- RESUMEN Y PAGO --}}
        <div class="summary-grid">

            <div class="summary-card">

                <h2>Resumen de venta</h2>

                <div class="summary-row">
                    <span>Subtotal</span>
                    <strong>
                        L {{ number_format($venta->subtotal, 2) }}
                    </strong>
                </div>

                <div class="summary-row">
                    <span>Descuento</span>
                    <strong>
                        L {{ number_format($venta->descuento, 2) }}
                    </strong>
                </div>

                <div class="summary-row">
                    <span>Impuesto</span>
                    <strong>
                        L {{ number_format($venta->impuesto, 2) }}
                    </strong>
                </div>

                <div class="summary-total">
                    <span>Total</span>

                    <strong>
                        L {{ number_format($venta->total, 2) }}
                    </strong>
                </div>

            </div>


            <div class="payment-card">

                <h2>Información de pago</h2>

                <div class="info-row">
                    <span class="info-label">Método de pago</span>

                    <span class="payment-method">
                        {{ $venta->metodo_pago }}
                    </span>
                </div>

                @if($venta->metodo_pago === 'EFECTIVO')

                    <div class="info-row">
                        <span class="info-label">
                            Efectivo recibido
                        </span>

                        <span class="info-value">
                            L {{ number_format($venta->efectivo_recibido, 2) }}
                        </span>
                    </div>

                    <div class="info-row">
                        <span class="info-label">
                            Cambio
                        </span>

                        <span class="info-value change">
                            L {{ number_format($venta->cambio, 2) }}
                        </span>
                    </div>

                @endif

            </div>

        </div>


        {{-- FACTURA RELACIONADA --}}
        @if($venta->factura)

            <div class="invoice-card">

                <h2>Factura generada automáticamente</h2>

                <p>
                    Esta venta tiene una factura asociada que fue generada automáticamente.
                </p>

                <div class="invoice-number">
                    {{ $venta->factura->numero_factura }}
                </div>

            </div>

        @endif


        {{-- ACCIONES --}}
        <div class="actions">

            <div class="actions-left">

                <a href="{{ route('ventas.index') }}"
                   class="btn btn-dark">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M19 12H5"/>
                        <path d="m12 19-7-7 7-7"/>

                    </svg>

                    Volver a ventas

                </a>

            </div>


            <div class="actions-right">

                @if($venta->factura)

                    <a href="{{ route('facturas.show', $venta->factura->id) }}"
                       class="btn btn-primary">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <path d="M14 2v6h6"/>
                            <path d="M8 13h8"/>
                            <path d="M8 17h5"/>

                        </svg>

                        Ver factura

                    </a>

                    <a href="{{ route('facturas.print', $venta->factura->id) }}"
                       target="_blank"
                       class="btn btn-primary">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <polyline points="6 9 6 2 18 2 18 9"/>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                            <rect x="6" y="14" width="12" height="8"/>

                        </svg>

                        Imprimir ticket

                    </a>

                @endif


                <form action="{{ route('ventas.destroy', $venta->id) }}"
                      method="POST"
                      onsubmit="return confirm('¿Estás seguro de eliminar esta venta? El stock será restaurado y la factura asociada será eliminada.');">

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

                        Eliminar venta

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>