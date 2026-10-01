<x-app-layout>

    <style>
        .role-show-page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .role-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .role-header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 20px;
        }

        .role-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .role-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .role-header p {
            margin: 8px 0 0;
            color: #cbd5e1;
            font-size: 15px;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 8px 13px;
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
            padding: 17px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 11px;
        }

        .info-item.full {
            grid-column: 1 / -1;
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
            font-size: 15px;
            font-weight: 700;
        }

        .users-list {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .user-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 11px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #e0e7ff;
            color: #4338ca;
            font-size: 14px;
            font-weight: 900;
            flex-shrink: 0;
        }

        .user-name {
            color: #0f172a;
            font-size: 13px;
            font-weight: 800;
        }

        .user-email {
            margin-top: 3px;
            color: #64748b;
            font-size: 11px;
        }

        .privileges-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px;
        }

        .privilege-module {
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden;
        }

        .module-header {
            padding: 14px 17px;
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 10px;
        }

        .module-title {
            color: #0f172a;
            font-size: 14px;
            font-weight: 900;
            text-transform: capitalize;
        }

        .module-count {
            color: #64748b;
            font-size: 11px;
            font-weight: 700;
        }

        .privilege-list {
            padding: 9px;
        }

        .privilege-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            border-radius: 8px;
        }

        .privilege-item:hover {
            background: #f8fafc;
        }

        .privilege-icon {
            width: 28px;
            height: 28px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #dcfce7;
            color: #15803d;
            flex-shrink: 0;
        }

        .privilege-icon svg {
            width: 15px;
            height: 15px;
        }

        .privilege-name {
            color: #334155;
            font-size: 13px;
            font-weight: 700;
        }

        .empty-state {
            padding: 30px;
            text-align: center;
            color: #64748b;
            font-size: 13px;
        }

        .actions {
            display: flex;
            justify-content: space-between;
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
        }

        @media (max-width: 800px) {
            .info-grid,
            .users-list,
            .privileges-grid {
                grid-template-columns: 1fr;
            }

            .info-item.full {
                grid-column: auto;
            }
        }

        @media (max-width: 600px) {
            .role-show-page {
                padding: 20px 14px 35px;
            }

            .role-header {
                padding: 23px;
            }

            .role-header-top {
                flex-direction: column;
            }

            .role-header h1 {
                font-size: 25px;
            }

            .card-body {
                padding: 20px;
            }

            .actions,
            .action-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>


    @php

        $privilegiosPorModulo = $rol->privileges
            ->sortBy([
                ['modulo', 'asc'],
                ['nombre', 'asc'],
            ])
            ->groupBy('modulo');

    @endphp


    <div class="role-show-page">

        {{-- ENCABEZADO --}}
        <div class="role-header">

            <div class="role-header-top">

                <div>

                    <small>
                        Supermercado Prisma
                    </small>

                    <h1>
                        {{ $rol->nombre }}
                    </h1>

                    <p>
                        Detalle del rol y sus permisos asignados.
                    </p>

                </div>


                @if($rol->estado)

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
        <div class="card">

            <div class="card-header">

                <h2>
                    Información general
                </h2>

                <p>
                    Datos principales del perfil de acceso.
                </p>

            </div>


            <div class="card-body">

                <div class="info-grid">

                    <div class="info-item">

                        <div class="info-label">
                            Nombre del rol
                        </div>

                        <div class="info-value">
                            {{ $rol->nombre }}
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Estado
                        </div>

                        <div class="info-value">

                            @if($rol->estado)
                                Activo
                            @else
                                Inactivo
                            @endif

                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Usuarios asignados
                        </div>

                        <div class="info-value">
                            {{ $rol->users->count() }}
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Privilegios asignados
                        </div>

                        <div class="info-value">
                            {{ $rol->privileges->count() }}
                        </div>

                    </div>


                    <div class="info-item full">

                        <div class="info-label">
                            Descripción
                        </div>

                        <div class="info-value">

                            {{ $rol->descripcion ?: 'Sin descripción registrada.' }}

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- USUARIOS --}}
        <div class="card">

            <div class="card-header">

                <h2>
                    Usuarios con este rol
                </h2>

                <p>
                    Usuarios actualmente asociados a este perfil.
                </p>

            </div>


            <div class="card-body">

                @if($rol->users->count() > 0)

                    <div class="users-list">

                        @foreach($rol->users as $usuario)

                            <div class="user-item">

                                <div class="user-avatar">

                                    {{ strtoupper(substr($usuario->name, 0, 1)) }}

                                </div>

                                <div>

                                    <div class="user-name">
                                        {{ $usuario->name }}
                                    </div>

                                    <div class="user-email">
                                        {{ $usuario->email }}
                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty-state">
                        No hay usuarios asignados a este rol.
                    </div>

                @endif

            </div>

        </div>


        {{-- PRIVILEGIOS --}}
        <div class="card">

            <div class="card-header">

                <h2>
                    Privilegios asignados
                </h2>

                <p>
                    Acciones que pueden realizar los usuarios con este rol.
                </p>

            </div>


            <div class="card-body">

                @if($privilegiosPorModulo->count() > 0)

                    <div class="privileges-grid">

                        @foreach($privilegiosPorModulo as $modulo => $privilegios)

                            <div class="privilege-module">

                                <div class="module-header">

                                    <div class="module-title">
                                        {{ ucfirst($modulo) }}
                                    </div>

                                    <div class="module-count">
                                        {{ $privilegios->count() }}
                                        privilegio(s)
                                    </div>

                                </div>


                                <div class="privilege-list">

                                    @foreach($privilegios as $privilegio)

                                        <div class="privilege-item">

                                            <div class="privilege-icon">

                                                <svg
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                >

                                                    <path
                                                        d="M20 6L9 17l-5-5"
                                                    />

                                                </svg>

                                            </div>


                                            <div>

                                                <div class="privilege-name">
                                                    {{ $privilegio->nombre }}
                                                </div>

                                            </div>

                                        </div>

                                    @endforeach

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="empty-state">
                        Este rol no tiene privilegios asignados.
                    </div>

                @endif

            </div>

        </div>


        {{-- BOTONES --}}
        <div class="actions">

            <a
                href="{{ route('roles.index') }}"
                class="btn btn-secondary"
            >

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path d="M19 12H5"/>
                    <path d="M12 19l-7-7 7-7"/>

                </svg>

                Volver a roles

            </a>


            <div class="action-group">

                <a
                    href="{{ route('roles.edit', $rol->id) }}"
                    class="btn btn-primary"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <path d="M12 20h9"/>

                        <path
                            d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"
                        />

                    </svg>

                    Editar rol

                </a>

            </div>

        </div>

    </div>

</x-app-layout>