<x-app-layout>

    <div class="categorias-page">

        <div class="page-header">

            <div>
                <a href="{{ route('categorias.index') }}" class="back-link">
                    ← Volver a categorías
                </a>

                <span class="section-label">
                    SUPERMERCADO PRISMA
                </span>

                <h1>Nueva categoría</h1>

                <p>
                    Registra una nueva categoría para organizar los productos del supermercado.
                </p>
            </div>

        </div>


        @if ($errors->any())
            <div class="alert alert-error">
                <strong>Hay algunos errores en el formulario:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="form-card">

            <div class="form-card-header">
                <div>
                    <h2>Información de la categoría</h2>

                    <p>
                        Completa los datos solicitados para registrar la categoría.
                    </p>
                </div>
            </div>


            <form
                action="{{ route('categorias.store') }}"
                method="POST"
                class="category-form"
            >

                @csrf


                <div class="form-group">

                    <label for="nombre">
                        Nombre de la categoría
                        <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        value="{{ old('nombre') }}"
                        placeholder="Ej. Bebidas"
                        maxlength="100"
                        required
                    >

                    @error('nombre')
                        <small class="field-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="form-group">

                    <label for="descripcion">
                        Descripción
                    </label>

                    <textarea
                        id="descripcion"
                        name="descripcion"
                        rows="5"
                        placeholder="Describe brevemente esta categoría..."
                    >{{ old('descripcion') }}</textarea>

                    @error('descripcion')
                        <small class="field-error">
                            {{ $message }}
                        </small>
                    @enderror

                </div>


                <div class="form-group">

                    <label class="status-label">
                        Estado
                    </label>

                    <label class="switch-container">

                        <input
                            type="checkbox"
                            name="estado"
                            value="1"
                            {{ old('estado', true) ? 'checked' : '' }}
                        >

                        <span class="switch"></span>

                        <span class="switch-text">
                            Categoría activa
                        </span>

                    </label>

                    <p class="field-help">
                        Las categorías activas estarán disponibles para asociarlas a productos.
                    </p>

                </div>


                <div class="form-actions">

                    <a
                        href="{{ route('categorias.index') }}"
                        class="btn btn-secondary"
                    >
                        Cancelar
                    </a>

                    <button
                        type="submit"
                        class="btn btn-primary"
                    >
                        Guardar categoría
                    </button>

                </div>

            </form>

        </div>

    </div>


    <style>

        .categorias-page {
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


        /* FORM CARD */

        .form-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.06);
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
            font-weight: 750;
        }


        .form-card-header p {
            margin: 6px 0 0;
            color: #64748b;
            font-size: 14px;
        }


        .category-form {
            padding: 30px;
        }


        /* FORM */

        .form-group {
            margin-bottom: 24px;
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


        .form-group input[type="text"],
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


        .form-group input[type="text"] {
            height: 46px;
        }


        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }


        .form-group input[type="text"]:focus,
        .form-group textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.10);
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
            margin: 8px 0 0;
            color: #64748b;
            font-size: 13px;
        }


        /* SWITCH */

        .status-label {
            margin-bottom: 10px !important;
        }


        .switch-container {
            display: inline-flex !important;
            align-items: center;
            gap: 10px;
            margin: 0 !important;
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
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
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
            font-weight: 600;
        }


        /* ACTIONS */

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding-top: 10px;
            border-top: 1px solid #e2e8f0;
            margin-top: 10px;
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

            .categorias-page {
                padding: 18px;
            }


            .page-header {
                padding: 24px;
            }


            .page-header h1 {
                font-size: 25px;
            }


            .category-form {
                padding: 22px;
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