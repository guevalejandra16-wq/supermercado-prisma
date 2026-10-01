<x-app-layout>

    <style>
        .role-create-page {
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

        .card {
            background: white;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .08);
            margin-bottom: 24px;
        }

        .card-header {
            padding: 24px 26px;
            border-bottom: 1px solid #e2e8f0;
        }

        .card-header h2 {
            margin: 0;
            color: #0f172a;
            font-size: 20px;
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

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-label {
            color: #334155;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .form-input,
        .form-textarea {
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            padding: 12px 14px;
            color: #0f172a;
            background: white;
            font-size: 14px;
            outline: none;
            transition: .2s ease;
        }

        .form-input:focus,
        .form-textarea:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .10);
        }

        .form-textarea {
            min-height: 110px;
            resize: vertical;
        }

        .field-error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
            font-weight: 600;
        }

        .switch-wrapper {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
        }

        .switch-wrapper input {
            width: 18px;
            height: 18px;
            accent-color: #4f46e5;
        }

        .switch-text strong {
            display: block;
            color: #0f172a;
            font-size: 13px;
        }

        .switch-text span {
            display: block;
            margin-top: 2px;
            color: #64748b;
            font-size: 12px;
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
            background: #fff;
        }

        .module-header {
            padding: 15px 17px;
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
            padding: 8px;
        }

        .privilege-item {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            padding: 11px 10px;
            border-radius: 9px;
            cursor: pointer;
            transition: .15s ease;
        }

        .privilege-item:hover {
            background: #f8fafc;
        }

        .privilege-item input {
            width: 17px;
            height: 17px;
            margin-top: 1px;
            accent-color: #4f46e5;
            flex-shrink: 0;
        }

        .privilege-name {
            color: #334155;
            font-size: 13px;
            font-weight: 700;
        }

        .privilege-description {
            margin-top: 3px;
            color: #94a3b8;
            font-size: 11px;
            line-height: 1.4;
        }

        .privilege-key {
            margin-top: 3px;
            color: #6366f1;
            font-family: monospace;
            font-size: 10px;
        }

        .select-actions {
            display: flex;
            gap: 8px;
            margin-bottom: 18px;
        }

        .small-btn {
            border: 1px solid #cbd5e1;
            background: white;
            color: #475569;
            border-radius: 8px;
            padding: 8px 12px;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
        }

        .small-btn:hover {
            background: #f1f5f9;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
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
            border: none;
            cursor: pointer;
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
            transform: translateY(-1px);
        }

        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            border-radius: 10px;
            padding: 14px 18px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        @media (max-width: 800px) {
            .form-grid,
            .privileges-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .role-create-page {
                padding: 20px 14px 35px;
            }

            .role-header {
                padding: 23px;
            }

            .role-header h1 {
                font-size: 25px;
            }

            .card-body {
                padding: 20px;
            }

            .actions {
                flex-direction: column-reverse;
            }

            .action-group {
                width: 100%;
            }

            .actions .btn {
                width: 100%;
            }
        }
    </style>


    <div class="role-create-page">

        {{-- ENCABEZADO --}}
        <div class="role-header">

            <small>
                Supermercado Prisma
            </small>

            <h1>
                Nuevo rol
            </h1>

            <p>
                Crea un perfil de acceso y asigna los privilegios correspondientes.
            </p>

        </div>


        {{-- ERRORES --}}
        @if($errors->any())

            <div class="alert-error">

                <strong>
                    Revisa los siguientes errores:
                </strong>

                <ul style="margin:8px 0 0 18px;">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('roles.store') }}"
            method="POST"
        >

            @csrf


            {{-- INFORMACIÓN GENERAL --}}
            <div class="card">

                <div class="card-header">

                    <h2>
                        Información general
                    </h2>

                    <p>
                        Define el nombre y descripción del nuevo rol.
                    </p>

                </div>


                <div class="card-body">

                    <div class="form-grid">

                        <div class="form-group">

                            <label
                                for="nombre"
                                class="form-label"
                            >
                                Nombre del rol
                            </label>

                            <input
                                type="text"
                                id="nombre"
                                name="nombre"
                                class="form-input"
                                value="{{ old('nombre') }}"
                                placeholder="Ej. Encargado de Ventas"
                                required
                            >

                            @error('nombre')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                Estado
                            </label>

                            <label class="switch-wrapper">

                                <input
                                    type="checkbox"
                                    name="estado"
                                    value="1"
                                    {{ old('estado', true) ? 'checked' : '' }}
                                >

                                <span class="switch-text">

                                    <strong>
                                        Rol activo
                                    </strong>

                                    <span>
                                        Permite asignar este rol a usuarios.
                                    </span>

                                </span>

                            </label>

                        </div>


                        <div class="form-group full">

                            <label
                                for="descripcion"
                                class="form-label"
                            >
                                Descripción
                            </label>

                            <textarea
                                id="descripcion"
                                name="descripcion"
                                class="form-textarea"
                                placeholder="Describe las funciones que tendrá este rol..."
                            >{{ old('descripcion') }}</textarea>

                            @error('descripcion')

                                <div class="field-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>

            </div>


            {{-- PRIVILEGIOS --}}
            <div class="card">

                <div class="card-header">

                    <h2>
                        Privilegios del rol
                    </h2>

                    <p>
                        Selecciona las acciones que podrá realizar este perfil dentro del sistema.
                    </p>

                </div>


                <div class="card-body">

                    <div class="select-actions">

                        <button
                            type="button"
                            class="small-btn"
                            onclick="seleccionarTodos()"
                        >
                            Seleccionar todos
                        </button>

                        <button
                            type="button"
                            class="small-btn"
                            onclick="deseleccionarTodos()"
                        >
                            Deseleccionar todos
                        </button>

                    </div>


                    <div class="privileges-grid">

                        @foreach($privilegios->groupBy('modulo') as $modulo => $privilegiosModulo)

                            <div class="privilege-module">

                                <div class="module-header">

                                    <div class="module-title">
                                        {{ ucfirst($modulo) }}
                                    </div>

                                    <div class="module-count">
                                        {{ $privilegiosModulo->count() }}
                                        privilegio(s)
                                    </div>

                                </div>


                                <div class="privilege-list">

                                    @foreach($privilegiosModulo as $privilegio)

                                        <label class="privilege-item">

                                            <input
                                                type="checkbox"
                                                name="privilegios[]"
                                                value="{{ $privilegio->id }}"
                                                {{ in_array(
                                                    $privilegio->id,
                                                    old('privilegios', [])
                                                ) ? 'checked' : '' }}
                                            >

                                            <div>

                                                <div class="privilege-name">
                                                    {{ $privilegio->nombre }}
                                                </div>

                                                @if($privilegio->descripcion)

                                                    <div class="privilege-description">
                                                        {{ $privilegio->descripcion }}
                                                    </div>

                                                @endif

                                                <div class="privilege-key">
                                                    {{ $privilegio->nombre }}
                                                </div>

                                            </div>

                                        </label>

                                    @endforeach

                                </div>

                            </div>

                        @endforeach

                    </div>

                </div>

            </div>


            {{-- BOTONES --}}
            <div class="actions">

                <a
                    href="{{ route('roles.index') }}"
                    class="btn btn-secondary"
                >

                    <svg viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M19 12H5"/>
                        <path d="M12 19l-7-7 7-7"/>

                    </svg>

                    Cancelar

                </a>


                <div class="action-group">

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M12 5v14"/>
                            <path d="M5 12h14"/>

                        </svg>

                        Crear rol

                    </button>

                </div>

            </div>

        </form>

    </div>


    <script>

        function seleccionarTodos() {

            document
                .querySelectorAll('input[name="privilegios[]"]')
                .forEach(function (checkbox) {

                    checkbox.checked = true;

                });

        }


        function deseleccionarTodos() {

            document
                .querySelectorAll('input[name="privilegios[]"]')
                .forEach(function (checkbox) {

                    checkbox.checked = false;

                });

        }

    </script>

</x-app-layout>