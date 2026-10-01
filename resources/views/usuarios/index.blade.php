<x-app-layout>

    <style>
        /* =========================================================
           CONTENEDOR PRINCIPAL
        ========================================================= */

        .usuarios-module-page {
            width: 100%;
            max-width: 1400px;
            margin: 0 auto;
            padding: 30px 24px 50px;
        }


        /* =========================================================
           BARRA AZUL DEL MÓDULO
        ========================================================= */

        .usuarios-module-header {
            background: linear-gradient(
                135deg,
                #0f172a 0%,
                #172554 100%
            );

            border-radius: 18px;
            padding: 28px 30px;

            margin-bottom: 26px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;

            color: white;

            box-shadow:
                0 8px 24px rgba(15, 23, 42, 0.08);
        }


        .usuarios-module-header-info {
            min-width: 0;
        }


        .usuarios-module-small {
            color: #a5b4fc;

            font-size: 12px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: 0.08em;

            margin-bottom: 6px;
        }


        .usuarios-module-title {
            margin: 0;

            color: white;

            font-size: 29px;
            line-height: 1.2;

            font-weight: 800;
        }


        .usuarios-module-description {
            margin: 7px 0 0;

            color: #cbd5e1;

            font-size: 14px;
            line-height: 1.5;
        }


        .usuarios-module-button {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 12px 18px;

            border-radius: 10px;

            background: #4f46e5;
            color: white;

            text-decoration: none;

            font-size: 13px;
            font-weight: 700;

            white-space: nowrap;

            transition:
                background 0.2s ease,
                transform 0.2s ease;
        }


        .usuarios-module-button:hover {
            background: #4338ca;

            transform: translateY(-1px);
        }


        /* =========================================================
           ALERTAS
        ========================================================= */

        .usuarios-alert {
            padding: 14px 17px;

            border-radius: 11px;

            margin-bottom: 22px;

            font-size: 13px;
            font-weight: 600;
        }


        .usuarios-alert-success {
            background: #ecfdf5;

            border: 1px solid #a7f3d0;

            color: #047857;
        }


        .usuarios-alert-error {
            background: #fef2f2;

            border: 1px solid #fecaca;

            color: #b91c1c;
        }


        /* =========================================================
           ESTADÍSTICAS
        ========================================================= */

        .usuarios-stats-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 20px;

            margin-bottom: 26px;
        }


        .usuarios-stat-card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 16px;

            padding: 22px;

            box-shadow:
                0 5px 18px rgba(15, 23, 42, 0.05);
        }


        .usuarios-stat-content {
            display: flex;

            align-items: center;
            justify-content: space-between;

            gap: 15px;
        }


        .usuarios-stat-label {
            color: #64748b;

            font-size: 13px;
            font-weight: 600;
        }


        .usuarios-stat-number {
            margin-top: 6px;

            color: #0f172a;

            font-size: 30px;
            line-height: 1;

            font-weight: 800;
        }


        .usuarios-stat-number-green {
            color: #059669;
        }


        .usuarios-stat-number-red {
            color: #dc2626;
        }


        .usuarios-stat-icon {
            width: 48px;
            height: 48px;

            border-radius: 12px;

            display: flex;

            align-items: center;
            justify-content: center;

            flex-shrink: 0;
        }


        .usuarios-stat-icon-indigo {
            background: #e0e7ff;
            color: #4f46e5;
        }


        .usuarios-stat-icon-green {
            background: #d1fae5;
            color: #059669;
        }


        .usuarios-stat-icon-red {
            background: #fee2e2;
            color: #dc2626;
        }


        /* =========================================================
           TARJETA PRINCIPAL
        ========================================================= */

        .usuarios-main-card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 18px;

            box-shadow:
                0 5px 18px rgba(15, 23, 42, 0.05);

            overflow: hidden;
        }


        .usuarios-main-card-header {
            padding: 23px 25px;

            border-bottom: 1px solid #e2e8f0;
        }


        .usuarios-main-card-title {
            margin: 0;

            color: #0f172a;

            font-size: 19px;
            font-weight: 800;
        }


        .usuarios-main-card-description {
            margin: 5px 0 0;

            color: #64748b;

            font-size: 13px;
        }


        /* =========================================================
           TABLA
        ========================================================= */

        .usuarios-table-wrapper {
            width: 100%;

            overflow-x: auto;
        }


        .usuarios-table {
            width: 100%;

            border-collapse: collapse;

            text-align: left;
        }


        .usuarios-table thead {
            background: #f8fafc;
        }


        .usuarios-table th {
            padding: 15px 20px;

            border-bottom: 1px solid #e2e8f0;

            color: #64748b;

            font-size: 11px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: 0.06em;

            white-space: nowrap;
        }


        .usuarios-table td {
            padding: 17px 20px;

            border-bottom: 1px solid #f1f5f9;

            vertical-align: middle;
        }


        .usuarios-table tbody tr {
            transition: background 0.15s ease;
        }


        .usuarios-table tbody tr:hover {
            background: #f8fafc;
        }


        .usuarios-table tbody tr:last-child td {
            border-bottom: none;
        }


        /* =========================================================
           USUARIO
        ========================================================= */

        .usuarios-user-box {
            display: flex;

            align-items: center;

            gap: 12px;
        }


        .usuarios-avatar {
            width: 40px;
            height: 40px;

            border-radius: 50%;

            background: #e0e7ff;

            color: #4338ca;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 14px;
            font-weight: 800;

            flex-shrink: 0;
        }


        .usuarios-user-name {
            color: #0f172a;

            font-size: 14px;
            font-weight: 800;
        }


        .usuarios-user-id {
            color: #94a3b8;

            font-size: 11px;

            margin-top: 2px;
        }


        /* =========================================================
           CORREO
        ========================================================= */

        .usuarios-email {
            color: #475569;

            font-size: 13px;
        }


        /* =========================================================
           ROL
        ========================================================= */

        .usuarios-role-list {
            display: flex;

            flex-wrap: wrap;

            gap: 6px;
        }


        .usuarios-role-badge {
            display: inline-flex;

            align-items: center;

            padding: 6px 11px;

            border-radius: 999px;

            background: #e0e7ff;

            color: #4338ca;

            font-size: 11px;
            font-weight: 800;
        }


        .usuarios-no-role {
            color: #94a3b8;

            font-size: 12px;
        }


        /* =========================================================
           ESTADO
        ========================================================= */

        .usuarios-status {
            display: inline-flex;

            align-items: center;

            gap: 7px;

            padding: 6px 11px;

            border-radius: 999px;

            font-size: 11px;
            font-weight: 800;
        }


        .usuarios-status-active {
            background: #d1fae5;
            color: #047857;
        }


        .usuarios-status-inactive {
            background: #fee2e2;
            color: #b91c1c;
        }


        .usuarios-status-dot {
            width: 7px;
            height: 7px;

            border-radius: 50%;
        }


        .usuarios-status-active .usuarios-status-dot {
            background: #10b981;
        }


        .usuarios-status-inactive .usuarios-status-dot {
            background: #ef4444;
        }


        /* =========================================================
           ACCIONES
        ========================================================= */

        .usuarios-actions {
            display: flex;

            align-items: center;
            justify-content: center;

            gap: 7px;
        }


        .usuarios-action {
            width: 38px;
            height: 38px;

            border-radius: 9px;

            display: inline-flex;

            align-items: center;
            justify-content: center;

            color: white;

            border: none;

            cursor: pointer;

            text-decoration: none;

            transition:
                background 0.2s ease,
                transform 0.2s ease;
        }


        .usuarios-action:hover {
            transform: translateY(-1px);
        }


        .usuarios-action-view {
            background: #1e293b;
        }


        .usuarios-action-view:hover {
            background: #0f172a;
        }


        .usuarios-action-edit {
            background: #f59e0b;
        }


        .usuarios-action-edit:hover {
            background: #d97706;
        }


        .usuarios-action-delete {
            background: #dc2626;
        }


        .usuarios-action-delete:hover {
            background: #b91c1c;
        }


        /* =========================================================
           SIN USUARIOS
        ========================================================= */

        .usuarios-empty {
            padding: 65px 20px;

            text-align: center;
        }


        .usuarios-empty-icon {
            width: 64px;
            height: 64px;

            margin: 0 auto;

            border-radius: 16px;

            background: #f1f5f9;

            color: #94a3b8;

            display: flex;

            align-items: center;
            justify-content: center;
        }


        .usuarios-empty-title {
            margin-top: 18px;

            color: #0f172a;

            font-size: 17px;
            font-weight: 800;
        }


        .usuarios-empty-description {
            margin-top: 7px;

            color: #64748b;

            font-size: 13px;
        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 850px) {

            .usuarios-stats-grid {
                grid-template-columns: 1fr;
            }


            .usuarios-module-header {
                flex-direction: column;

                align-items: stretch;
            }


            .usuarios-module-button {
                width: 100%;
            }
        }


        @media (max-width: 600px) {

            .usuarios-module-page {
                padding: 22px 14px 40px;
            }


            .usuarios-module-header {
                padding: 23px;
            }


            .usuarios-module-title {
                font-size: 25px;
            }


            .usuarios-main-card-header {
                padding: 19px;
            }


            .usuarios-table th,
            .usuarios-table td {
                padding: 13px 14px;
            }
        }
    </style>


    <div class="usuarios-module-page">


        {{-- =====================================================
             BARRA AZUL DEL MÓDULO
        ====================================================== --}}

        <div class="usuarios-module-header">

            <div class="usuarios-module-header-info">

                <div class="usuarios-module-small">
                    Supermercado Prisma
                </div>

                <h1 class="usuarios-module-title">
                    Usuarios
                </h1>

                <p class="usuarios-module-description">
                    Administra los usuarios y sus roles dentro del sistema.
                </p>

            </div>


            {{-- NUEVO USUARIO --}}
            @if(auth()->user()->hasPrivilege('usuarios.crear'))

                <a
                    href="{{ route('usuarios.create') }}"
                    class="usuarios-module-button"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="18"
                        height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path d="M12 5v14"/>
                        <path d="M5 12h14"/>
                    </svg>

                    Nuevo usuario

                </a>

            @endif

        </div>


        {{-- =====================================================
             MENSAJES
        ====================================================== --}}

        @if(session('success'))

            <div class="usuarios-alert usuarios-alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if(session('error'))

            <div class="usuarios-alert usuarios-alert-error">
                {{ session('error') }}
            </div>

        @endif


        {{-- =====================================================
             ESTADÍSTICAS
        ====================================================== --}}

        <div class="usuarios-stats-grid">


            {{-- TOTAL --}}
            <div class="usuarios-stat-card">

                <div class="usuarios-stat-content">

                    <div>

                        <div class="usuarios-stat-label">
                            Total de usuarios
                        </div>

                        <div class="usuarios-stat-number">
                            {{ $usuarios->count() }}
                        </div>

                    </div>


                    <div class="usuarios-stat-icon usuarios-stat-icon-indigo">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>

                    </div>

                </div>

            </div>


            {{-- ACTIVOS --}}
            <div class="usuarios-stat-card">

                <div class="usuarios-stat-content">

                    <div>

                        <div class="usuarios-stat-label">
                            Usuarios activos
                        </div>

                        <div class="usuarios-stat-number usuarios-stat-number-green">
                            {{ $usuarios->where('estado', true)->count() }}
                        </div>

                    </div>


                    <div class="usuarios-stat-icon usuarios-stat-icon-green">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path d="M5 12l4 4L19 6"/>
                        </svg>

                    </div>

                </div>

            </div>


            {{-- INACTIVOS --}}
            <div class="usuarios-stat-card">

                <div class="usuarios-stat-content">

                    <div>

                        <div class="usuarios-stat-label">
                            Usuarios inactivos
                        </div>

                        <div class="usuarios-stat-number usuarios-stat-number-red">
                            {{ $usuarios->where('estado', false)->count() }}
                        </div>

                    </div>


                    <div class="usuarios-stat-icon usuarios-stat-icon-red">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path d="M18 6 6 18"/>
                            <path d="m6 6 12 12"/>
                        </svg>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             TABLA DE USUARIOS
        ====================================================== --}}

        <div class="usuarios-main-card">


            <div class="usuarios-main-card-header">

                <h2 class="usuarios-main-card-title">
                    Lista de usuarios
                </h2>

                <p class="usuarios-main-card-description">
                    Consulta y administra los usuarios registrados en el sistema.
                </p>

            </div>


            @if($usuarios->count() > 0)


                <div class="usuarios-table-wrapper">

                    <table class="usuarios-table">

                        <thead>

                            <tr>

                                <th>
                                    Usuario
                                </th>

                                <th>
                                    Correo
                                </th>

                                <th>
                                    Rol
                                </th>

                                <th>
                                    Estado
                                </th>

                                <th style="text-align: center;">
                                    Acciones
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($usuarios as $usuario)

                                <tr>


                                    {{-- USUARIO --}}
                                    <td>

                                        <div class="usuarios-user-box">

                                            <div class="usuarios-avatar">

                                                {{ strtoupper(
                                                    substr($usuario->name, 0, 1)
                                                ) }}

                                            </div>


                                            <div>

                                                <div class="usuarios-user-name">
                                                    {{ $usuario->name }}
                                                </div>

                                                <div class="usuarios-user-id">
                                                    ID #{{ $usuario->id }}
                                                </div>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- CORREO --}}
                                    <td>

                                        <span class="usuarios-email">
                                            {{ $usuario->email }}
                                        </span>

                                    </td>


                                    {{-- ROL --}}
                                    <td>

                                        @if($usuario->roles->count() > 0)

                                            <div class="usuarios-role-list">

                                                @foreach($usuario->roles as $rol)

                                                    <span class="usuarios-role-badge">
                                                        {{ $rol->nombre }}
                                                    </span>

                                                @endforeach

                                            </div>

                                        @else

                                            <span class="usuarios-no-role">
                                                Sin rol asignado
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ESTADO --}}
                                    <td>

                                        @if($usuario->estado)

                                            <span class="usuarios-status usuarios-status-active">

                                                <span class="usuarios-status-dot"></span>

                                                ACTIVO

                                            </span>

                                        @else

                                            <span class="usuarios-status usuarios-status-inactive">

                                                <span class="usuarios-status-dot"></span>

                                                INACTIVO

                                            </span>

                                        @endif

                                    </td>


                                    {{-- ACCIONES --}}
                                    <td>

                                        <div class="usuarios-actions">


                                            {{-- VER --}}
                                            @if(auth()->user()->hasPrivilege('usuarios.ver'))

                                                <a
                                                    href="{{ route('usuarios.show', $usuario->id) }}"
                                                    title="Ver usuario"
                                                    class="usuarios-action usuarios-action-view"
                                                >

                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="17"
                                                        height="17"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                    >
                                                        <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/>
                                                        <circle cx="12" cy="12" r="3"/>
                                                    </svg>

                                                </a>

                                            @endif


                                            {{-- EDITAR --}}
                                            @if(auth()->user()->hasPrivilege('usuarios.editar'))

                                                <a
                                                    href="{{ route('usuarios.edit', $usuario->id) }}"
                                                    title="Editar usuario"
                                                    class="usuarios-action usuarios-action-edit"
                                                >

                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
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
                                                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                                                    </svg>

                                                </a>

                                            @endif


                                            {{-- ELIMINAR --}}
                                            @if(
                                                auth()->user()->hasPrivilege('usuarios.eliminar')
                                                && $usuario->email !== 'admin@prisma.com'
                                            )

                                                <form
                                                    action="{{ route('usuarios.destroy', $usuario->id) }}"
                                                    method="POST"
                                                    style="margin: 0;"
                                                    onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        title="Eliminar usuario"
                                                        class="usuarios-action usuarios-action-delete"
                                                    >

                                                        <svg
                                                            xmlns="http://www.w3.org/2000/svg"
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


                {{-- =================================================
                     SIN USUARIOS
                ================================================== --}}

                <div class="usuarios-empty">

                    <div class="usuarios-empty-icon">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="32"
                            height="32"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                        </svg>

                    </div>


                    <div class="usuarios-empty-title">
                        No hay usuarios registrados
                    </div>


                    <div class="usuarios-empty-description">
                        Crea el primer usuario para comenzar.
                    </div>


                    @if(auth()->user()->hasPrivilege('usuarios.crear'))

                        <a
                            href="{{ route('usuarios.create') }}"
                            class="usuarios-module-button"
                            style="margin-top: 18px;"
                        >
                            Nuevo usuario
                        </a>

                    @endif

                </div>

            @endif

        </div>

    </div>

</x-app-layout>