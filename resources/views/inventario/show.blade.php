<x-app-layout>

    <style>
        .inventario-show-page {
            max-width: 1000px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .show-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .show-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .show-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .show-header p {
            margin: 8px 0 0;
            color: #cbd5e1;
            font-size: 15px;
        }

        .detail-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .08);
            margin-bottom: 24px;
        }

        .detail-header {
            padding: 24px 28px;
            border-bottom: 1px solid #e2e8f0;
        }

        .detail-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 20px;
            font-weight: 800;
        }

        .detail-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .detail-body {
            padding: 28px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .detail-item {
            padding: 18px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
        }

        .detail-item.full {
            grid-column: 1 / -1;
        }

        .detail-label {
            color: #64748b;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 7px;
            text-transform: uppercase;
            letter-spacing: .03em;
        }

        .detail-value {
            color: #0f172a;
            font-size: 15px;
            font-weight: 700;
        }

        .codigo {
            color: #4338ca;
            font-family: monospace;
            font-weight: 800;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 7px 12px;
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

        .info-box {
            display: flex;
            gap: 13px;
            align-items: flex-start;
            padding: 17px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 12px;
            color: #1e40af;
        }

        .info-box svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        .info-box strong {
            display: block;
            margin-bottom: 4px;
            font-size: 13px;
        }

        .info-box p {
            margin: 0;
            font-size: 12px;
            line-height: 1.5;
        }

        .actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 24px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 44px;
            padding: 0 18px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
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

        @media (max-width: 700px) {

            .inventario-show-page {
                padding: 20px 14px 35px;
            }

            .show-header {
                padding: 23px;
            }

            .show-header h1 {
                font-size: 25px;
            }

            .detail-body {
                padding: 20px;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .detail-item.full {
                grid-column: auto;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>


    <div class="inventario-show-page">

        {{-- ENCABEZADO --}}
        <div class="show-header">

            <small>Supermercado Prisma</small>

            <h1>
                Detalle del movimiento
            </h1>

            <p>
                Consulta la información registrada en el historial de inventario.
            </p>

        </div>


        {{-- INFORMACIÓN DEL MOVIMIENTO --}}
        <div class="detail-card">

            <div class="detail-header">

                <h2>
                    Información del movimiento
                </h2>

                <p>
                    Registro permanente del historial de inventario.
                </p>

            </div>


            <div class="detail-body">

                <div class="detail-grid">

                    {{-- ID --}}
                    <div class="detail-item">

                        <div class="detail-label">
                            ID del movimiento
                        </div>

                        <div class="detail-value">
                            #{{ $movimiento->id }}
                        </div>

                    </div>


                    {{-- TIPO --}}
                    <div class="detail-item">

                        <div class="detail-label">
                            Tipo de movimiento
                        </div>

                        <div class="detail-value">

                            @if($movimiento->tipo === 'ENTRADA')

                                <span class="badge badge-entry">
                                    ENTRADA
                                </span>

                            @else

                                <span class="badge badge-exit">
                                    SALIDA
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- PRODUCTO --}}
                    <div class="detail-item full">

                        <div class="detail-label">
                            Producto
                        </div>

                        <div class="detail-value">

                            @if($movimiento->producto)

                                <span class="codigo">
                                    {{ $movimiento->producto->codigo }}
                                </span>

                                —
                                {{ $movimiento->producto->nombre }}

                            @else

                                Producto eliminado

                            @endif

                        </div>

                    </div>


                    {{-- CANTIDAD --}}
                    <div class="detail-item">

                        <div class="detail-label">
                            Cantidad
                        </div>

                        <div class="detail-value">
                            {{ $movimiento->cantidad }} unidad(es)
                        </div>

                    </div>


                    {{-- FECHA --}}
                    <div class="detail-item">

                        <div class="detail-label">
                            Fecha y hora
                        </div>

                        <div class="detail-value">

                            {{ \Carbon\Carbon::parse($movimiento->fecha)->format('d/m/Y H:i') }}

                        </div>

                    </div>


                    {{-- MOTIVO --}}
                    <div class="detail-item">

                        <div class="detail-label">
                            Motivo
                        </div>

                        <div class="detail-value">

                            {{ $movimiento->motivo ?: 'Sin motivo especificado' }}

                        </div>

                    </div>


                    {{-- REFERENCIA --}}
                    <div class="detail-item">

                        <div class="detail-label">
                            Referencia
                        </div>

                        <div class="detail-value">

                            {{ $movimiento->referencia ?: 'Sin referencia' }}

                        </div>

                    </div>


                    {{-- USUARIO --}}
                    <div class="detail-item">

                        <div class="detail-label">
                            Usuario responsable
                        </div>

                        <div class="detail-value">

                            {{ $movimiento->usuario->name ?? 'Usuario no disponible' }}

                        </div>

                    </div>


                    {{-- STOCK ACTUAL --}}
                    <div class="detail-item">

                        <div class="detail-label">
                            Stock actual del producto
                        </div>

                        <div class="detail-value">

                            @if($movimiento->producto)

                                {{ $movimiento->producto->stock }} unidad(es)

                            @else

                                No disponible

                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- AVISO --}}
        <div class="detail-card">

            <div class="detail-body">

                <div class="info-box">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 11v5"/>
                        <path d="M12 8h.01"/>

                    </svg>

                    <div>

                        <strong>
                            Registro permanente
                        </strong>

                        <p>
                            Este movimiento forma parte del historial del inventario.
                            Por seguridad y control de existencias, los movimientos
                            registrados no pueden modificarse ni eliminarse.
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- BOTÓN --}}
        <div class="actions">

            <a
                href="{{ route('inventario.index') }}"
                class="btn btn-secondary"
            >

                <svg viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">

                    <path d="M19 12H5"/>
                    <path d="M12 19l-7-7 7-7"/>

                </svg>

                Volver a inventario

            </a>

        </div>

    </div>

</x-app-layout>