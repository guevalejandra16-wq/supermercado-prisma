<x-app-layout>

    <style>
        .roles-page {
            max-width: 1450px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .roles-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .roles-header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .roles-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .roles-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .roles-header p {
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

        .section-card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .08);
        }

        .section-header {
            padding: 24px 26px;
            border-bottom: 1px solid #e2e8f0;
        }

        .section-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 20px;
            font-weight: 800;
        }

        .section-header p {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 14px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        .roles-table {
            width: 100%;
            border-collapse: collapse;
        }

        .roles-table th {
            background: #f8fafc;
            color: #475569;
            font-size: 13px;
            font-weight: 800;
            text-align: left;
            padding: 16px 20px;
            border-bottom: 1px solid #e2e8f0;
            white-space: nowrap;
        }

        .roles-table td {
            padding: 18px 20px;
            color: #334155;
            font-size: 14px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        .roles-table tbody tr:last-child td {
            border-bottom: none;
        }

        .roles-table tbody tr:hover {
            background: #f8fafc;
        }

        .role-name {
            color: #0f172a;
            font-size: 15px;
            font-weight: 800;
        }

        .role-description {
            margin-top: 4px;
            color: #64748b;
            font-size: 12px;
            max-width: 350px;
            white-space: normal;
        }

        .count-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 34px;
            height: 30px;
            padding: 0 10px;
            border-radius: 999px;
            background: #eef2ff;
            color: #4338ca;
            font-size: 12px;
            font-weight: 900;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 7px 11px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
        }

        .status-active {
            background: #dcfce7;
            color: #15803d;
        }

        .status-inactive {
            background: #fee2e2;
            color: #b91c1c;
        }

        .action-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .action-btn {
            width: 36px;
            height: 36px;
            border-radius: 9px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: .2s ease;
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
            color: #dc2626;
        }

        .action-delete:hover {
            background: #fecaca;
        }

        .empty-state {
            text-align: center;
            padding: 65px 25px;
        }

        .empty-state svg {
            width: 50px;
            height: 50px;
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

        @media (max-width: 900px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .roles-page {
                padding: 20px 14px 35px;
            }

            .roles-header {
                padding: 23px;
            }

            .roles-header-top {
                flex-direction: column;
                align-items: flex-start;
            }

            .roles-header h1 {
                font-size: 25px;
            }

            .btn-primary {
                width: 100%;
            }
        }
    </style>


    <div class="roles-page">

        {{-- ENCABEZADO --}}
        <div class="roles-header">

            <div class="roles-header-top">

                <div>

                    <small>
                        Supermercado Prisma
                    </small>

                    <h1>
                        Roles
                    </h1>

                    <p>
                        Administración de roles y permisos del sistema.
                    </p>

                </div>

                <a
                    href="{{ route('roles.create') }}"
                    class="btn-primary"
                >

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M12 5v14"/>
                        <path d="M5 12h14"/>

                    </svg>

                    Nuevo rol

                </a>

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

            $totalRoles = $roles->count();

            $rolesActivos = $roles->where('estado', true)->count();

            $totalPrivilegios = $roles->sum(function ($rol) {
                return $rol->privileges->count();
            });

        @endphp


        <div class="stats-grid">

            <div class="stat-card">

                <div class="stat-label">
                    Roles registrados
                </div>

                <div class="stat-value">
                    {{ $totalRoles }}
                </div>

                <div class="stat-extra">
                    Perfiles de acceso
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Roles activos
                </div>

                <div class="stat-value">
                    {{ $rolesActivos }}
                </div>

                <div class="stat-extra">
                    Disponibles para asignar
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Privilegios asignados
                </div>

                <div class="stat-value">
                    {{ $totalPrivilegios }}
                </div>

                <div class="stat-extra">
                    Permisos asignados a roles
                </div>

            </div>

        </div>


        {{-- TABLA --}}
        <div class="section-card">

            <div class="section-header">

                <h2>
                    Roles del sistema
                </h2>

                <p>
                    Consulta los perfiles de acceso y los privilegios asignados.
                </p>

            </div>


            @if($roles->count() > 0)

                <div class="table-wrapper">

                    <table class="roles-table">

                        <thead>

                            <tr>

                                <th>
                                    Rol
                                </th>

                                <th>
                                    Usuarios
                                </th>

                                <th>
                                    Privilegios
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

                            @foreach($roles as $rol)

                                <tr>

                                    <td>

                                        <div class="role-name">
                                            {{ $rol->nombre }}
                                        </div>

                                        @if($rol->descripcion)

                                            <div class="role-description">
                                                {{ $rol->descripcion }}
                                            </div>

                                        @endif

                                    </td>


                                    <td>

                                        <span class="count-badge">
                                            {{ $rol->users->count() }}
                                        </span>

                                    </td>


                                    <td>

                                        <span class="count-badge">
                                            {{ $rol->privileges->count() }}
                                        </span>

                                    </td>


                                    <td>

                                        @if($rol->estado)

                                            <span class="status-badge status-active">
                                                Activo
                                            </span>

                                        @else

                                            <span class="status-badge status-inactive">
                                                Inactivo
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        <div class="action-buttons">

                                            {{-- VER --}}
                                            <a
                                                href="{{ route('roles.show', $rol->id) }}"
                                                class="action-btn action-view"
                                                title="Ver rol"
                                            >

                                                <svg viewBox="0 0 24 24"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     stroke-width="2">

                                                    <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12z"/>
                                                    <circle cx="12" cy="12" r="3"/>

                                                </svg>

                                            </a>


                                            {{-- EDITAR --}}
                                            <a
                                                href="{{ route('roles.edit', $rol->id) }}"
                                                class="action-btn action-edit"
                                                title="Editar rol"
                                            >

                                                <svg viewBox="0 0 24 24"
                                                     fill="none"
                                                     stroke="currentColor"
                                                     stroke-width="2">

                                                    <path d="M12 20h9"/>
                                                    <path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/>

                                                </svg>

                                            </a>


                                            {{-- ELIMINAR --}}
                                            <form
                                                action="{{ route('roles.destroy', $rol->id) }}"
                                                method="POST"
                                                style="display:inline;"
                                                onsubmit="return confirm('¿Seguro que deseas eliminar este rol?');"
                                            >

                                                @csrf

                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    class="action-btn action-delete"
                                                    title="Eliminar rol"
                                                >

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

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>


                <div class="table-footer">

                    Mostrando
                    <strong>{{ $roles->count() }}</strong>
                    rol(es) registrado(s).

                </div>


            @else

                <div class="empty-state">

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="1.7">

                        <circle cx="12" cy="8" r="4"/>
                        <path d="M4 21a8 8 0 0 1 16 0"/>

                    </svg>

                    <h3>
                        No hay roles registrados
                    </h3>

                    <p>
                        Crea el primer rol para comenzar a administrar los permisos.
                    </p>

                </div>

            @endif

        </div>

    </div>

</x-app-layout>