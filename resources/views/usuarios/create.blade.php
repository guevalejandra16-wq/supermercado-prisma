<x-app-layout>

    <style>
        .usuarios-create-page {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 24px 50px;
        }

        /* =========================================================
           ENCABEZADO DEL MÓDULO
        ========================================================= */

        .usuarios-create-header {
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
        }

        .usuarios-create-small {
            color: #a5b4fc;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 6px;
        }

        .usuarios-create-title {
            margin: 0;
            color: white;
            font-size: 29px;
            font-weight: 800;
            line-height: 1.2;
        }

        .usuarios-create-description {
            margin: 7px 0 0;
            color: #cbd5e1;
            font-size: 14px;
        }

        /* =========================================================
           ALERTA DE ERRORES
        ========================================================= */

        .usuarios-create-error {
            margin-bottom: 22px;
            padding: 16px 18px;
            border-radius: 12px;

            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        .usuarios-create-error-title {
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .usuarios-create-error ul {
            margin: 0;
            padding-left: 20px;
            font-size: 12px;
        }

        /* =========================================================
           TARJETA DEL FORMULARIO
        ========================================================= */

        .usuarios-create-card {
            background: white;

            border: 1px solid #e2e8f0;
            border-radius: 18px;

            box-shadow:
                0 5px 18px rgba(15, 23, 42, 0.05);

            overflow: hidden;
        }

        .usuarios-create-card-header {
            padding: 24px 28px;

            border-bottom: 1px solid #e2e8f0;

            display: flex;
            align-items: center;
            gap: 14px;
        }

        .usuarios-create-icon {
            width: 48px;
            height: 48px;

            border-radius: 12px;

            background: #e0e7ff;
            color: #4f46e5;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;
        }

        .usuarios-create-card-title {
            margin: 0;

            color: #0f172a;

            font-size: 19px;
            font-weight: 800;
        }

        .usuarios-create-card-description {
            margin: 4px 0 0;

            color: #64748b;

            font-size: 13px;
        }

        .usuarios-create-card-body {
            padding: 28px;
        }

        /* =========================================================
           SECCIONES
        ========================================================= */

        .usuarios-create-section {
            margin-bottom: 32px;
        }

        .usuarios-create-section:last-child {
            margin-bottom: 0;
        }

        .usuarios-create-section-title {
            margin: 0 0 5px;

            color: #0f172a;

            font-size: 17px;
            font-weight: 800;
        }

        .usuarios-create-section-description {
            margin: 0 0 20px;

            color: #64748b;

            font-size: 13px;
        }

        /* =========================================================
           CAMPOS
        ========================================================= */

        .usuarios-create-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 20px;
        }

        .usuarios-create-field {
            display: flex;
            flex-direction: column;
        }

        .usuarios-create-label {
            margin-bottom: 7px;

            color: #334155;

            font-size: 13px;
            font-weight: 700;
        }

        .usuarios-create-input {
            width: 100%;

            padding: 11px 13px;

            border: 1px solid #cbd5e1;
            border-radius: 10px;

            background: white;

            color: #0f172a;

            font-size: 14px;

            outline: none;

            transition:
                border-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        .usuarios-create-input:focus {
            border-color: #6366f1;

            box-shadow:
                0 0 0 3px rgba(99, 102, 241, 0.10);
        }

        .usuarios-create-input::placeholder {
            color: #94a3b8;
        }

        .usuarios-create-help {
            margin-top: 5px;

            color: #94a3b8;

            font-size: 11px;
        }

        .usuarios-create-field-error {
            margin-top: 5px;

            color: #dc2626;

            font-size: 12px;
        }

        /* =========================================================
           ROLES
        ========================================================= */

        .usuarios-create-role-grid {
            display: grid;

            grid-template-columns:
                repeat(3, minmax(0, 1fr));

            gap: 15px;
        }

        .usuarios-create-role {
            position: relative;
        }

        .usuarios-create-role input {
            position: absolute;

            opacity: 0;

            pointer-events: none;
        }

        .usuarios-create-role-label {
            display: block;

            height: 100%;

            padding: 18px;

            border: 2px solid #e2e8f0;

            border-radius: 13px;

            background: white;

            cursor: pointer;

            transition:
                border-color 0.2s ease,
                background 0.2s ease,
                box-shadow 0.2s ease;
        }

        .usuarios-create-role-label:hover {
            border-color: #a5b4fc;
        }

        .usuarios-create-role input:checked
        + .usuarios-create-role-label {
            border-color: #4f46e5;

            background: #eef2ff;

            box-shadow:
                0 3px 10px rgba(79, 70, 229, 0.08);
        }

        .usuarios-create-role-content {
            display: flex;

            align-items: flex-start;

            gap: 12px;
        }

        .usuarios-create-role-icon {
            width: 40px;
            height: 40px;

            border-radius: 10px;

            background: #e0e7ff;
            color: #4f46e5;

            display: flex;
            align-items: center;
            justify-content: center;

            flex-shrink: 0;
        }

        .usuarios-create-role-name {
            color: #0f172a;

            font-size: 14px;
            font-weight: 800;
        }

        .usuarios-create-role-description {
            margin-top: 4px;

            color: #64748b;

            font-size: 12px;

            line-height: 1.4;
        }

        .usuarios-create-role-status {
            display: flex;

            align-items: center;

            gap: 5px;

            margin-top: 12px;

            color: #64748b;

            font-size: 11px;
            font-weight: 700;
        }

        .usuarios-create-role input:checked
        + .usuarios-create-role-label
        .usuarios-create-role-status {
            color: #4f46e5;
        }

        /* =========================================================
           ESTADO
        ========================================================= */

        .usuarios-create-status-box {
            padding: 17px;

            border: 1px solid #e2e8f0;

            border-radius: 12px;

            background: #f8fafc;
        }

        .usuarios-create-status-label {
            display: flex;

            align-items: center;

            gap: 12px;

            cursor: pointer;
        }

        .usuarios-create-checkbox {
            width: 19px;
            height: 19px;

            accent-color: #4f46e5;

            cursor: pointer;

            flex-shrink: 0;
        }

        .usuarios-create-status-title {
            color: #334155;

            font-size: 14px;
            font-weight: 700;
        }

        .usuarios-create-status-description {
            margin-top: 3px;

            color: #64748b;

            font-size: 12px;
        }

        /* =========================================================
           BOTONES
        ========================================================= */

        .usuarios-create-actions {
            padding: 20px 28px;

            background: #f8fafc;

            border-top: 1px solid #e2e8f0;

            display: flex;

            align-items: center;

            justify-content: flex-end;

            gap: 10px;
        }

        .usuarios-create-cancel {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 11px 18px;

            border-radius: 10px;

            background: white;

            border: 1px solid #cbd5e1;

            color: #475569;

            text-decoration: none;

            font-size: 13px;
            font-weight: 700;

            transition: background 0.2s ease;
        }

        .usuarios-create-cancel:hover {
            background: #f1f5f9;
        }

        .usuarios-create-submit {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            gap: 8px;

            padding: 11px 18px;

            border: none;

            border-radius: 10px;

            background: #4f46e5;

            color: white;

            font-size: 13px;
            font-weight: 700;

            cursor: pointer;

            transition:
                background 0.2s ease,
                transform 0.2s ease;
        }

        .usuarios-create-submit:hover {
            background: #4338ca;

            transform: translateY(-1px);
        }

        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 900px) {

            .usuarios-create-role-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {

            .usuarios-create-grid {
                grid-template-columns: 1fr;
            }

            .usuarios-create-card-body {
                padding: 20px;
            }

            .usuarios-create-card-header {
                padding: 20px;
            }

            .usuarios-create-actions {
                padding: 18px 20px;

                flex-direction: column-reverse;

                align-items: stretch;
            }

            .usuarios-create-cancel,
            .usuarios-create-submit {
                width: 100%;
            }

            .usuarios-create-header {
                padding: 23px;
            }

            .usuarios-create-title {
                font-size: 25px;
            }
        }
    </style>


    <div class="usuarios-create-page">


        {{-- =====================================================
             ENCABEZADO
        ====================================================== --}}

        <div class="usuarios-create-header">

            <div class="usuarios-create-small">
                Supermercado Prisma
            </div>

            <h1 class="usuarios-create-title">
                Nuevo usuario
            </h1>

            <p class="usuarios-create-description">
                Registra un nuevo usuario y asigna el rol correspondiente.
            </p>

        </div>


        {{-- =====================================================
             ERRORES
        ====================================================== --}}

        @if($errors->any())

            <div class="usuarios-create-error">

                <div class="usuarios-create-error-title">
                    Hay algunos errores en el formulario:
                </div>

                <ul>

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- =====================================================
             FORMULARIO
        ====================================================== --}}

        <form
            action="{{ route('usuarios.store') }}"
            method="POST"
        >

            @csrf


            <div class="usuarios-create-card">


                {{-- =================================================
                     CABECERA DEL FORMULARIO
                ================================================== --}}

                <div class="usuarios-create-card-header">

                    <div class="usuarios-create-icon">

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="23"
                            height="23"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                            <circle cx="9" cy="7" r="4"/>
                            <line x1="19" y1="8" x2="19" y2="14"/>
                            <line x1="22" y1="11" x2="16" y2="11"/>
                        </svg>

                    </div>

                    <div>

                        <h2 class="usuarios-create-card-title">
                            Información del usuario
                        </h2>

                        <p class="usuarios-create-card-description">
                            Completa los datos necesarios para crear la cuenta.
                        </p>

                    </div>

                </div>


                <div class="usuarios-create-card-body">


                    {{-- =================================================
                         DATOS DE ACCESO
                    ================================================== --}}

                    <div class="usuarios-create-section">

                        <h3 class="usuarios-create-section-title">
                            Datos de acceso
                        </h3>

                        <p class="usuarios-create-section-description">
                            Estos datos serán utilizados para iniciar sesión en el sistema.
                        </p>


                        <div class="usuarios-create-grid">


                            {{-- NOMBRE --}}
                            <div class="usuarios-create-field">

                                <label
                                    for="name"
                                    class="usuarios-create-label"
                                >
                                    Nombre del usuario
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name') }}"
                                    required
                                    maxlength="255"
                                    class="usuarios-create-input"
                                    placeholder="Ej. Juan Pérez"
                                >

                                @error('name')

                                    <span class="usuarios-create-field-error">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- CORREO --}}
                            <div class="usuarios-create-field">

                                <label
                                    for="email"
                                    class="usuarios-create-label"
                                >
                                    Correo electrónico
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email') }}"
                                    required
                                    maxlength="255"
                                    class="usuarios-create-input"
                                    placeholder="usuario@prisma.com"
                                >

                                @error('email')

                                    <span class="usuarios-create-field-error">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- CONTRASEÑA --}}
                            <div class="usuarios-create-field">

                                <label
                                    for="password"
                                    class="usuarios-create-label"
                                >
                                    Contraseña
                                </label>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    required
                                    minlength="8"
                                    class="usuarios-create-input"
                                    placeholder="Mínimo 8 caracteres"
                                >

                                <span class="usuarios-create-help">
                                    La contraseña debe tener al menos 8 caracteres.
                                </span>

                                @error('password')

                                    <span class="usuarios-create-field-error">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- CONFIRMAR --}}
                            <div class="usuarios-create-field">

                                <label
                                    for="password_confirmation"
                                    class="usuarios-create-label"
                                >
                                    Confirmar contraseña
                                </label>

                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    required
                                    minlength="8"
                                    class="usuarios-create-input"
                                    placeholder="Repita la contraseña"
                                >

                            </div>


                        </div>

                    </div>


                    {{-- =================================================
                         ROL
                    ================================================== --}}

                    <div class="usuarios-create-section">

                        <h3 class="usuarios-create-section-title">
                            Rol del usuario
                        </h3>

                        <p class="usuarios-create-section-description">
                            El rol determina los módulos y acciones que podrá utilizar.
                        </p>


                        <div class="usuarios-create-role-grid">


                            @foreach($roles as $rol)

                                @php

                                    $seleccionado = old('role_id') == $rol->id;

                                @endphp


                                <div class="usuarios-create-role">

                                    <input
                                        type="radio"
                                        id="rol_{{ $rol->id }}"
                                        name="role_id"
                                        value="{{ $rol->id }}"
                                        {{ $seleccionado ? 'checked' : '' }}
                                        required
                                    >


                                    <label
                                        for="rol_{{ $rol->id }}"
                                        class="usuarios-create-role-label"
                                    >

                                        <div class="usuarios-create-role-content">


                                            <div class="usuarios-create-role-icon">

                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="20"
                                                    height="20"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                                    <circle cx="12" cy="7" r="4"/>
                                                </svg>

                                            </div>


                                            <div>

                                                <div class="usuarios-create-role-name">
                                                    {{ $rol->nombre }}
                                                </div>


                                                @if($rol->descripcion)

                                                    <div class="usuarios-create-role-description">
                                                        {{ $rol->descripcion }}
                                                    </div>

                                                @else

                                                    <div class="usuarios-create-role-description">
                                                        Permisos definidos para este rol.
                                                    </div>

                                                @endif

                                            </div>

                                        </div>


                                        <div class="usuarios-create-role-status">

                                            @if($seleccionado)

                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="14"
                                                    height="14"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M20 6 9 17l-5-5"/>
                                                </svg>

                                                Rol seleccionado

                                            @else

                                                Seleccionar rol

                                            @endif

                                        </div>

                                    </label>

                                </div>

                            @endforeach


                        </div>


                        @error('role_id')

                            <div class="usuarios-create-field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         ESTADO
                    ================================================== --}}

                    <div class="usuarios-create-section">

                        <h3 class="usuarios-create-section-title">
                            Estado del usuario
                        </h3>

                        <p class="usuarios-create-section-description">
                            Controla si la cuenta podrá acceder al sistema.
                        </p>


                        <div class="usuarios-create-status-box">

                            {{-- IMPORTANTE:
                                 Enviamos 0 cuando está desmarcado. --}}

                            <input
                                type="hidden"
                                name="estado"
                                value="0"
                            >


                            <label class="usuarios-create-status-label">

                                <input
                                    type="checkbox"
                                    name="estado"
                                    value="1"
                                    {{ old('estado', true) ? 'checked' : '' }}
                                    class="usuarios-create-checkbox"
                                >


                                <div>

                                    <div class="usuarios-create-status-title">
                                        Usuario activo
                                    </div>

                                    <div class="usuarios-create-status-description">
                                        Si está activo, podrá iniciar sesión y utilizar el sistema.
                                    </div>

                                </div>

                            </label>

                        </div>

                    </div>


                </div>


                {{-- =================================================
                     BOTONES
                ================================================== --}}

                <div class="usuarios-create-actions">


                    <a
                        href="{{ route('usuarios.index') }}"
                        class="usuarios-create-cancel"
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

                        Cancelar

                    </a>


                    <button
                        type="submit"
                        class="usuarios-create-submit"
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
                            <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                            <polyline points="17 21 17 13 7 13 7 21"/>
                            <polyline points="7 3 7 8 15 8"/>
                        </svg>

                        Crear usuario

                    </button>


                </div>


            </div>

        </form>

    </div>

</x-app-layout>