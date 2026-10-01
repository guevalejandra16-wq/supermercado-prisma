<x-app-layout>

    <div class="clientes-page">

        {{-- ENCABEZADO --}}
        <div class="page-header">

            <div>
                <span class="header-label">
                    SUPERMERCADO PRISMA
                </span>

                <h1>
                    Clientes
                </h1>

                <p>
                    Administra la información de los clientes registrados en el sistema.
                </p>
            </div>

            @if(auth()->user()->hasPrivilege('clientes.crear'))

                <a href="{{ route('clientes.create') }}" class="btn-primary">

                    <svg width="18" height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>

                    </svg>

                    Nuevo cliente

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

            <div class="stat-card">

                <div class="stat-icon">

                    <svg width="22" height="22"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path d="M20 21v-2a4 4 0 0 0-4-4H8
                            a4 4 0 0 0-4 4v2">
                        </path>

                        <circle cx="12" cy="7" r="4"></circle>

                    </svg>

                </div>

                <div>

                    <span>
                        TOTAL CLIENTES
                    </span>

                    <strong>
                        {{ $clientes->count() }}
                    </strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon active-icon">

                    <svg width="22" height="22"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path d="M20 6L9 17l-5-5"></path>

                    </svg>

                </div>

                <div>

                    <span>
                        CLIENTES ACTIVOS
                    </span>

                    <strong>
                        {{ $clientes->where('estado', true)->count() }}
                    </strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon inactive-icon">

                    <svg width="22" height="22"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>

                    </svg>

                </div>

                <div>

                    <span>
                        CLIENTES INACTIVOS
                    </span>

                    <strong>
                        {{ $clientes->where('estado', false)->count() }}
                    </strong>

                </div>

            </div>


            <div class="stat-card">

                <div class="stat-icon document-icon">

                    <svg width="22" height="22"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path d="M4 4h16v16H4z"></path>
                        <path d="M8 8h8"></path>
                        <path d="M8 12h8"></path>
                        <path d="M8 16h5"></path>

                    </svg>

                </div>

                <div>

                    <span>
                        CON DNI REGISTRADO
                    </span>

                    <strong>
                        {{ $clientes->whereNotNull('dni')->where('dni', '!=', '')->count() }}
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
                        Lista de clientes
                    </h2>

                    <p>
                        Clientes registrados actualmente en Supermercado Prisma.
                    </p>

                </div>

                <div class="record-count">

                    {{ $clientes->count() }}
                    {{ $clientes->count() == 1 ? 'cliente' : 'clientes' }}

                </div>

            </div>


            @if($clientes->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Cliente
                                </th>

                                <th>
                                    DNI
                                </th>

                                <th>
                                    Teléfono
                                </th>

                                <th>
                                    Correo
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

                            @foreach($clientes as $cliente)

                                <tr>

                                    {{-- CLIENTE --}}
                                    <td>

                                        <div class="client-info">

                                            <div class="client-avatar">

                                                {{ strtoupper(substr($cliente->nombre, 0, 1)) }}

                                            </div>

                                            <div>

                                                <strong>
                                                    {{ $cliente->nombre }}
                                                    {{ $cliente->apellido }}
                                                </strong>

                                                <small>
                                                    Cliente #{{ str_pad($cliente->id, 4, '0', STR_PAD_LEFT) }}
                                                </small>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- DNI --}}
                                    <td>

                                        @if($cliente->dni)

                                            <span class="dni">
                                                {{ $cliente->dni }}
                                            </span>

                                        @else

                                            <span class="not-available">
                                                No registrado
                                            </span>

                                        @endif

                                    </td>


                                    {{-- TELÉFONO --}}
                                    <td>

                                        @if($cliente->telefono)

                                            {{ $cliente->telefono }}

                                        @else

                                            <span class="not-available">
                                                No registrado
                                            </span>

                                        @endif

                                    </td>


                                    {{-- CORREO --}}
                                    <td>

                                        @if($cliente->correo)

                                            <span class="email">
                                                {{ $cliente->correo }}
                                            </span>

                                        @else

                                            <span class="not-available">
                                                No registrado
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ESTADO --}}
                                    <td>

                                        @if($cliente->estado)

                                            <span class="status active">
                                                Activo
                                            </span>

                                        @else

                                            <span class="status inactive">
                                                Inactivo
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ACCIONES --}}
                                    <td>

                                        <div class="actions">

                                            @if(auth()->user()->hasPrivilege('clientes.ver'))

                                                <a href="{{ route('clientes.show', $cliente) }}"
                                                   class="action-btn view"
                                                   title="Ver cliente">

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


                                            @if(auth()->user()->hasPrivilege('clientes.editar'))

                                                <a href="{{ route('clientes.edit', $cliente) }}"
                                                   class="action-btn edit"
                                                   title="Editar cliente">

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


                                            @if(auth()->user()->hasPrivilege('clientes.eliminar'))

                                                <form action="{{ route('clientes.destroy', $cliente) }}"
                                                      method="POST"
                                                      onsubmit="return confirm('¿Estás seguro de eliminar este cliente?');">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit"
                                                            class="action-btn delete"
                                                            title="Eliminar cliente">

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

                {{-- ESTADO VACÍO --}}
                <div class="empty-state">

                    <div class="empty-icon">

                        <svg width="32" height="32"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7">

                            <path d="M20 21v-2a4 4 0 0 0-4-4H8
                                a4 4 0 0 0-4 4v2">
                            </path>

                            <circle cx="12" cy="7" r="4"></circle>

                        </svg>

                    </div>

                    <h3>
                        No hay clientes registrados
                    </h3>

                    <p>
                        Comienza registrando el primer cliente del sistema.
                    </p>

                    @if(auth()->user()->hasPrivilege('clientes.crear'))

                        <a href="{{ route('clientes.create') }}"
                           class="btn-secondary">

                            Registrar cliente

                        </a>

                    @endif

                </div>

            @endif

        </div>

    </div>


    <style>

        .clientes-page {
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

        .inactive-icon {
            background: #fee2e2;
            color: #991b1b;
        }

        .document-icon {
            background: #f1f5f9;
            color: #475569;
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
            font-size: 23px;
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

        .client-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .client-avatar {
            width: 40px;
            height: 40px;
            min-width: 40px;
            border-radius: 10px;
            background: #e2e8f0;
            color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 750;
        }

        .client-info strong {
            display: block;
            color: #1e293b;
            font-size: 14px;
            font-weight: 700;
        }

        .client-info small {
            display: block;
            color: #94a3b8;
            font-size: 11px;
            margin-top: 3px;
        }

        .dni {
            font-family: monospace;
            font-size: 12px;
            background: #f1f5f9;
            color: #475569;
            padding: 5px 8px;
            border-radius: 6px;
        }

        .email {
            color: #475569;
            font-size: 12px;
        }

        .not-available {
            color: #94a3b8;
            font-size: 12px;
            font-style: italic;
        }

        .status {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: 5px 10px;
            font-size: 11px;
            font-weight: 700;
        }

        .status.active {
            background: #dcfce7;
            color: #166534;
        }

        .status.inactive {
            background: #fee2e2;
            color: #991b1b;
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

            .clientes-page {
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

            .table-wrapper {
                margin: 0;
            }

        }

    </style>

</x-app-layout>