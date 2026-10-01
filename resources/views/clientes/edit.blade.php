<x-app-layout>

    <div class="clientes-page">

        {{-- ENCABEZADO --}}
        <div class="page-header">

            <div>

                <a href="{{ route('clientes.index') }}" class="back-link">

                    <svg width="18" height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path d="M19 12H5"></path>
                        <path d="M12 19l-7-7 7-7"></path>

                    </svg>

                    Volver a clientes

                </a>

                <span class="header-label">
                    SUPERMERCADO PRISMA
                </span>

                <h1>
                    Editar cliente
                </h1>

                <p>
                    Modifica la información del cliente seleccionado.
                </p>

            </div>

        </div>


        {{-- ERRORES --}}
        @if($errors->any())

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

                <div>

                    <strong>
                        Revisa los siguientes campos:
                    </strong>

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            </div>

        @endif


        {{-- FORMULARIO --}}
        <form action="{{ route('clientes.update', $cliente) }}"
              method="POST">

            @csrf
            @method('PUT')


            <div class="content-card">

                <div class="card-header">

                    <div>

                        <span class="section-label">
                            INFORMACIÓN PERSONAL
                        </span>

                        <h2>
                            Datos del cliente
                        </h2>

                        <p>
                            Actualiza los datos necesarios del cliente.
                        </p>

                    </div>

                </div>


                <div class="form-grid">

                    {{-- NOMBRE --}}
                    <div class="form-group">

                        <label for="nombre">
                            Nombre
                            <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="nombre"
                            name="nombre"
                            value="{{ old('nombre', $cliente->nombre) }}"
                            maxlength="100"
                            required
                        >

                    </div>


                    {{-- APELLIDO --}}
                    <div class="form-group">

                        <label for="apellido">
                            Apellido
                            <span>*</span>
                        </label>

                        <input
                            type="text"
                            id="apellido"
                            name="apellido"
                            value="{{ old('apellido', $cliente->apellido) }}"
                            maxlength="100"
                            required
                        >

                    </div>


                    {{-- DNI --}}
                    <div class="form-group">

                        <label for="dni">
                            DNI
                        </label>

                        <input
                            type="text"
                            id="dni"
                            name="dni"
                            value="{{ old('dni', $cliente->dni) }}"
                            maxlength="20"
                        >

                        <small>
                            El DNI debe ser único dentro del sistema.
                        </small>

                    </div>


                    {{-- TELÉFONO --}}
                    <div class="form-group">

                        <label for="telefono">
                            Teléfono
                        </label>

                        <input
                            type="text"
                            id="telefono"
                            name="telefono"
                            value="{{ old('telefono', $cliente->telefono) }}"
                            maxlength="20"
                        >

                    </div>


                    {{-- CORREO --}}
                    <div class="form-group">

                        <label for="correo">
                            Correo electrónico
                        </label>

                        <input
                            type="email"
                            id="correo"
                            name="correo"
                            value="{{ old('correo', $cliente->correo) }}"
                            maxlength="100"
                        >

                    </div>


                    {{-- ESTADO --}}
                    <div class="form-group">

                        <label>
                            Estado
                        </label>

                        <div class="toggle-container">

                            <label class="switch">

                                <input
                                    type="checkbox"
                                    id="estado"
                                    name="estado"
                                    value="1"
                                    {{ old('estado', $cliente->estado) ? 'checked' : '' }}
                                >

                                <span class="slider"></span>

                            </label>

                            <div>

                                <strong>
                                    Cliente activo
                                </strong>

                                <small>
                                    El cliente podrá utilizarse en las ventas.
                                </small>

                            </div>

                        </div>

                    </div>


                    {{-- DIRECCIÓN --}}
                    <div class="form-group full-width">

                        <label for="direccion">
                            Dirección
                        </label>

                        <textarea
                            id="direccion"
                            name="direccion"
                            rows="4"
                            maxlength="255"
                            placeholder="Ingrese la dirección del cliente"
                        >{{ old('direccion', $cliente->direccion) }}</textarea>

                    </div>

                </div>

            </div>


            {{-- INFORMACIÓN --}}
            <div class="info-box">

                <svg width="20" height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2">

                    <circle cx="12" cy="12" r="10"></circle>

                    <line x1="12" y1="16" x2="12" y2="12"></line>

                    <line x1="12" y1="8" x2="12.01" y2="8"></line>

                </svg>

                <div>

                    <strong>
                        Información del registro
                    </strong>

                    <p>
                        Los campos marcados con (*) son obligatorios.
                        El DNI debe ser único dentro del sistema.
                    </p>

                </div>

            </div>


            {{-- BOTONES --}}
            <div class="form-actions">

                <a href="{{ route('clientes.index') }}"
                   class="btn-secondary">

                    Cancelar

                </a>


                <button type="submit"
                        class="btn-primary">

                    <svg width="18" height="18"
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

                    Guardar cambios

                </button>

            </div>

        </form>

    </div>


    <style>

        .clientes-page {
            padding: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .page-header {
            background: #0f172a;
            color: white;
            border-radius: 18px;
            padding: 30px;
            margin-bottom: 24px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 20px;
            transition: .2s;
        }

        .back-link:hover {
            color: white;
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

        .alert {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            padding: 15px 17px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert.error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .alert strong {
            display: block;
            margin-bottom: 5px;
        }

        .alert ul {
            margin: 0;
            padding-left: 18px;
        }

        .alert li {
            margin-bottom: 2px;
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

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .form-group {
            padding: 20px 25px;
            border-bottom: 1px solid #eef2f7;
        }

        .form-group:nth-child(odd) {
            border-right: 1px solid #eef2f7;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
            border-right: 0;
        }

        .form-group label {
            display: block;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-group label span {
            color: #dc2626;
        }

        .form-group input:not([type="checkbox"]),
        .form-group textarea {
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #dbe2ea;
            border-radius: 9px;
            background: #fff;
            color: #1e293b;
            font-size: 13px;
            padding: 11px 12px;
            outline: none;
            transition: .2s;
            font-family: inherit;
        }

        .form-group input:not([type="checkbox"]):focus,
        .form-group textarea:focus {
            border-color: #64748b;
            box-shadow: 0 0 0 3px rgba(100, 116, 139, .10);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 105px;
        }

        .form-group small {
            display: block;
            color: #94a3b8;
            font-size: 11px;
            margin-top: 6px;
        }

        .toggle-container {
            min-height: 43px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .toggle-container strong {
            display: block;
            color: #334155;
            font-size: 13px;
        }

        .toggle-container small {
            margin-top: 2px;
        }

        .switch {
            position: relative;
            width: 44px;
            height: 24px;
            margin: 0;
            flex-shrink: 0;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            inset: 0;
            background: #cbd5e1;
            border-radius: 999px;
            transition: .2s;
        }

        .slider::before {
            content: "";
            position: absolute;
            width: 18px;
            height: 18px;
            left: 3px;
            top: 3px;
            background: white;
            border-radius: 50%;
            transition: .2s;
            box-shadow: 0 1px 3px rgba(0,0,0,.2);
        }

        .switch input:checked + .slider {
            background: #334155;
        }

        .switch input:checked + .slider::before {
            transform: translateX(20px);
        }

        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 16px;
            margin-top: 20px;
            color: #475569;
        }

        .info-box svg {
            margin-top: 1px;
            flex-shrink: 0;
        }

        .info-box strong {
            display: block;
            color: #334155;
            font-size: 13px;
            margin-bottom: 4px;
        }

        .info-box p {
            margin: 0;
            font-size: 12px;
            line-height: 1.5;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
            margin-bottom: 25px;
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
            cursor: pointer;
        }

        .btn-primary {
            border: 1px solid #0f172a;
            background: #0f172a;
            color: white;
        }

        .btn-primary:hover {
            background: #1e293b;
        }

        .btn-secondary {
            border: 1px solid #dbe2ea;
            background: white;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #f8fafc;
        }

        @media (max-width: 700px) {

            .clientes-page {
                padding: 18px;
            }

            .page-header {
                padding: 23px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group:nth-child(odd) {
                border-right: 0;
            }

            .form-group.full-width {
                grid-column: auto;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            .form-actions a,
            .form-actions button {
                width: 100%;
            }

        }

    </style>

</x-app-layout>