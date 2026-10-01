<x-app-layout>
    <div class="roles-edit-page">

        {{-- ENCABEZADO DEL MÓDULO --}}
        <div class="roles-edit-header">
            <div>
                <div class="roles-edit-small">ADMINISTRACIÓN</div>

                <h1 class="roles-edit-title">
                    Editar rol
                </h1>

                <p class="roles-edit-description">
                    Modifica la información y los privilegios asignados al rol.
                </p>
            </div>

            <a
                href="{{ route('roles.index') }}"
                class="roles-edit-back"
            >
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M19 12H5"></path>
                    <path d="M12 19l-7-7 7-7"></path>
                </svg>

                Volver a roles
            </a>
        </div>

        {{-- ERRORES --}}
        @if ($errors->any())
            <div class="roles-edit-alert roles-edit-alert-error">
                <div class="roles-edit-alert-icon">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="9"></circle>
                        <path d="M12 8v4"></path>
                        <path d="M12 16h.01"></path>
                    </svg>
                </div>

                <div>
                    <strong>No se pudo actualizar el rol.</strong>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form
            action="{{ route('roles.update', $rol->id) }}"
            method="POST"
            class="roles-edit-form"
        >
            @csrf
            @method('PUT')

            {{-- INFORMACIÓN GENERAL --}}
            <div class="roles-edit-card">

                <div class="roles-edit-card-header">
                    <div class="roles-edit-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M12 2l8 4v6c0 5-3.5 8.5-8 10-4.5-1.5-8-5-8-10V6l8-4z"></path>
                            <path d="M9 12l2 2 4-4"></path>
                        </svg>
                    </div>

                    <div>
                        <h2>Información del rol</h2>
                        <p>Actualiza los datos principales del rol.</p>
                    </div>
                </div>

                <div class="roles-edit-grid">

                    <div class="roles-edit-field">
                        <label for="nombre">
                            Nombre del rol
                            <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre', $rol->nombre) }}"
                            placeholder="Ej. Administrador"
                            required
                        >
                    </div>

                    <div class="roles-edit-field">
                        <label for="estado">
                            Estado
                        </label>

                        <div class="roles-edit-switch-row">

                            <label class="roles-edit-switch">
                                <input
                                    type="hidden"
                                    name="estado"
                                    value="0"
                                >

                                <input
                                    type="checkbox"
                                    name="estado"
                                    value="1"
                                    {{ old('estado', $rol->estado) ? 'checked' : '' }}
                                >

                                <span class="roles-edit-slider"></span>
                            </label>

                            <span class="roles-edit-status-text">
                                {{ old('estado', $rol->estado) ? 'Rol activo' : 'Rol inactivo' }}
                            </span>

                        </div>
                    </div>

                    <div class="roles-edit-field roles-edit-field-full">
                        <label for="descripcion">
                            Descripción
                        </label>

                        <textarea
                            id="descripcion"
                            name="descripcion"
                            rows="4"
                            placeholder="Describe las funciones de este rol..."
                        >{{ old('descripcion', $rol->descripcion) }}</textarea>
                    </div>

                </div>
            </div>


            {{-- PRIVILEGIOS --}}
            <div class="roles-edit-card">

                <div class="roles-edit-card-header roles-edit-permissions-header">

                    <div class="roles-edit-card-icon">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <rect x="3" y="4" width="18" height="16" rx="2"></rect>
                            <path d="M7 8h10"></path>
                            <path d="M7 12h10"></path>
                            <path d="M7 16h6"></path>
                        </svg>
                    </div>

                    <div>
                        <h2>Privilegios del rol</h2>
                        <p>
                            Selecciona las acciones que este rol podrá realizar dentro del sistema.
                        </p>
                    </div>

                    <div class="roles-edit-permission-actions">
                        <button
                            type="button"
                            id="seleccionar-todos"
                            class="roles-edit-select-btn"
                        >
                            Seleccionar todos
                        </button>

                        <button
                            type="button"
                            id="deseleccionar-todos"
                            class="roles-edit-select-btn secondary"
                        >
                            Deseleccionar todos
                        </button>
                    </div>

                </div>


                @php
                    $privilegiosSeleccionados = old(
                        'privilegios',
                        $rol->privileges->pluck('id')->toArray()
                    );

                    $privilegiosPorModulo = $privilegios->groupBy('modulo');
                @endphp


                <div class="roles-edit-modules">

                    @foreach ($privilegiosPorModulo as $modulo => $items)

                        <div class="roles-edit-module">

                            <div class="roles-edit-module-header">

                                <div class="roles-edit-module-title">
                                    <span class="roles-edit-module-dot"></span>

                                    <span>
                                        {{ ucfirst($modulo) }}
                                    </span>
                                </div>

                                <button
                                    type="button"
                                    class="roles-edit-module-toggle"
                                    data-module="{{ $loop->index }}"
                                >
                                    Seleccionar módulo
                                </button>

                            </div>


                            <div
                                class="roles-edit-privileges"
                                data-module-container="{{ $loop->index }}"
                            >

                                @foreach ($items as $privilegio)

                                    <label class="roles-edit-privilege">

                                        <input
                                            type="checkbox"
                                            name="privilegios[]"
                                            value="{{ $privilegio->id }}"
                                            class="roles-edit-checkbox"
                                            data-module="{{ $loop->parent->index }}"
                                            {{ in_array($privilegio->id, $privilegiosSeleccionados) ? 'checked' : '' }}
                                        >

                                        <span class="roles-edit-checkmark">
                                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                                <path d="M5 12l4 4L19 6"></path>
                                            </svg>
                                        </span>

                                        <span class="roles-edit-privilege-content">

                                            <strong>
                                                {{ $privilegio->nombre }}
                                            </strong>

                                            @if ($privilegio->descripcion)
                                                <small>
                                                    {{ $privilegio->descripcion }}
                                                </small>
                                            @endif

                                        </span>

                                    </label>

                                @endforeach

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>


            {{-- BOTONES --}}
            <div class="roles-edit-actions">

                <a
                    href="{{ route('roles.index') }}"
                    class="roles-edit-cancel"
                >
                    Cancelar
                </a>

                <button
                    type="submit"
                    class="roles-edit-submit"
                >
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"></path>
                        <path d="M17 21v-8H7v8"></path>
                        <path d="M7 3v5h8"></path>
                    </svg>

                    Guardar cambios
                </button>

            </div>

        </form>

    </div>


    <style>
        .roles-edit-page {
            width: 100%;
            padding-bottom: 40px;
        }

        .roles-edit-header {
            background: linear-gradient(135deg, #1769e0 0%, #1254bd 100%);
            color: white;
            padding: 28px 34px;
            border-radius: 16px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            box-shadow: 0 10px 25px rgba(23, 105, 224, 0.16);
        }

        .roles-edit-small {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            opacity: 0.78;
            margin-bottom: 6px;
        }

        .roles-edit-title {
            margin: 0;
            font-size: 28px;
            line-height: 1.2;
            font-weight: 800;
        }

        .roles-edit-description {
            margin: 7px 0 0;
            font-size: 14px;
            opacity: 0.9;
        }

        .roles-edit-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 16px;
            border: 1px solid rgba(255,255,255,.35);
            border-radius: 10px;
            color: white;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
            white-space: nowrap;
        }

        .roles-edit-back:hover {
            background: rgba(255,255,255,.12);
        }

        .roles-edit-back svg {
            width: 18px;
            height: 18px;
        }

        .roles-edit-alert {
            display: flex;
            gap: 12px;
            padding: 15px 17px;
            border-radius: 12px;
            margin-bottom: 22px;
            font-size: 13px;
        }

        .roles-edit-alert-error {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #9f1239;
        }

        .roles-edit-alert-icon svg {
            width: 21px;
            height: 21px;
        }

        .roles-edit-alert ul {
            margin: 7px 0 0;
            padding-left: 18px;
        }

        .roles-edit-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            margin-bottom: 22px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(15, 23, 42, .04);
        }

        .roles-edit-card-header {
            padding: 22px 24px;
            display: flex;
            align-items: center;
            gap: 13px;
            border-bottom: 1px solid #eef0f3;
        }

        .roles-edit-card-icon {
            width: 42px;
            height: 42px;
            border-radius: 11px;
            background: #eaf2ff;
            color: #1769e0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .roles-edit-card-icon svg {
            width: 21px;
            height: 21px;
        }

        .roles-edit-card-header h2 {
            margin: 0;
            color: #172033;
            font-size: 17px;
            font-weight: 800;
        }

        .roles-edit-card-header p {
            margin: 4px 0 0;
            color: #7a8494;
            font-size: 12px;
        }

        .roles-edit-grid {
            padding: 24px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .roles-edit-field {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .roles-edit-field-full {
            grid-column: 1 / -1;
        }

        .roles-edit-field label {
            color: #344054;
            font-size: 13px;
            font-weight: 700;
        }

        .roles-edit-field label span {
            color: #dc2626;
        }

        .roles-edit-field input[type="text"],
        .roles-edit-field textarea {
            width: 100%;
            border: 1px solid #d9dee7;
            border-radius: 10px;
            padding: 11px 13px;
            color: #172033;
            background: #fff;
            outline: none;
            font-size: 13px;
            transition: .2s;
            box-sizing: border-box;
        }

        .roles-edit-field textarea {
            resize: vertical;
            min-height: 100px;
        }

        .roles-edit-field input[type="text"]:focus,
        .roles-edit-field textarea:focus {
            border-color: #1769e0;
            box-shadow: 0 0 0 3px rgba(23, 105, 224, .10);
        }

        .roles-edit-switch-row {
            min-height: 42px;
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .roles-edit-switch {
            position: relative;
            width: 48px;
            height: 27px;
            display: inline-block;
        }

        .roles-edit-switch input {
            opacity: 0;
            width: 0;
            height: 0;
            position: absolute;
        }

        .roles-edit-slider {
            position: absolute;
            inset: 0;
            cursor: pointer;
            background: #cbd5e1;
            border-radius: 30px;
            transition: .2s;
        }

        .roles-edit-slider::before {
            content: "";
            position: absolute;
            width: 21px;
            height: 21px;
            left: 3px;
            top: 3px;
            background: white;
            border-radius: 50%;
            box-shadow: 0 1px 4px rgba(0,0,0,.2);
            transition: .2s;
        }

        .roles-edit-switch input:checked + .roles-edit-slider {
            background: #1769e0;
        }

        .roles-edit-switch input:checked + .roles-edit-slider::before {
            transform: translateX(21px);
        }

        .roles-edit-status-text {
            color: #475467;
            font-size: 13px;
            font-weight: 600;
        }

        .roles-edit-permissions-header {
            flex-wrap: wrap;
        }

        .roles-edit-permission-actions {
            margin-left: auto;
            display: flex;
            gap: 8px;
        }

        .roles-edit-select-btn {
            border: 1px solid #1769e0;
            background: #1769e0;
            color: white;
            border-radius: 8px;
            padding: 8px 11px;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
            transition: .2s;
        }

        .roles-edit-select-btn:hover {
            background: #1254bd;
        }

        .roles-edit-select-btn.secondary {
            background: white;
            color: #1769e0;
        }

        .roles-edit-select-btn.secondary:hover {
            background: #f1f6ff;
        }

        .roles-edit-modules {
            padding: 22px 24px 24px;
            display: grid;
            gap: 15px;
        }

        .roles-edit-module {
            border: 1px solid #e4e8ef;
            border-radius: 12px;
            overflow: hidden;
        }

        .roles-edit-module-header {
            background: #f8fafc;
            padding: 13px 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            border-bottom: 1px solid #e4e8ef;
        }

        .roles-edit-module-title {
            display: flex;
            align-items: center;
            gap: 9px;
            color: #1f2937;
            font-size: 13px;
            font-weight: 800;
        }

        .roles-edit-module-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #1769e0;
        }

        .roles-edit-module-toggle {
            border: none;
            background: transparent;
            color: #1769e0;
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
        }

        .roles-edit-privileges {
            padding: 14px;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .roles-edit-privilege {
            position: relative;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 12px;
            border: 1px solid #e7eaf0;
            border-radius: 10px;
            cursor: pointer;
            transition: .2s;
            background: white;
        }

        .roles-edit-privilege:hover {
            border-color: #b9d0f7;
            background: #f8fbff;
        }

        .roles-edit-privilege input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .roles-edit-checkmark {
            width: 19px;
            height: 19px;
            min-width: 19px;
            border: 1.5px solid #b8c0cc;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 1px;
            transition: .2s;
        }

        .roles-edit-checkmark svg {
            width: 13px;
            height: 13px;
            color: white;
            opacity: 0;
            transition: .15s;
        }

        .roles-edit-privilege input:checked + .roles-edit-checkmark {
            background: #1769e0;
            border-color: #1769e0;
        }

        .roles-edit-privilege input:checked + .roles-edit-checkmark svg {
            opacity: 1;
        }

        .roles-edit-privilege-content {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }

        .roles-edit-privilege-content strong {
            color: #273244;
            font-size: 12px;
            font-weight: 700;
        }

        .roles-edit-privilege-content small {
            color: #7a8494;
            font-size: 10px;
            line-height: 1.4;
        }

        .roles-edit-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 5px;
        }

        .roles-edit-cancel,
        .roles-edit-submit {
            min-height: 43px;
            padding: 0 17px;
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 13px;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            transition: .2s;
        }

        .roles-edit-cancel {
            background: white;
            color: #475467;
            border: 1px solid #d9dee7;
        }

        .roles-edit-cancel:hover {
            background: #f8fafc;
        }

        .roles-edit-submit {
            border: none;
            background: #1769e0;
            color: white;
            box-shadow: 0 5px 12px rgba(23, 105, 224, .18);
        }

        .roles-edit-submit:hover {
            background: #1254bd;
        }

        .roles-edit-submit svg {
            width: 17px;
            height: 17px;
        }

        @media (max-width: 800px) {
            .roles-edit-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .roles-edit-grid {
                grid-template-columns: 1fr;
            }

            .roles-edit-field-full {
                grid-column: auto;
            }

            .roles-edit-permission-actions {
                width: 100%;
                margin-left: 0;
            }

            .roles-edit-select-btn {
                flex: 1;
            }

            .roles-edit-privileges {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 520px) {
            .roles-edit-header {
                padding: 22px;
            }

            .roles-edit-title {
                font-size: 23px;
            }

            .roles-edit-grid,
            .roles-edit-modules {
                padding-left: 16px;
                padding-right: 16px;
            }

            .roles-edit-actions {
                flex-direction: column-reverse;
            }

            .roles-edit-cancel,
            .roles-edit-submit {
                width: 100%;
            }
        }
    </style>


    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const checkboxes = document.querySelectorAll(
                '.roles-edit-checkbox'
            );

            const seleccionarTodos =
                document.getElementById('seleccionar-todos');

            const deseleccionarTodos =
                document.getElementById('deseleccionar-todos');

            const moduleButtons =
                document.querySelectorAll(
                    '.roles-edit-module-toggle'
                );


            // Seleccionar todos
            seleccionarTodos.addEventListener('click', function () {

                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = true;
                });

            });


            // Deseleccionar todos
            deseleccionarTodos.addEventListener('click', function () {

                checkboxes.forEach(function (checkbox) {
                    checkbox.checked = false;
                });

            });


            // Seleccionar / deseleccionar por módulo
            moduleButtons.forEach(function (button) {

                button.addEventListener('click', function () {

                    const moduleId =
                        this.dataset.module;

                    const moduleCheckboxes =
                        document.querySelectorAll(
                            '.roles-edit-checkbox[data-module="' +
                            moduleId +
                            '"]'
                        );

                    const todosMarcados =
                        Array.from(moduleCheckboxes)
                            .every(function (checkbox) {
                                return checkbox.checked;
                            });

                    moduleCheckboxes.forEach(function (checkbox) {
                        checkbox.checked = !todosMarcados;
                    });

                });

            });


            // Cambiar texto del estado
            const estadoInput =
                document.querySelector(
                    '.roles-edit-switch input[type="checkbox"]'
                );

            const estadoTexto =
                document.querySelector(
                    '.roles-edit-status-text'
                );

            if (estadoInput && estadoTexto) {

                estadoInput.addEventListener('change', function () {

                    estadoTexto.textContent =
                        this.checked
                            ? 'Rol activo'
                            : 'Rol inactivo';

                });

            }

        });
    </script>

</x-app-layout>