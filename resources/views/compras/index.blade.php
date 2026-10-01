<x-app-layout>

    <div class="compras-page">

        {{-- ENCABEZADO --}}
        <div class="page-header">

            <div>

                <span class="header-label">
                    SUPERMERCADO PRISMA
                </span>

                <h1>
                    Compras
                </h1>

                <p>
                    Registra y consulta las compras realizadas a los proveedores.
                </p>

            </div>

            @if(auth()->user()->hasPrivilege('compras.crear'))

                <a href="{{ route('compras.create') }}" class="btn-primary">

                    <svg width="18" height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>

                    </svg>

                    Nueva compra

                </a>

            @endif

        </div>


        {{-- MENSAJES --}}
        @if(session('success'))

            <div class="alert success">

                <svg width="20" height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2">

                    <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                    <polyline points="22 4 12 14.01 9 11.01"></polyline>

                </svg>

                <span>
                    {{ session('success') }}
                </span>

            </div>

        @endif


        @if(session('error'))

            <div class="alert error">

                <svg width="20" height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2">

                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>

                </svg>

                <span>
                    {{ session('error') }}
                </span>

            </div>

        @endif


        {{-- ESTADÍSTICAS --}}
        <div class="stats-grid">

            {{-- TOTAL --}}
            <div class="stat-card">

                <div class="stat-icon">

                    <svg width="22" height="22"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path d="M6 2h12v20H6z"></path>
                        <path d="M9 6h6"></path>
                        <path d="M9 10h6"></path>
                        <path d="M9 14h4"></path>

                    </svg>

                </div>

                <div>

                    <span>
                        TOTAL COMPRAS
                    </span>

                    <strong>
                        {{ $compras->count() }}
                    </strong>

                </div>

            </div>


            {{-- COMPLETADAS --}}
            <div class="stat-card">

                <div class="stat-icon active-icon">

                    <svg width="22" height="22"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>

                    </svg>

                </div>

                <div>

                    <span>
                        COMPLETADAS
                    </span>

                    <strong>
                        {{ $compras->where('estado', 'COMPLETADA')->count() }}
                    </strong>

                </div>

            </div>


            {{-- PENDIENTES --}}
            <div class="stat-card">

                <div class="stat-icon warning-icon">

                    <svg width="22" height="22"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>

                    </svg>

                </div>

                <div>

                    <span>
                        PENDIENTES
                    </span>

                    <strong>
                        {{ $compras->where('estado', 'PENDIENTE')->count() }}
                    </strong>

                </div>

            </div>


            {{-- TOTAL COMPRADO --}}
            <div class="stat-card">

                <div class="stat-icon money-icon">

                    <svg width="22" height="22"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M12 7v10"></path>
                        <path d="M15 9.5c0-1-1-2-3-2s-3 1-3 2
                            1 2 3 2 3 1 3 2-1 2-3 2-3-1-3-2">
                        </path>

                    </svg>

                </div>

                <div>

                    <span>
                        INVERSIÓN TOTAL
                    </span>

                    <strong>
                        L {{ number_format($compras->sum('total'), 2) }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- TABLA --}}
        <div class="content-card">

            <div class="card-header">

                <div>

                    <span class="section-label">
                        REGISTRO
                    </span>

                    <h2>
                        Historial de compras
                    </h2>

                    <p>
                        Compras registradas en Supermercado Prisma.
                    </p>

                </div>

                <div class="record-count">

                    {{ $compras->count() }}

                    {{ $compras->count() == 1 ? 'compra' : 'compras' }}

                </div>

            </div>


            @if($compras->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Compra
                                </th>

                                <th>
                                    Proveedor
                                </th>

                                <th>
                                    Fecha
                                </th>

                                <th>
                                    Registrado por
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

                            @foreach($compras as $compra)

                                <tr>

                                    {{-- NÚMERO --}}
                                    <td>

                                        <span class="purchase-code">
                                            {{ $compra->numero_compra }}
                                        </span>

                                    </td>


                                    {{-- PROVEEDOR --}}
                                    <td>

                                        <div class="provider-info">

                                            <div class="provider-icon">

                                                <svg width="18" height="18"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2">

                                                    <path d="M3 21h18"></path>
                                                    <path d="M5 21V7l7-4 7 4v14"></path>
                                                    <path d="M9 21v-5h6v5"></path>

                                                </svg>

                                            </div>

                                            <div>

                                                <strong>
                                                    {{ $compra->proveedor->nombre ?? 'Sin proveedor' }}
                                                </strong>

                                                @if($compra->proveedor)

                                                    <small>
                                                        {{ $compra->proveedor->rtn ?: 'Sin RTN' }}
                                                    </small>

                                                @endif

                                            </div>

                                        </div>

                                    </td>


                                    {{-- FECHA --}}
                                    <td>

                                        <div class="date-info">

                                            <strong>
                                                {{ \Carbon\Carbon::parse($compra->fecha)->format('d/m/Y') }}
                                            </strong>

                                            <small>
                                                {{ \Carbon\Carbon::parse($compra->fecha)->format('H:i') }}
                                            </small>

                                        </div>

                                    </td>


                                    {{-- USUARIO --}}
                                    <td>

                                        <span class="user-name">
                                            {{ $compra->usuario->name ?? 'Sin usuario' }}
                                        </span>

                                    </td>


                                    {{-- TOTAL --}}
                                    <td>

                                        <strong class="price">
                                            L {{ number_format($compra->total, 2) }}
                                        </strong>

                                    </td>


                                    {{-- ESTADO --}}
                                    <td>

                                        @if($compra->estado === 'COMPLETADA')

                                            <span class="status active">
                                                Completada
                                            </span>

                                        @elseif($compra->estado === 'PENDIENTE')

                                            <span class="status pending">
                                                Pendiente
                                            </span>

                                        @elseif($compra->estado === 'CANCELADA')

                                            <span class="status inactive">
                                                Cancelada
                                            </span>

                                        @else

                                            <span class="status neutral">
                                                {{ $compra->estado }}
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ACCIONES --}}
                                    <td>

                                        <div class="actions">

                                            @if(auth()->user()->hasPrivilege('compras.ver'))

                                                <a href="{{ route('compras.show', $compra) }}"
                                                   class="action-btn view"
                                                   title="Ver compra">

                                                    <svg width="17" height="17"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2">

                                                        <path d="M1 12s4-8 11-8
                                                            11 8 11 8-4 8-11 8
                                                            -11-8-11-8z">
                                                        </path>

                                                        <circle cx="12" cy="12" r="3"></circle>

                                                    </svg>

                                                </a>

                                            @endif


                                            @if(auth()->user()->hasPrivilege('compras.editar'))

                                                <a href="{{ route('compras.edit', $compra) }}"
                                                   class="action-btn edit"
                                                   title="Editar compra">

                                                    <svg width="17" height="17"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2">

                                                        <path d="M12 20h9"></path>

                                                        <path d="M16.5 3.5
                                                            a2.121 2.121 0 0 1 3 3
                                                            L7 19l-4 1 1-4L16.5 3.5z">
                                                        </path>

                                                    </svg>

                                                </a>

                                            @endif


                                            @if(auth()->user()->hasPrivilege('compras.eliminar'))

                                                <form action="{{ route('compras.destroy', $compra) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('Las compras forman parte del historial del inventario. ¿Deseas continuar?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="action-btn delete"
                                                            title="Eliminar compra">

                                                        <svg width="17" height="17"
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="2">

                                                            <polyline points="3 6 5 6 21 6"></polyline>

                                                            <path d="M19 6l-1 14H6L5 6"></path>

                                                            <path d="M10 11v6"></path>
                                                            <path d="M14 11v6"></path>

                                                            <path d="M9 6V4h6v2"></path>

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

            @else

                <div class="empty-state">

                    <div class="empty-icon">

                        <svg width="32" height="32"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7">

                            <path d="M6 2h12v20H6z"></path>
                            <path d="M9 6h6"></path>
                            <path d="M9 10h6"></path>
                            <path d="M9 14h4"></path>

                        </svg>

                    </div>

                    <h3>
                        No hay compras registradas
                    </h3>

                    <p>
                        Comienza registrando la primera compra del sistema.
                    </p>

                    @if(auth()->user()->hasPrivilege('compras.crear'))

                        <a href="{{ route('compras.create') }}"
                           class="btn-secondary">

                            Registrar compra

                        </a>

                    @endif

                </div>

            @endif

        </div>

    </div>


    <style>

        .compras-page {
            padding: 30px;
            max-width: 1450px;
            margin: 0 auto;
        }

        .page-header {
            background: #0f172a;
            color: white;
            border-radius: 18px;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 25px;
            margin-bottom: 24px;
        }

        .header-label {
            display: block;
            color: #94a3b8;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin-bottom: 7px;
        }

        .page-header h1 {
            margin: 0 0 8px;
            font-size: 30px;
            font-weight: 750;
        }

        .page-header p {
            margin: 0;
            color: #cbd5e1;
            font-size: 14px;
        }

        .btn-primary,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            text-decoration: none;
            border-radius: 10px;
            padding: 11px 17px;
            font-size: 14px;
            font-weight: 650;
            transition: .2s;
            border: 1px solid transparent;
        }

        .btn-primary {
            background: white;
            color: #0f172a;
        }

        .btn-primary:hover {
            background: #e2e8f0;
        }

        .btn-secondary {
            background: white;
            color: #334155;
            border-color: #dbe2ea;
        }

        .btn-secondary:hover {
            background: #f8fafc;
        }

        .alert {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .alert.success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert.error {
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
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            min-width: 44px;
            border-radius: 11px;
            background: #eef2ff;
            color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .active-icon {
            background: #dcfce7;
            color: #166534;
        }

        .warning-icon {
            background: #fef3c7;
            color: #92400e;
        }

        .money-icon {
            background: #e0e7ff;
            color: #3730a3;
        }

        .stat-card span {
            display: block;
            color: #64748b;
            font-size: 10px;
            font-weight: 750;
            letter-spacing: 1px;
            margin-bottom: 4px;
        }

        .stat-card strong {
            color: #0f172a;
            font-size: 22px;
            font-weight: 750;
        }

        .content-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        }

        .card-header {
            padding: 23px 25px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .section-label {
            display: block;
            color: #64748b;
            font-size: 10px;
            font-weight: 750;
            letter-spacing: 1.5px;
            margin-bottom: 6px;
        }

        .card-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 19px;
            font-weight: 750;
        }

        .card-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .record-count {
            background: #f1f5f9;
            color: #475569;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8fafc;
        }

        th {
            padding: 13px 18px;
            text-align: left;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-weight: 750;
            white-space: nowrap;
        }

        td {
            padding: 15px 18px;
            border-top: 1px solid #eef2f7;
            color: #475569;
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        .purchase-code {
            font-family: monospace;
            font-size: 12px;
            background: #f1f5f9;
            color: #475569;
            padding: 5px 8px;
            border-radius: 6px;
        }

        .provider-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .provider-icon {
            width: 36px;
            height: 36px;
            min-width: 36px;
            border-radius: 9px;
            background: #eef2ff;
            color: #475569;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .provider-info strong {
            display: block;
            color: #1e293b;
            font-size: 13px;
        }

        .provider-info small {
            display: block;
            color: #94a3b8;
            font-size: 11px;
            margin-top: 2px;
        }

        .date-info strong {
            display: block;
            color: #334155;
            font-size: 13px;
        }

        .date-info small {
            display: block;
            color: #94a3b8;
            font-size: 11px;
            margin-top: 2px;
        }

        .user-name {
            color: #475569;
            font-size: 12px;
        }

        .price {
            color: #0f172a;
            white-space: nowrap;
        }

        .status {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: 5px 10px;
            font-size: 11px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status.active {
            background: #dcfce7;
            color: #166534;
        }

        .status.pending {
            background: #fef3c7;
            color: #92400e;
        }

        .status.inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .status.neutral {
            background: #f1f5f9;
            color: #475569;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .actions form {
            margin: 0;
        }

        .action-btn {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border: 0;
            border-radius: 8px;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .action-btn.view {
            color: #334155;
            background: #f1f5f9;
        }

        .action-btn.view:hover {
            background: #e2e8f0;
        }

        .action-btn.edit {
            color: #1d4ed8;
            background: #dbeafe;
        }

        .action-btn.edit:hover {
            background: #bfdbfe;
        }

        .action-btn.delete {
            color: #b91c1c;
            background: #fee2e2;
        }

        .action-btn.delete:hover {
            background: #fecaca;
        }

        .empty-state {
            text-align: center;
            padding: 60px 25px;
        }

        .empty-icon {
            width: 66px;
            height: 66px;
            margin: 0 auto 16px;
            border-radius: 16px;
            background: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .empty-state h3 {
            margin: 0 0 7px;
            color: #1e293b;
            font-size: 17px;
        }

        .empty-state p {
            margin: 0 0 20px;
            color: #64748b;
            font-size: 13px;
        }

        @media (max-width: 1100px) {

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 700px) {

            .compras-page {
                padding: 18px;
            }

            .page-header {
                flex-direction: column;
                align-items: stretch;
                padding: 23px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .card-header {
                align-items: flex-start;
                flex-direction: column;
            }

        }

    </style>

</x-app-layout>