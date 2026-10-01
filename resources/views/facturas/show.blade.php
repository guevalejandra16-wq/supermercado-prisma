<x-app-layout>

    <style>
        .factura-show-page {
            max-width: 1000px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .factura-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .factura-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .factura-header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .factura-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .factura-header p {
            margin: 8px 0 0;
            color: #cbd5e1;
            font-size: 15px;
        }

        .factura-number {
            padding: 10px 14px;
            border-radius: 10px;
            background: rgba(255,255,255,.08);
            border: 1px solid rgba(255,255,255,.12);
            color: #e0e7ff;
            font-family: monospace;
            font-size: 15px;
            font-weight: 800;
        }

        .card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .08);
            margin-bottom: 24px;
        }

        .card-header {
            padding: 23px 26px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 19px;
            font-weight: 800;
        }

        .card-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .card-body {
            padding: 26px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .info-item {
            padding: 16px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 11px;
        }

        .info-label {
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: .04em;
            margin-bottom: 6px;
        }

        .info-value {
            color: #0f172a;
            font-size: 14px;
            font-weight: 700;
        }

        .number {
            color: #4338ca;
            font-family: monospace;
            font-weight: 900;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .detail-table {
            width: 100%;
            border-collapse: collapse;
        }

        .detail-table th {
            padding: 15px 20px;
            background: #f8fafc;
            color: #475569;
            font-size: 12px;
            font-weight: 800;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .detail-table td {
            padding: 16px 20px;
            color: #334155;
            font-size: 14px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .detail-table tbody tr:last-child td {
            border-bottom: none;
        }

        .product-name {
            color: #0f172a;
            font-weight: 800;
        }

        .product-code {
            display: block;
            margin-top: 3px;
            color: #64748b;
            font-family: monospace;
            font-size: 11px;
        }

        .money {
            font-weight: 800;
            color: #0f172a;
        }

        .totals {
            max-width: 390px;
            margin-left: auto;
            padding: 22px 26px;
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 8px 0;
            color: #475569;
            font-size: 14px;
        }

        .total-row.discount {
            color: #dc2626;
        }

        .total-row.final {
            margin-top: 8px;
            padding-top: 15px;
            border-top: 2px solid #e2e8f0;
            color: #0f172a;
            font-size: 20px;
            font-weight: 900;
        }

        .payment-box {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 22px;
        }

        .payment-item {
            padding: 16px;
            border-radius: 11px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
        }

        .payment-label {
            color: #64748b;
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .payment-value {
            color: #0f172a;
            font-size: 15px;
            font-weight: 900;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .action-group {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 44px;
            padding: 0 18px;
            border-radius: 10px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 800;
            transition: .2s ease;
        }

        .btn svg {
            width: 17px;
            height: 17px;
        }

        .btn-secondary {
            background: white;
            color: #475569;
            border: 1px solid #cbd5e1;
        }

        .btn-secondary:hover {
            background: #f1f5f9;
        }

        .btn-primary {
            background: #4f46e5;
            color: white;
        }

        .btn-primary:hover {
            background: #4338ca;
            transform: translateY(-1px);
        }

        .btn-success {
            background: #15803d;
            color: white;
        }

        .btn-success:hover {
            background: #166534;
            transform: translateY(-1px);
        }

        .status {
            display: inline-flex;
            padding: 7px 11px;
            border-radius: 999px;
            background: #dcfce7;
            color: #15803d;
            font-size: 12px;
            font-weight: 800;
        }

        @media (max-width: 750px) {
            .factura-show-page {
                padding: 20px 14px 35px;
            }

            .factura-header {
                padding: 23px;
            }

            .factura-header-top {
                flex-direction: column;
            }

            .factura-header h1 {
                font-size: 25px;
            }

            .info-grid,
            .payment-box {
                grid-template-columns: 1fr;
            }

            .card-body {
                padding: 20px;
            }

            .actions {
                flex-direction: column;
            }

            .action-group {
                width: 100%;
                flex-direction: column;
            }

            .actions .btn {
                width: 100%;
            }
        }
    </style>


    <div class="factura-show-page">

        {{-- ENCABEZADO --}}
        <div class="factura-header">

            <div class="factura-header-top">

                <div>

                    <small>
                        Supermercado Prisma
                    </small>

                    <h1>
                        Detalle de factura
                    </h1>

                    <p>
                        Consulta completa del documento generado por la venta.
                    </p>

                </div>


                <div class="factura-number">

                    {{ $factura->numero_factura }}

                </div>

            </div>

        </div>


        {{-- INFORMACIÓN GENERAL --}}
        <div class="card">

            <div class="card-header">

                <h2>
                    Información de la factura
                </h2>

                <p>
                    Datos principales del documento.
                </p>

            </div>


            <div class="card-body">

                <div class="info-grid">

                    <div class="info-item">

                        <div class="info-label">
                            Número de factura
                        </div>

                        <div class="info-value number">
                            {{ $factura->numero_factura }}
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Número de venta
                        </div>

                        <div class="info-value number">
                            {{ $factura->venta->numero_venta ?? '—' }}
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Fecha y hora
                        </div>

                        <div class="info-value">

                            {{ \Carbon\Carbon::parse($factura->fecha)->format('d/m/Y H:i') }}

                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Estado
                        </div>

                        <div class="info-value">

                            <span class="status">
                                GENERADA
                            </span>

                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Cliente
                        </div>

                        <div class="info-value">

                            @if($factura->venta?->cliente)

                                {{ $factura->venta->cliente->nombre }}
                                {{ $factura->venta->cliente->apellido }}

                            @else

                                Consumidor final

                            @endif

                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Usuario responsable
                        </div>

                        <div class="info-value">

                            {{ $factura->venta->usuario->name ?? '—' }}

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- PRODUCTOS --}}
        <div class="card">

            <div class="card-header">

                <h2>
                    Productos vendidos
                </h2>

                <p>
                    Detalle de los productos incluidos en la venta.
                </p>

            </div>


            <div class="table-wrapper">

                <table class="detail-table">

                    <thead>

                        <tr>

                            <th>
                                Producto
                            </th>

                            <th>
                                Cantidad
                            </th>

                            <th>
                                Precio
                            </th>

                            <th>
                                Descuento
                            </th>

                            <th>
                                Subtotal
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($factura->venta->detalles as $detalle)

                            <tr>

                                <td>

                                    <span class="product-name">
                                        {{ $detalle->producto->nombre ?? 'Producto eliminado' }}
                                    </span>

                                    @if($detalle->producto)

                                        <span class="product-code">
                                            {{ $detalle->producto->codigo }}
                                        </span>

                                    @endif

                                </td>


                                <td>
                                    {{ $detalle->cantidad }}
                                </td>


                                <td>

                                    <span class="money">
                                        L. {{ number_format($detalle->precio, 2) }}
                                    </span>

                                </td>


                                <td>

                                    @if($detalle->descuento > 0)

                                        L. {{ number_format($detalle->descuento, 2) }}

                                    @else

                                        —

                                    @endif

                                </td>


                                <td>

                                    <span class="money">
                                        L. {{ number_format($detalle->subtotal, 2) }}
                                    </span>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            {{-- TOTALES --}}
            <div class="totals">

                <div class="total-row">

                    <span>
                        Subtotal
                    </span>

                    <strong>
                        L. {{ number_format($factura->subtotal, 2) }}
                    </strong>

                </div>


                @if($factura->descuento > 0)

                    <div class="total-row discount">

                        <span>
                            Descuento
                        </span>

                        <strong>
                            - L. {{ number_format($factura->descuento, 2) }}
                        </strong>

                    </div>

                @endif


                <div class="total-row">

                    <span>
                        Impuesto
                    </span>

                    <strong>
                        L. {{ number_format($factura->impuesto, 2) }}
                    </strong>

                </div>


                <div class="total-row final">

                    <span>
                        Total
                    </span>

                    <strong>
                        L. {{ number_format($factura->total, 2) }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- INFORMACIÓN DE PAGO --}}
        <div class="card">

            <div class="card-header">

                <h2>
                    Información de pago
                </h2>

                <p>
                    Método utilizado para completar la venta.
                </p>

            </div>


            <div class="card-body">

                <div class="payment-box">

                    <div class="payment-item">

                        <div class="payment-label">
                            Método de pago
                        </div>

                        <div class="payment-value">

                            {{ $factura->venta->metodo_pago ?? '—' }}

                        </div>

                    </div>


                    @if($factura->venta?->metodo_pago === 'EFECTIVO')

                        <div class="payment-item">

                            <div class="payment-label">
                                Efectivo recibido
                            </div>

                            <div class="payment-value">

                                L.
                                {{ number_format($factura->venta->efectivo_recibido, 2) }}

                            </div>

                        </div>


                        <div class="payment-item">

                            <div class="payment-label">
                                Cambio
                            </div>

                            <div class="payment-value">

                                L.
                                {{ number_format($factura->venta->cambio, 2) }}

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>


        {{-- BOTONES --}}
        <div class="actions">

            <a
                href="{{ route('facturas.index') }}"
                class="btn btn-secondary"
            >

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">

                    <path d="M19 12H5"/>
                    <path d="M12 19l-7-7 7-7"/>

                </svg>

                Volver a facturas

            </a>


            <div class="action-group">

                @if(auth()->user()->hasPrivilege('ventas.ver'))

                    <a
                        href="{{ route('ventas.show', $factura->venta_id) }}"
                        class="btn btn-primary"
                    >

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                            <circle cx="12" cy="12" r="3"/>

                        </svg>

                        Ver venta

                    </a>

                @endif


                @if(auth()->user()->hasPrivilege('facturas.reimprimir'))

                    <a
                        href="{{ route('facturas.print', $factura->id) }}"
                        target="_blank"
                        class="btn btn-success"
                    >

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <polyline points="6 9 6 2 18 2 18 9"/>
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                            <rect x="6" y="14" width="12" height="8"/>

                        </svg>

                        Reimprimir ticket

                    </a>

                @endif

            </div>

        </div>

    </div>

</x-app-layout>