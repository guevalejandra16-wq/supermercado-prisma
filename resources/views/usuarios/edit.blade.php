<x-app-layout>

    <style>
        .prisma-page {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px 50px;
        }

        .prisma-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 25px;
        }

        .prisma-header-small {
            font-size: 13px;
            font-weight: 700;
            color: #818cf8;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 6px;
        }

        .prisma-header h1 {
            font-size: 28px;
            font-weight: 800;
            margin: 0 0 8px;
        }

        .prisma-header p {
            margin: 0;
            color: #cbd5e1;
            font-size: 14px;
        }

        .prisma-card {
            background: white;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.07);
            overflow: hidden;
        }

        .prisma-card-header {
            padding: 24px 28px;
            border-bottom: 1px solid #e2e8f0;
        }

        .prisma-card-header-content {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .prisma-icon-box {
            width: 50px;
            height: 50px;
            border-radius: 13px;
            background: #fef3c7;
            color: #d97706;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .prisma-card-title {
            font-size: 20px;
            font-weight: 800;
            color: #0f172a;
            margin: 0;
        }

        .prisma-card-subtitle {
            color: #64748b;
            font-size: 13px;
            margin-top: 3px;
        }

        .prisma-card-body {
            padding: 28px;
        }

        .prisma-section {
            margin-bottom: 32px;
        }

        .prisma-section:last-child {
            margin-bottom: 0;
        }

        .prisma-section-title {
            font-size: 18px;
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 5px;
        }

        .prisma-section-description {
            color: #64748b;
            font-size: 13px;
            margin-bottom: 20px;
        }

        .prisma-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .prisma-field {
            display: flex;
            flex-direction: column;
        }

        .prisma-label {
            font-size: 13px;
            font-weight: 700;
            color: #334155;
            margin-bottom: 7px;
        }

        .prisma-input {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 11px 13px;
            font-size: 14px;
            color: #0f172a;
            background: white;
            outline: none;
            transition: 0.2s;
        }

        .prisma-input:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.10);
        }

        .prisma-role-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
        }

        .prisma-role-option {
            position: relative;
        }

        .prisma-role-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .prisma-role-label {
            display: block;
            height: 100%;
            padding: 18px;
            border: 2px solid #e2e8f0;
            border-radius: 13px;
            background: white;
            cursor: pointer;
            transition: 0.2s;
        }

        .prisma-role-label:hover {
            border-color: #a5b4fc;
        }

        .prisma-role-option input:checked + .prisma-role-label {
            border-color: #4f46e5;
            background: #eef2ff;
        }

        .prisma-role-content {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .prisma-role-icon {
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

        .prisma-role-name {
            font-size: 14px;
            font-weight: 800;
            color: #0f172a;
        }

        .prisma-role-description {
            font-size: 12px;
            color: #64748b;
            margin-top: 4px;
            line-height: 1.4;
        }

        .prisma-role-status {
            display: flex;
            align-items: center;
            gap: 5px;
            color: #4f46e5;
            font-size: 11px;
            font-weight: 700;
            margin-top: 12px;
        }

        .prisma-status-box {
            padding: 16px;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            background: #f8fafc;
        }

        .prisma-status-label {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }

        .prisma-checkbox {
            width: 19px;
            height: 19px;
            accent-color: #4f46e5;
            cursor: pointer;
            flex-shrink: 0;
        }

        .prisma-status-title {
            font-size: 14px;
            font-weight: 700;
            color: #334155;
        }

        .prisma-status-description {
            font-size: 12px;
            color: #64748b;
            margin-top: 3px;
        }

        .prisma-error-box {
            margin-bottom: 22px;
            padding: 16px;
            border-radius: 12px;
            border: 1px solid #fecaca;
            background: #fef2f2;
        }

        .prisma-error-title {
            font-size: 13px;
            font-weight: 800;
            color: #b91c1c;
            margin-bottom: 7px;
        }

        .prisma-error-list {
            margin: 0;
            padding-left: 20px;
            color: #dc2626;
            font-size: 12px;
        }

        .prisma-actions {
            padding: 20px 28px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .prisma-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 11px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: 0.2s;
        }

        .prisma-btn-secondary {
            background: white;
            color: #475569;
            border: 1px solid #cbd5e1;
        }

        .prisma-btn-secondary:hover {
            background: #f1f5f9;
        }

        .prisma-btn-primary {
            background: #4f46e5;
            color: white;
            box-shadow: 0 4px 10px rgba(79, 70, 229, 0.20);
        }

        .prisma-btn-primary:hover {
            background: #4338ca;
        }

        @media (max-width: 900px) {
            .prisma-role-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 700px) {
            .prisma-grid {
                grid-template-columns: 1fr;
            }

            .prisma-card-body {
                padding: 20px;
            }

            .prisma-card-header {
                padding: 20px;
            }

            .prisma-actions {
                padding: 18px 20px;
                flex-direction: column-reverse;
            }

            .prisma-btn {
                width: 100%;
            }
        }
    </style>


    <div class="prisma-page">

        {{-- ENCABEZADO --}}
        <div class="prisma-header">

            <div class="prisma-header-small">
                Supermercado Prisma
            </div>

            <h1>
                Editar usuario
            </h1>

            <p>
                Modifica la información, rol y estado del usuario.
            </p>

        </div>


        {{-- ERRORES --}}
        @if($errors->any())

            <div class="prisma-error-box">

                <div class="prisma-error-title">
                    Hay algunos errores en el formulario:
                </div>

                <ul class="prisma-error-list">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- FORMULARIO --}}
        <form
            action="{{ route('usuarios.update', $usuario->id) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            <div class="prisma-card">


                {{-- CABECERA --}}
                <div class="prisma-card-header">

                    <div class="prisma-card-header-content">

                        <div class="prisma-icon-box">

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
                                <path d="M12 20h9"/>
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                            </svg>

                        </div>

                        <div>

                            <h2 class="prisma-card-title">
                                {{ $usuario->name }}
                            </h2>

                            <p class="prisma-card-subtitle">
                                Modifica la información y permisos del usuario.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="prisma-card-body">


                    {{-- DATOS DE ACCESO --}}
                    <div class="prisma-section">

                        <div class="prisma-section-title">
                            Datos de acceso
                        </div>

                        <div class="prisma-section-description">
                            Actualiza los datos utilizados por el usuario para acceder al sistema.
                        </div>


                        <div class="prisma-grid">


                            {{-- NOMBRE --}}
                            <div class="prisma-field">

                                <label
                                    for="name"
                                    class="prisma-label"
                                >
                                    Nombre del usuario
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    value="{{ old('name', $usuario->name) }}"
                                    required
                                    maxlength="255"
                                    class="prisma-input"
                                >

                                @error('name')

                                    <span style="color:#dc2626;font-size:12px;margin-top:5px;">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- CORREO --}}
                            <div class="prisma-field">

                                <label
                                    for="email"
                                    class="prisma-label"
                                >
                                    Correo electrónico
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    value="{{ old('email', $usuario->email) }}"
                                    required
                                    maxlength="255"
                                    class="prisma-input"
                                >

                                @error('email')

                                    <span style="color:#dc2626;font-size:12px;margin-top:5px;">
                                        {{ $message }}
                                    </span>

                                @enderror

                            </div>


                            {{-- NUEVA CONTRASEÑA --}}
                            <div class="prisma-field">

                                <label
                                    for="password"
                                    class="prisma-label"
                                >
                                    Nueva contraseña
                                </label>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    minlength="8"
                                    placeholder="Dejar vacío para conservar la actual"
                                    class="prisma-input"
                                >

                                <span
                                    style="
                                        font-size:11px;
                                        color:#94a3b8;
                                        margin-top:5px;
                                    "
                                >
                                    Solo escribe una contraseña si deseas cambiarla.
                                </span>

                            </div>


                            {{-- CONFIRMAR CONTRASEÑA --}}
                            <div class="prisma-field">

                                <label
                                    for="password_confirmation"
                                    class="prisma-label"
                                >
                                    Confirmar nueva contraseña
                                </label>

                                <input
                                    type="password"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    minlength="8"
                                    placeholder="Repita la nueva contraseña"
                                    class="prisma-input"
                                >

                            </div>

                        </div>

                    </div>


                    {{-- ROL --}}
                    <div class="prisma-section">

                        <div class="prisma-section-title">
                            Rol del usuario
                        </div>

                        <div class="prisma-section-description">
                            Selecciona el rol que tendrá este usuario.
                        </div>


                        <div class="prisma-role-grid">

                            @foreach($roles as $rol)

                                @php

                                    $rolActual = $usuario->roles->first();

                                    $seleccionado = old(
                                        'role_id',
                                        $rolActual ? $rolActual->id : null
                                    ) == $rol->id;

                                @endphp


                                <div class="prisma-role-option">

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
                                        class="prisma-role-label"
                                    >

                                        <div class="prisma-role-content">

                                            <div class="prisma-role-icon">

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

                                                <div class="prisma-role-name">
                                                    {{ $rol->nombre }}
                                                </div>

                                                @if($rol->descripcion)

                                                    <div class="prisma-role-description">
                                                        {{ $rol->descripcion }}
                                                    </div>

                                                @endif

                                            </div>

                                        </div>


                                        <div class="prisma-role-status">

                                            @if($seleccionado)

                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="15"
                                                    height="15"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                >
                                                    <path d="M20 6 9 17l-5-5"/>
                                                </svg>

                                                Rol actual

                                            @else

                                                Seleccionar rol

                                            @endif

                                        </div>

                                    </label>

                                </div>

                            @endforeach

                        </div>


                        @error('role_id')

                            <p style="color:#dc2626;font-size:12px;margin-top:7px;">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ESTADO --}}
                    <div class="prisma-section">

                        <div class="prisma-section-title">
                            Estado del usuario
                        </div>

                        <div class="prisma-section-description">
                            Controla si el usuario puede acceder al sistema.
                        </div>


                        <div class="prisma-status-box">

                            <input
                                type="hidden"
                                name="estado"
                                value="0"
                            >

                            <label class="prisma-status-label">

                                <input
                                    type="checkbox"
                                    name="estado"
                                    value="1"
                                    {{ old('estado', $usuario->estado) ? 'checked' : '' }}
                                    class="prisma-checkbox"
                                >

                                <div>

                                    <div class="prisma-status-title">
                                        Usuario activo
                                    </div>

                                    <div class="prisma-status-description">
                                        Si está desactivado, el usuario no podrá acceder al sistema.
                                    </div>

                                </div>

                            </label>

                        </div>

                    </div>


                </div>


                {{-- BOTONES --}}
                <div class="prisma-actions">

                    <a
                        href="{{ route('usuarios.index') }}"
                        class="prisma-btn prisma-btn-secondary"
                    >
                        Cancelar
                    </a>


                    <button
                        type="submit"
                        class="prisma-btn prisma-btn-primary"
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
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>

                        Guardar cambios

                    </button>

                </div>


            </div>

        </form>

    </div>

</x-app-layout>