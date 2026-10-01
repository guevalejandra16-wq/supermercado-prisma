<x-app-layout>

    <div class="proveedores-page">

        <!-- ENCABEZADO -->

        <div class="page-header">

            <div>

                <a
                    href="{{ route('proveedores.index') }}"
                    class="back-link"
                >
                    ← Volver a proveedores
                </a>

                <span class="section-label">
                    SUPERMERCADO PRISMA
                </span>

                <h1>Nuevo proveedor</h1>

                <p>
                    Registra un nuevo proveedor para abastecer los productos del supermercado.
                </p>

            </div>

        </div>


        <!-- ERRORES -->

        @if ($errors->any())

            <div class="alert alert-error">

                <strong>
                    Hay algunos errores en el formulario:
                </strong>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- FORMULARIO -->

        <div class="form-card">

            <div class="form-card-header">

                <div>

                    <h2>
                        Información del proveedor
                    </h2>

                    <p>
                        Completa los datos del proveedor que deseas registrar.
                    </p>

                </div>

            </div>


            <form
                action="{{ route('proveedores.store') }}"
                method="POST"
                class="supplier-form"
            >

                @csrf


                <!-- INFORMACIÓN PRINCIPAL -->

                <div class="form-section">

                    <div class="section-title">

                        <h3>
                            Datos generales
                        </h3>

                        <p>
                            Información básica del proveedor.
                        </p>

                    </div>


                    <div class="form-grid">

                        <div class="form-group full">

                            <label for="nombre">

                                Nombre del proveedor

                                <span>*</span>

                            </label>

                            <input
                                type="text"
                                id="nombre"
                                name="nombre"
                                value="{{ old('nombre') }}"
                                placeholder="Ej. Distribuidora Nacional"
                                maxlength="150"
                                required
                            >

                            @error('nombre')

                                <small class="field-error">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="rtn">
                                RTN
                            </label>

                            <input
                                type="text"
                                id="rtn"
                                name="rtn"
                                value="{{ old('rtn') }}"
                                placeholder="Ej. 08011999123456"
                                maxlength="20"
                            >

                            @error('rtn')

                                <small class="field-error">
                                    {{ $message }}
                                </small>

                            @enderror

                            <p class="field-help">
                                Registro Tributario Nacional del proveedor.
                            </p>

                        </div>


                        <div class="form-group">

                            <label for="contacto">
                                Persona de contacto
                            </label>

                            <input
                                type="text"
                                id="contacto"
                                name="contacto"
                                value="{{ old('contacto') }}"
                                placeholder="Ej. Claudia Ramos"
                                maxlength="100"
                            >

                            @error('contacto')

                                <small class="field-error">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                    </div>

                </div>


                <!-- CONTACTO -->

                <div class="form-section">

                    <div class="section-title">

                        <h3>
                            Información de contacto
                        </h3>

                        <p>
                            Datos para comunicarse con el proveedor.
                        </p>

                    </div>


                    <div class="form-grid">

                        <div class="form-group">

                            <label for="telefono">
                                Teléfono
                            </label>

                            <input
                                type="text"
                                id="telefono"
                                name="telefono"
                                value="{{ old('telefono') }}"
                                placeholder="Ej. 3361-6874"
                                maxlength="20"
                            >

                            @error('telefono')

                                <small class="field-error">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <div class="form-group">

                            <label for="correo">
                                Correo electrónico
                            </label>

                            <input
                                type="email"
                                id="correo"
                                name="correo"
                                value="{{ old('correo') }}"
                                placeholder="proveedor@correo.com"
                                maxlength="100"
                            >

                            @error('correo')

                                <small class="field-error">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>


                        <div class="form-group full">

                            <label for="direccion">
                                Dirección
                            </label>

                            <textarea
                                id="direccion"
                                name="direccion"
                                rows="4"
                                placeholder="Dirección del proveedor..."
                            >{{ old('direccion') }}</textarea>

                            @error('direccion')

                                <small class="field-error">
                                    {{ $message }}
                                </small>

                            @enderror

                        </div>

                    </div>

                </div>


                <!-- ESTADO -->

                <div class="form-section">

                    <div class="section-title">

                        <h3>
                            Estado del proveedor
                        </h3>

                        <p>
                            Define si el proveedor estará disponible para las operaciones.
                        </p>

                    </div>


                    <label class="switch-container">

                        <input
                            type="checkbox"
                            name="estado"
                            value="1"
                            {{ old('estado', true) ? 'checked' : '' }}
                        >

                        <span class="switch"></span>

                        <span class="switch-text">
                            Proveedor activo
                        </span>

                    </label>


                    <p class="field-help">
                        Los proveedores activos estarán disponibles para registrar compras y asociarlos a productos.
                    </p>

                </div>


                <!-- ACCIONES -->

                <div class="form-actions">

                    <a
                        href="{{ route('proveedores.index') }}"
                        class="btn btn-secondary"
                    >
                        Cancelar
                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Guardar proveedor
                    </button>

                </div>

            </form>

        </div>

    </div>


    <style>

        .proveedores-page {
            padding: 32px;
            max-width: 1100px;
            margin: 0 auto;
        }


        /* HEADER */

        .page-header {
            background: #0f172a;

            border-radius: 18px;

            padding: 30px 32px;

            margin-bottom: 24px;

            color: white;
        }


        .back-link {
            display: inline-flex;

            align-items: center;

            gap: 6px;

            color: #cbd5e1;

            text-decoration: none;

            font-size: 14px;

            font-weight: 600;

            margin-bottom: 20px;

            transition: 0.2s;
        }


        .back-link:hover {
            color: white;
        }


        .section-label {
            display: block;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 1.5px;

            color: #94a3b8;

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


        /* ALERT */

        .alert {
            padding: 16px 18px;

            border-radius: 12px;

            margin-bottom: 22px;

            font-size: 14px;
        }


        .alert-error {
            background: #fef2f2;

            border: 1px solid #fecaca;

            color: #991b1b;
        }


        .alert-error ul {
            margin: 8px 0 0 20px;

            padding: 0;
        }


        /* CARD */

        .form-card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 18px;

            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.06);

            overflow: hidden;
        }


        .form-card-header {
            padding: 25px 30px;

            border-bottom: 1px solid #e2e8f0;

            background: #f8fafc;
        }


        .form-card-header h2 {
            margin: 0;

            color: #0f172a;

            font-size: 19px;

            font-weight: 800;
        }


        .form-card-header p {
            margin: 6px 0 0;

            color: #64748b;

            font-size: 14px;
        }


        /* FORM */

        .supplier-form {
            padding: 30px;
        }


        .form-section {
            padding-bottom: 28px;

            margin-bottom: 28px;

            border-bottom: 1px solid #e2e8f0;
        }


        .form-section:last-of-type {
            margin-bottom: 0;
        }


        .section-title {
            margin-bottom: 20px;
        }


        .section-title h3 {
            margin: 0;

            color: #0f172a;

            font-size: 16px;

            font-weight: 800;
        }


        .section-title p {
            margin: 5px 0 0;

            color: #64748b;

            font-size: 13px;
        }


        .form-grid {
            display: grid;

            grid-template-columns:
                repeat(2, minmax(0, 1fr));

            gap: 20px;
        }


        .form-group.full {
            grid-column: 1 / -1;
        }


        .form-group label {
            display: block;

            margin-bottom: 8px;

            color: #334155;

            font-size: 14px;

            font-weight: 700;
        }


        .form-group label span {
            color: #dc2626;
        }


        .form-group input,
        .form-group textarea {
            width: 100%;

            box-sizing: border-box;

            border: 1px solid #cbd5e1;

            border-radius: 10px;

            background: white;

            color: #0f172a;

            font-size: 14px;

            padding: 12px 14px;

            outline: none;

            transition: 0.2s;
        }


        .form-group input {
            height: 46px;
        }


        .form-group textarea {
            resize: vertical;

            min-height: 110px;
        }


        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #2563eb;

            box-shadow:
                0 0 0 3px rgba(37, 99, 235, 0.10);
        }


        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: #94a3b8;
        }


        .field-error {
            display: block;

            margin-top: 6px;

            color: #dc2626;

            font-size: 13px;
        }


        .field-help {
            margin: 7px 0 0;

            color: #64748b;

            font-size: 12px;

            line-height: 1.5;
        }


        /* SWITCH */

        .switch-container {
            display: inline-flex;

            align-items: center;

            gap: 10px;

            cursor: pointer;
        }


        .switch-container input {
            position: absolute;

            opacity: 0;

            pointer-events: none;
        }


        .switch {
            width: 44px;

            height: 24px;

            background: #cbd5e1;

            border-radius: 999px;

            position: relative;

            transition: 0.2s;
        }


        .switch::after {
            content: "";

            position: absolute;

            width: 18px;

            height: 18px;

            background: white;

            border-radius: 50%;

            top: 3px;

            left: 3px;

            box-shadow:
                0 1px 3px rgba(0, 0, 0, 0.2);

            transition: 0.2s;
        }


        .switch-container input:checked + .switch {
            background: #2563eb;
        }


        .switch-container input:checked + .switch::after {
            transform: translateX(20px);
        }


        .switch-text {
            color: #334155;

            font-size: 14px;

            font-weight: 700;
        }


        /* ACTIONS */

        .form-actions {
            display: flex;

            justify-content: flex-end;

            gap: 12px;

            padding-top: 10px;
        }


        .btn {
            display: inline-flex;

            align-items: center;

            justify-content: center;

            min-height: 42px;

            padding: 0 18px;

            border-radius: 10px;

            text-decoration: none;

            border: none;

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


        .btn-secondary {
            background: #f1f5f9;

            color: #334155;

            border: 1px solid #cbd5e1;
        }


        .btn-secondary:hover {
            background: #e2e8f0;
        }


        /* RESPONSIVE */

        @media (max-width: 700px) {

            .proveedores-page {
                padding: 18px;
            }


            .page-header {
                padding: 24px;
            }


            .page-header h1 {
                font-size: 25px;
            }


            .supplier-form {
                padding: 22px;
            }


            .form-grid {
                grid-template-columns: 1fr;
            }


            .form-group.full {
                grid-column: auto;
            }


            .form-actions {
                flex-direction: column-reverse;
            }


            .form-actions .btn {
                width: 100%;
            }

        }

    </style>

</x-app-layout>