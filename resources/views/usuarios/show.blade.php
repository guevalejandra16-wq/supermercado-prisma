<x-app-layout>

    <style>
        .usuarios-show-page {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 24px 50px;
        }

        /* =========================================================
           ENCABEZADO
        ========================================================= */

        .usuarios-show-header {
            background: linear-gradient(
                135deg,
                #0f172a 0%,
                #172554 100%
            );

            border-radius: 18px;
            padding: 28px 30px;
            margin-bottom: 26px;

            color: white;

            box-shadow:
                0 8px 24px rgba(15, 23, 42, 0.08);

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
        }

        .usuarios-show-small {
            color: #a5b4fc;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 6px;
        }

        .usuarios-show-title {
            margin: 0;
            color: white;
            font-size: 29px;
            font-weight: 800;
        }

        .usuarios-show-description {
            margin: 7px 0 0;
            color: #cbd5e1;
            font-size: 14px;
        }

        .usuarios-show-header-actions {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .usuarios-show-header-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;

            padding: 11px 16px;

            border-radius: 10px;

            text-decoration: none;

            font-size: 13px;
            font-weight: 700;

            white-space: nowrap;
        }

        .usuarios-show-header-button-secondary {
            background: rgba(255,255,255,0.10);
            color: white;
            border: 1px solid rgba(255,255,255,0.15);
        }

        .usuarios-show-header-button-secondary:hover {
            background: rgba(255,255,255,0.16);
        }

        .usuarios-show-header-button-primary {
            background: #4f46e5;
            color: white;
        }

        .usuarios-show-header-button-primary:hover {
            background: #4338ca;
        }

        /* =========================================================
           CONTENEDOR
        ========================================================= */

        .usuarios-show-grid {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 22px;
        }

        .usuarios-show-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 18px;

            box-shadow:
                0 5px 18px rgba(15, 23, 42, 0.05);

            overflow: hidden;
        }

        .usuarios-show-card-header {
            padding: 22px 25px;
            border-bottom: 1px solid #e2e8f0;
        }

        .usuarios-show-card-title {
            margin: 0;
            color: #0f172a;
            font-size: 18px;
            font-weight: 800;
        }

        .usuarios-show-card-description {
            margin: 5px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .usuarios-show-card-body {
            padding: 25px;
        }

        /* =========================================================
           PERFIL
        ========================================================= */

        .usuarios-show-profile {
            display: flex;
            align-items: center;
            gap: 16px;

            padding-bottom: 24px;
            margin-bottom: 24px;

            border-bottom: 1px solid #e2e8f0;
        }

        .usuarios-show-avatar {
            width: 68px;
            height: 68px;

            border-radius: 17px;

            background: #e0e7ff;
            color: #4338ca;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 24px;
            font-weight: 800;

            flex-shrink: 0;
        }

        .usuarios-show-profile-name {
            color: #0f172a;
            font-size: 21px;
            font-weight: 800;
        }

        .usuarios-show-profile-email {
            margin-top: 4px;
            color: #64748b;
            font-size: 13px;
        }

        /* =========================================================
           DATOS
        ========================================================= */

        .usuarios-show-info-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
        }

        .usuarios-show-info {
            padding: 15px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;
            border-radius: 12px;
        }

        .usuarios-show-info-label {
            color: #64748b;
            font-size: 11px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .usuarios-show-info-value {
            margin-top: 6px;

            color: #0f172a;

            font-size: 14px;
            font-weight: 700;
        }

        /* =========================================================
           ESTADO
        ========================================================= */

        .usuarios-show-status {
            display: inline-flex;
            align-items: center;
            gap: 7px;

            padding: 7px 12px;

            border-radius: 999px;

            font-size: 11px;
            font-weight: 800;
        }

        .usuarios-show-status-active {
            background: #d1fae5;
            color: #047857;
        }

        .usuarios-show-status-inactive {
            background: #fee2e2;
            color: #b91c1c;
        }

        .usuarios-show-status-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
        }

        .usuarios-show-status-active
        .usuarios-show-status-dot {
            background: #10b981;
        }

        .usuarios-show-status-inactive
        .usuarios-show-status-dot {
            background: #ef4444;
        }

        /* =========================================================
           ROLES
        ========================================================= */

        .usuarios-show-role-box {
            padding: 18px;

            background: #eef2ff;

            border: 1px solid #c7d2fe;

            border-radius: 13px;

            margin-bottom: 14px;
        }

        .usuarios-show-role-name {
            color: #3730a3;

            font-size: 15px;
            font-weight: 800;
        }

        .usuarios-show-role-description {
            margin-top: 5px;

            color: #4f46e5;

            font-size: 12px;
            line-height: 1.5;
        }

        .usuarios-show-no-role {
            padding: 18px;

            background: #f8fafc;

            border: 1px solid #e2e8f0;

            border-radius: 13px;

            color: #64748b;

            font-size: 13px;
        }

        /* =========================================================
           INFORMACIÓN DE ACCESO
        ========================================================= */

        .usuarios-show-access-list {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .usuarios-show-access-item {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            padding: 14px 15px;

            border: 1px solid #e2e8f0;

            border-radius: 11px;
        }

        .usuarios-show-access-label {
            color: #64748b;
            font-size: 12px;
        }

        .usuarios-show-access-value {
            color: #0f172a;
            font-size: 13px;
            font-weight: 700;
            text-align: right;
        }

        /* =========================================================
           BOTONES INFERIORES
        ========================================================= */

        .usuarios-show-bottom-actions {
            margin-top: 22px;

            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .usuarios-show-bottom-button {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 11px 17px;

            border-radius: 10px;

            text-decoration: none;

            font-size: 13px;
            font-weight: 700;
        }

        .usuarios-show-back {
            background: white;
            border: 1px solid #cbd5e1;
            color: #475569;
        }

        .usuarios-show-back:hover {
            background: #f8fafc;
        }

        .usuarios-show-edit {
            background: #4f46e5;
            color: white;
        }

        .usuarios-show-edit:hover {
            background: #4338ca;
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 900px) {

            .usuarios-show-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {

            .usuarios-show-page {
                padding: 22px 14px 40px;
            }

            .usuarios-show-header {
                padding: 23px;

                flex-direction: column;
                align-items: stretch;
            }

            .usuarios-show-header-actions {
                flex-direction: column;
            }

            .usuarios-show-header-button {
                width: 100%;
            }

            .usuarios-show-info-grid {
                grid-template-columns: 1fr;
            }

            .usuarios-show-card-body {
                padding: 20px;
            }

            .usuarios-show-card-header {
                padding: 19px;
            }

            .usuarios-show-bottom-actions {
                flex-direction: column;
            }

            .usuarios-show-bottom-button {
                width: 100%;
            }
        }
    </style>


    <div class="usuarios-show-page">


        {{-- =====================================================
             ENCABEZADO
        ====================================================== --}}

        <div class="usuarios-show-header">

            <div>

                <div class="usuarios-show-small">
                    Supermercado Prisma
                </div>

                <h1 class="usuarios-show-title">
                    Ver usuario
                </h1>

                <p class="usuarios-show-description">
                    Consulta la información y permisos asignados a este usuario.
                </p>

            </div>


            <div class="usuarios-show-header-actions">


                <a
                    href="{{ route('usuarios.index') }}"
                    class="usuarios-show-header-button usuarios-show-header-button-secondary"
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
                        <path d="M19 12H5"/>
                        <path d="M12 19l-7-7 7-7"/>
                    </svg>

                    Usuarios

                </a>


                @if(auth()->user()->hasPrivilege('usuarios.editar'))

                    <a
                        href="{{ route('usuarios.edit', $usuario->id) }}"
                        class="usuarios-show-header-button usuarios-show-header-button-primary"
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
                            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1-1 4 4-1Z"/>
                        </svg>

                        Editar

                    </a>

                @endif

            </div>

        </div>


        {{-- =====================================================
             CONTENIDO
        ====================================================== --}}

        <div class="usuarios-show-grid">


            {{-- =================================================
                 INFORMACIÓN GENERAL
            ================================================== --}}

            <div class="usuarios-show-card">

                <div class="usuarios-show-card-header">

                    <h2 class="usuarios-show-card-title">
                        Información general
                    </h2>

                    <p class="usuarios-show-card-description">
                        Datos principales de la cuenta.
                    </p>

                </div>


                <div class="usuarios-show-card-body">


                    {{-- PERFIL --}}
                    <div class="usuarios-show-profile">

                        <div class="usuarios-show-avatar">

                            {{ strtoupper(
                                substr($usuario->name, 0, 1)
                            ) }}

                        </div>


                        <div>

                            <div class="usuarios-show-profile-name">
                                {{ $usuario->name }}
                            </div>

                            <div class="usuarios-show-profile-email">
                                {{ $usuario->email }}
                            </div>

                        </div>

                    </div>


                    {{-- DATOS --}}
                    <div class="usuarios-show-info-grid">


                        <div class="usuarios-show-info">

                            <div class="usuarios-show-info-label">
                                ID
                            </div>

                            <div class="usuarios-show-info-value">
                                #{{ $usuario->id }}
                            </div>

                        </div>


                        <div class="usuarios-show-info">

                            <div class="usuarios-show-info-label">
                                Estado
                            </div>

                            <div class="usuarios-show-info-value">

                                @if($usuario->estado)

                                    <span class="usuarios-show-status usuarios-show-status-active">

                                        <span class="usuarios-show-status-dot"></span>

                                        ACTIVO

                                    </span>

                                @else

                                    <span class="usuarios-show-status usuarios-show-status-inactive">

                                        <span class="usuarios-show-status-dot"></span>

                                        INACTIVO

                                    </span>

                                @endif

                            </div>

                        </div>


                        <div class="usuarios-show-info">

                            <div class="usuarios-show-info-label">
                                Nombre
                            </div>

                            <div class="usuarios-show-info-value">
                                {{ $usuario->name }}
                            </div>

                        </div>


                        <div class="usuarios-show-info">

                            <div class="usuarios-show-info-label">
                                Correo
                            </div>

                            <div class="usuarios-show-info-value">
                                {{ $usuario->email }}
                            </div>

                        </div>


                        <div class="usuarios-show-info">

                            <div class="usuarios-show-info-label">
                                Usuario creado
                            </div>

                            <div class="usuarios-show-info-value">
                                {{ $usuario->created_at?->format('d/m/Y H:i') ?? '—' }}
                            </div>

                        </div>


                        <div class="usuarios-show-info">

                            <div class="usuarios-show-info-label">
                                Última actualización
                            </div>

                            <div class="usuarios-show-info-value">
                                {{ $usuario->updated_at?->format('d/m/Y H:i') ?? '—' }}
                            </div>

                        </div>


                    </div>

                </div>

            </div>


            {{-- =================================================
                 ROL Y ACCESO
            ================================================== --}}

            <div>


                {{-- ROL --}}
                <div class="usuarios-show-card">

                    <div class="usuarios-show-card-header">

                        <h2 class="usuarios-show-card-title">
                            Rol asignado
                        </h2>

                        <p class="usuarios-show-card-description">
                            Rol y permisos asociados a la cuenta.
                        </p>

                    </div>


                    <div class="usuarios-show-card-body">


                        @if($usuario->roles->count() > 0)

                            @foreach($usuario->roles as $rol)

                                <div class="usuarios-show-role-box">

                                    <div class="usuarios-show-role-name">
                                        {{ $rol->nombre }}
                                    </div>


                                    @if($rol->descripcion)

                                        <div class="usuarios-show-role-description">
                                            {{ $rol->descripcion }}
                                        </div>

                                    @else

                                        <div class="usuarios-show-role-description">
                                            Este rol tiene los privilegios configurados en el sistema.
                                        </div>

                                    @endif

                                </div>

                            @endforeach

                        @else

                            <div class="usuarios-show-no-role">
                                Este usuario no tiene ningún rol asignado.
                            </div>

                        @endif

                    </div>

                </div>


                {{-- ACCESO --}}
                <div
                    class="usuarios-show-card"
                    style="margin-top: 22px;"
                >

                    <div class="usuarios-show-card-header">

                        <h2 class="usuarios-show-card-title">
                            Estado de acceso
                        </h2>

                        <p class="usuarios-show-card-description">
                            Información sobre el acceso al sistema.
                        </p>

                    </div>


                    <div class="usuarios-show-card-body">

                        <div class="usuarios-show-access-list">


                            <div class="usuarios-show-access-item">

                                <span class="usuarios-show-access-label">
                                    Cuenta
                                </span>

                                <span class="usuarios-show-access-value">

                                    @if($usuario->estado)
                                        Activa
                                    @else
                                        Inactiva
                                    @endif

                                </span>

                            </div>


                            <div class="usuarios-show-access-item">

                                <span class="usuarios-show-access-label">
                                    Inicio de sesión
                                </span>

                                <span class="usuarios-show-access-value">

                                    @if($usuario->estado)
                                        Permitido
                                    @else
                                        Bloqueado
                                    @endif

                                </span>

                            </div>


                            <div class="usuarios-show-access-item">

                                <span class="usuarios-show-access-label">
                                    Roles asignados
                                </span>

                                <span class="usuarios-show-access-value">
                                    {{ $usuario->roles->count() }}
                                </span>

                            </div>


                        </div>

                    </div>

                </div>


            </div>


        </div>


        {{-- =====================================================
             BOTONES INFERIORES
        ====================================================== --}}

        <div class="usuarios-show-bottom-actions">


            <a
                href="{{ route('usuarios.index') }}"
                class="usuarios-show-bottom-button usuarios-show-back"
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
                    <path d="M19 12H5"/>
                    <path d="M12 19l-7-7 7-7"/>
                </svg>

                Volver a usuarios

            </a>


            @if(auth()->user()->hasPrivilege('usuarios.editar'))

                <a
                    href="{{ route('usuarios.edit', $usuario->id) }}"
                    class="usuarios-show-bottom-button usuarios-show-edit"
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
                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1-1 4 4-1Z"/>
                    </svg>

                    Editar usuario

                </a>

            @endif


        </div>


    </div>

</x-app-layout>