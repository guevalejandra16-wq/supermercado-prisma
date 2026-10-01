<x-app-layout>

    <div class="proveedores-page">

        <!-- ENCABEZADO -->

        <div class="page-header">

            <div>

                <span class="section-label">
                    SUPERMERCADO PRISMA
                </span>

                <h1>Proveedores</h1>

                <p>
                    Administra los proveedores que abastecen al supermercado.
                </p>

            </div>


            @if(auth()->user()->hasPrivilege('proveedores.crear'))

                <a
                    href="{{ route('proveedores.create') }}"
                    class="btn btn-primary"
                >
                    + Nuevo proveedor
                </a>

            @endif

        </div>


        <!-- MENSAJES -->

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


        <!-- ESTADÍSTICAS -->

        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-label">
                    PROVEEDORES REGISTRADOS
                </div>

                <div class="stat-value">
                    {{ $proveedores->count() }}
                </div>

                <div class="stat-description">
                    Total de proveedores
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    PROVEEDORES ACTIVOS
                </div>

                <div class="stat-value">
                    {{ $proveedores->where('estado', true)->count() }}
                </div>

                <div class="stat-description">
                    Disponibles actualmente
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    PROVEEDORES INACTIVOS
                </div>

                <div class="stat-value">
                    {{ $proveedores->where('estado', false)->count() }}
                </div>

                <div class="stat-description">
                    No disponibles
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    PRODUCTOS ABASTECIDOS
                </div>

                <div class="stat-value">
                    {{ $proveedores->sum(fn($proveedor) => $proveedor->productos->count()) }}
                </div>

                <div class="stat-description">
                    Productos asociados
                </div>

            </div>

        </div>


        <!-- TABLA -->

        <div class="table-card">

            <div class="table-header">

                <div>

                    <h2>
                        Listado de proveedores
                    </h2>

                    <p>
                        Proveedores registrados en el sistema.
                    </p>

                </div>


                <span class="count-badge">

                    {{ $proveedores->count() }}

                    {{ $proveedores->count() == 1
                        ? 'proveedor'
                        : 'proveedores'
                    }}

                </span>

            </div>


            @if($proveedores->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>#</th>

                                <th>Proveedor</th>

                                <th>Teléfono</th>

                                <th>Correo</th>

                                <th>Contacto</th>

                                <th>Productos</th>

                                <th>Estado</th>

                                <th>Acciones</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($proveedores as $proveedor)

                                <tr>

                                    <!-- ID -->

                                    <td>

                                        <span class="row-number">
                                            {{ $proveedor->id }}
                                        </span>

                                    </td>


                                    <!-- PROVEEDOR -->

                                    <td>

                                        <div class="supplier-info">

                                            <div class="supplier-icon">

                                                <svg
                                                    width="19"
                                                    height="19"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M3 21h18"/>
                                                    <path d="M5 21V5a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v16"/>
                                                    <path d="M15 8h4a2 2 0 0 1 2 2v11"/>
                                                    <path d="M9 7h2"/>
                                                    <path d="M9 11h2"/>
                                                    <path d="M9 15h2"/>
                                                </svg>

                                            </div>


                                            <div>

                                                <div class="supplier-name">
                                                    {{ $proveedor->nombre }}
                                                </div>


                                                @if($proveedor->rtn)

                                                    <div class="supplier-rtn">
                                                        RTN: {{ $proveedor->rtn }}
                                                    </div>

                                                @endif

                                            </div>

                                        </div>

                                    </td>


                                    <!-- TELÉFONO -->

                                    <td>

                                        @if($proveedor->telefono)

                                            {{ $proveedor->telefono }}

                                        @else

                                            <span class="muted">
                                                —
                                            </span>

                                        @endif

                                    </td>


                                    <!-- CORREO -->

                                    <td>

                                        @if($proveedor->correo)

                                            {{ $proveedor->correo }}

                                        @else

                                            <span class="muted">
                                                —
                                            </span>

                                        @endif

                                    </td>


                                    <!-- CONTACTO -->

                                    <td>

                                        @if($proveedor->contacto)

                                            {{ $proveedor->contacto }}

                                        @else

                                            <span class="muted">
                                                —
                                            </span>

                                        @endif

                                    </td>


                                    <!-- PRODUCTOS -->

                                    <td>

                                        <span class="products-badge">

                                            {{ $proveedor->productos->count() }}

                                        </span>

                                    </td>


                                    <!-- ESTADO -->

                                    <td>

                                        @if($proveedor->estado)

                                            <span class="status active">
                                                Activo
                                            </span>

                                        @else

                                            <span class="status inactive">
                                                Inactivo
                                            </span>

                                        @endif

                                    </td>


                                    <!-- ACCIONES -->

                                    <td>

                                        <div class="actions">


                                            @if(auth()->user()->hasPrivilege('proveedores.ver'))

                                                <a
                                                    href="{{ route('proveedores.show', $proveedor) }}"
                                                    class="action-icon view"
                                                    title="Ver proveedor"
                                                >

                                                    <svg
                                                        width="17"
                                                        height="17"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7Z"/>
                                                        <circle cx="12" cy="12" r="3"/>
                                                    </svg>

                                                </a>

                                            @endif


                                            @if(auth()->user()->hasPrivilege('proveedores.editar'))

                                                <a
                                                    href="{{ route('proveedores.edit', $proveedor) }}"
                                                    class="action-icon edit"
                                                    title="Editar proveedor"
                                                >

                                                    <svg
                                                        width="17"
                                                        height="17"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <path d="M12 20h9"/>
                                                        <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                                                    </svg>

                                                </a>

                                            @endif


                                            @if(auth()->user()->hasPrivilege('proveedores.eliminar'))

                                                <form
                                                    action="{{ route('proveedores.destroy', $proveedor) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('¿Estás seguro de eliminar este proveedor?');"
                                                >

                                                    @csrf
                                                    @method('DELETE')


                                                    <button
                                                        type="submit"
                                                        class="action-icon delete"
                                                        title="Eliminar proveedor"
                                                    >

                                                        <svg
                                                            width="17"
                                                            height="17"
                                                            viewBox="0 0 24 24"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="2"
                                                            stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                        >
                                                            <path d="M3 6h18"/>
                                                            <path d="M8 6V4h8v2"/>
                                                            <path d="M19 6l-1 14H6L5 6"/>
                                                            <path d="M10 11v5"/>
                                                            <path d="M14 11v5"/>
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


                <!-- SIN PROVEEDORES -->

                <div class="empty-state">

                    <div class="empty-icon">

                        <svg
                            width="28"
                            height="28"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M3 21h18"/>
                            <path d="M5 21V5a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v16"/>
                            <path d="M15 8h4a2 2 0 0 1 2 2v11"/>
                        </svg>

                    </div>


                    <h3>
                        No hay proveedores registrados
                    </h3>


                    <p>
                        Todavía no se ha registrado ningún proveedor.
                    </p>


                    @if(auth()->user()->hasPrivilege('proveedores.crear'))

                        <a
                            href="{{ route('proveedores.create') }}"
                            class="btn btn-primary"
                        >
                            + Nuevo proveedor
                        </a>

                    @endif

                </div>

            @endif

        </div>

    </div>


    <style>

        /* ================================
           CONTENEDOR
        ================================= */

        .proveedores-page {
            padding: 32px;
            max-width: 1400px;
            margin: 0 auto;
        }


        /* ================================
           HEADER
        ================================= */

        .page-header {
            background: #0f172a;
            border-radius: 18px;

            padding: 30px 32px;
            margin-bottom: 24px;

            color: white;

            display: flex;
            justify-content: space-between;
            align-items: flex-end;

            gap: 20px;
        }


        .section-label {
            display: block;

            color: #94a3b8;

            font-size: 11px;
            font-weight: 800;

            letter-spacing: 1.5px;

            margin-bottom: 7px;
        }


        .page-header h1 {
            margin: 0;

            font-size: 30px;
            font-weight: 800;
        }


        .page-header p {
            margin: 8px 0 0;

            color: #cbd5e1;

            font-size: 15px;
        }


        /* ================================
           BOTONES
        ================================= */

        .btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-height: 42px;

            padding: 0 18px;

            border-radius: 10px;

            border: none;

            text-decoration: none;

            cursor: pointer;

            font-size: 14px;
            font-weight: 700;

            transition: 0.2s;
        }


        .btn-primary {
            background: #2563eb;
            color: white;
        }


        .btn-primary:hover {
            background: #1d4ed8;
        }


        /* ================================
           ALERTAS
        ================================= */

        .alert {
            padding: 14px 18px;

            border-radius: 10px;

            margin-bottom: 20px;

            font-size: 14px;
            font-weight: 600;
        }


        .alert-success {
            background: #dcfce7;

            border: 1px solid #bbf7d0;

            color: #166534;
        }


        .alert-error {
            background: #fee2e2;

            border: 1px solid #fecaca;

            color: #991b1b;
        }


        /* ================================
           ESTADÍSTICAS
        ================================= */

        .stats-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 18px;

            margin-bottom: 24px;
        }


        .stat-card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 16px;

            padding: 21px;

            box-shadow:
                0 6px 20px rgba(15, 23, 42, 0.05);
        }


        .stat-label {
            color: #64748b;

            font-size: 10px;
            font-weight: 800;

            letter-spacing: 0.8px;
        }


        .stat-value {
            margin-top: 8px;

            color: #0f172a;

            font-size: 28px;
            font-weight: 800;
        }


        .stat-description {
            margin-top: 4px;

            color: #94a3b8;

            font-size: 12px;
        }


        /* ================================
           TABLA
        ================================= */

        .table-card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.06);
        }


        .table-header {
            display: flex;

            justify-content: space-between;
            align-items: center;

            gap: 20px;

            padding: 24px 28px;

            background: #f8fafc;

            border-bottom: 1px solid #e2e8f0;
        }


        .table-header h2 {
            margin: 0;

            color: #0f172a;

            font-size: 19px;
            font-weight: 800;
        }


        .table-header p {
            margin: 6px 0 0;

            color: #64748b;

            font-size: 14px;
        }


        .count-badge {
            flex-shrink: 0;

            padding: 7px 12px;

            border-radius: 8px;

            background: #e2e8f0;

            color: #475569;

            font-size: 12px;
            font-weight: 700;
        }


        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }


        table {
            width: 100%;

            min-width: 1100px;

            border-collapse: collapse;
        }


        th {
            padding: 14px 18px;

            background: #f8fafc;

            color: #64748b;

            border-bottom: 1px solid #e2e8f0;

            text-align: left;

            font-size: 11px;
            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 0.6px;
        }


        td {
            padding: 16px 18px;

            color: #475569;

            border-bottom: 1px solid #f1f5f9;

            font-size: 13px;

            vertical-align: middle;
        }


        tbody tr:hover {
            background: #f8fafc;
        }


        tbody tr:last-child td {
            border-bottom: none;
        }


        /* ================================
           PROVEEDOR
        ================================= */

        .row-number {
            color: #64748b;

            font-size: 12px;
            font-weight: 700;
        }


        .supplier-info {
            display: flex;

            align-items: center;

            gap: 12px;
        }


        .supplier-icon {
            width: 38px;
            height: 38px;

            display: flex;

            align-items: center;
            justify-content: center;

            flex-shrink: 0;

            border-radius: 10px;

            background: #eff6ff;

            color: #2563eb;
        }


        .supplier-name {
            color: #0f172a;

            font-size: 14px;
            font-weight: 750;
        }


        .supplier-rtn {
            margin-top: 4px;

            color: #94a3b8;

            font-size: 11px;
        }


        .muted {
            color: #94a3b8;
        }


        /* ================================
           PRODUCTOS
        ================================= */

        .products-badge {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            min-width: 32px;

            padding: 5px 8px;

            border-radius: 7px;

            background: #eff6ff;

            color: #1d4ed8;

            font-size: 12px;
            font-weight: 800;
        }


        /* ================================
           ESTADO
        ================================= */

        .status {
            display: inline-flex;

            align-items: center;

            padding: 5px 10px;

            border-radius: 999px;

            font-size: 12px;
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


        /* ================================
           ACCIONES
        ================================= */

        .actions {
            display: flex;

            align-items: center;

            gap: 7px;
        }


        .actions form {
            margin: 0;
        }


        .action-icon {
            width: 34px;
            height: 34px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            border-radius: 9px;

            border: 1px solid;

            text-decoration: none;

            cursor: pointer;

            transition: 0.2s;
        }


        .action-icon.view {
            background: #eff6ff;

            color: #2563eb;

            border-color: #dbeafe;
        }


        .action-icon.view:hover {
            background: #dbeafe;
        }


        .action-icon.edit {
            background: #f8fafc;

            color: #475569;

            border-color: #e2e8f0;
        }


        .action-icon.edit:hover {
            background: #e2e8f0;
        }


        .action-icon.delete {
            background: #fef2f2;

            color: #dc2626;

            border-color: #fecaca;
        }


        .action-icon.delete:hover {
            background: #fee2e2;
        }


        /* ================================
           VACÍO
        ================================= */

        .empty-state {
            padding: 60px 25px;

            text-align: center;
        }


        .empty-icon {
            width: 58px;
            height: 58px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin: 0 auto 16px;

            border-radius: 14px;

            background: #f1f5f9;

            color: #64748b;
        }


        .empty-state h3 {
            margin: 0;

            color: #0f172a;

            font-size: 18px;
            font-weight: 800;
        }


        .empty-state p {
            margin: 7px 0 20px;

            color: #64748b;

            font-size: 14px;
        }


        /* ================================
           RESPONSIVE
        ================================= */

        @media (max-width: 1100px) {

            .stats-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

        }


        @media (max-width: 700px) {

            .proveedores-page {
                padding: 18px;
            }


            .page-header {
                padding: 24px;

                flex-direction: column;

                align-items: flex-start;
            }


            .page-header h1 {
                font-size: 25px;
            }


            .stats-grid {
                grid-template-columns: 1fr;
            }


            .table-header {
                flex-direction: column;

                align-items: flex-start;
            }

        }

    </style>

</x-app-layout>