<x-app-layout>

    <style>
        .inventario-create-page {
            max-width: 1000px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .create-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .create-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .create-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .create-header p {
            margin: 8px 0 0;
            color: #cbd5e1;
            font-size: 15px;
        }

        .form-card {
            background: white;
            border-radius: 18px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .08);
            overflow: hidden;
        }

        .form-section {
            padding: 28px;
            border-bottom: 1px solid #e2e8f0;
        }

        .form-section:last-child {
            border-bottom: none;
        }

        .section-title {
            margin: 0 0 5px;
            color: #0f172a;
            font-size: 19px;
            font-weight: 800;
        }

        .section-description {
            margin: 0 0 24px;
            color: #64748b;
            font-size: 14px;
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
            margin-bottom: 8px;
            color: #334155;
            font-size: 13px;
            font-weight: 800;
        }

        .form-label span {
            color: #dc2626;
        }

        .form-input,
        .form-select,
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
            box-sizing: border-box;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, .12);
        }

        .form-textarea {
            min-height: 110px;
            resize: vertical;
        }

        .form-help {
            margin-top: 6px;
            color: #94a3b8;
            font-size: 12px;
        }

        .error-message {
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
            font-weight: 600;
        }

        .type-selector {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
        }

        .type-option {
            position: relative;
        }

        .type-option input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .type-label {
            display: flex;
            align-items: center;
            gap: 14px;
            min-height: 70px;
            padding: 14px 18px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            cursor: pointer;
            transition: .2s ease;
            box-sizing: border-box;
        }

        .type-label:hover {
            border-color: #c7d2fe;
            background: #f8fafc;
        }

        .type-icon {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #eef2ff;
            color: #4338ca;
            flex-shrink: 0;
        }

        .type-icon svg {
            width: 21px;
            height: 21px;
        }

        .type-info strong {
            display: block;
            color: #0f172a;
            font-size: 14px;
            font-weight: 800;
        }

        .type-info span {
            display: block;
            margin-top: 3px;
            color: #64748b;
            font-size: 12px;
        }

        .type-option input:checked + .type-label {
            border-color: #4f46e5;
            background: #eef2ff;
        }

        .notice {
            display: flex;
            gap: 13px;
            align-items: flex-start;
            padding: 16px;
            border-radius: 12px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
        }

        .notice svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
            margin-top: 1px;
        }

        .notice strong {
            display: block;
            margin-bottom: 3px;
            font-size: 13px;
        }

        .notice p {
            margin: 0;
            font-size: 12px;
            line-height: 1.5;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            padding: 22px 28px;
            background: #f8fafc;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 44px;
            padding: 0 18px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 800;
            text-decoration: none;
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

        @media (max-width: 700px) {

            .inventario-create-page {
                padding: 20px 14px 35px;
            }

            .create-header {
                padding: 23px;
            }

            .create-header h1 {
                font-size: 25px;
            }

            .form-section {
                padding: 22px;
            }

            .form-grid,
            .type-selector {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .form-actions {
                padding: 18px 22px;
                flex-direction: column-reverse;
            }

            .btn {
                width: 100%;
            }
        }
    </style>


    <div class="inventario-create-page">

        {{-- ENCABEZADO --}}
        <div class="create-header">

            <small>Supermercado Prisma</small>

            <h1>
                Nuevo movimiento
            </h1>

            <p>
                Registra una entrada o salida de productos del inventario.
            </p>

        </div>


        {{-- ERRORES --}}
        @if($errors->any())

            <div style="
                background:#fee2e2;
                border:1px solid #fecaca;
                color:#991b1b;
                padding:16px 18px;
                border-radius:12px;
                margin-bottom:20px;
            ">

                <strong style="display:block;margin-bottom:8px;">
                    No se pudo registrar el movimiento.
                </strong>

                <ul style="margin:0;padding-left:20px;font-size:13px;">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        <form
            action="{{ route('inventario.store') }}"
            method="POST"
        >

            @csrf


            <div class="form-card">

                {{-- TIPO DE MOVIMIENTO --}}
                <div class="form-section">

                    <h2 class="section-title">
                        Tipo de movimiento
                    </h2>

                    <p class="section-description">
                        Selecciona si deseas aumentar o disminuir las existencias.
                    </p>


                    <div class="type-selector">

                        {{-- ENTRADA --}}
                        <div class="type-option">

                            <input
                                type="radio"
                                name="tipo"
                                id="tipo_entrada"
                                value="ENTRADA"
                                {{ old('tipo', 'ENTRADA') === 'ENTRADA' ? 'checked' : '' }}
                            >

                            <label
                                for="tipo_entrada"
                                class="type-label"
                            >

                                <div class="type-icon">

                                    <svg viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="2">

                                        <path d="M12 19V5"/>
                                        <path d="M5 12l7-7 7 7"/>

                                    </svg>

                                </div>

                                <div class="type-info">

                                    <strong>
                                        Entrada
                                    </strong>

                                    <span>
                                        Aumenta el stock disponible.
                                    </span>

                                </div>

                            </label>

                        </div>


                        {{-- SALIDA --}}
                        <div class="type-option">

                            <input
                                type="radio"
                                name="tipo"
                                id="tipo_salida"
                                value="SALIDA"
                                {{ old('tipo') === 'SALIDA' ? 'checked' : '' }}
                            >

                            <label
                                for="tipo_salida"
                                class="type-label"
                            >

                                <div class="type-icon">

                                    <svg viewBox="0 0 24 24"
                                         fill="none"
                                         stroke="currentColor"
                                         stroke-width="2">

                                        <path d="M12 5v14"/>
                                        <path d="M5 12l7 7 7-7"/>

                                    </svg>

                                </div>

                                <div class="type-info">

                                    <strong>
                                        Salida
                                    </strong>

                                    <span>
                                        Disminuye el stock disponible.
                                    </span>

                                </div>

                            </label>

                        </div>

                    </div>

                    @error('tipo')

                        <div class="error-message">
                            {{ $message }}
                        </div>

                    @enderror

                </div>


                {{-- INFORMACIÓN DEL MOVIMIENTO --}}
                <div class="form-section">

                    <h2 class="section-title">
                        Información del movimiento
                    </h2>

                    <p class="section-description">
                        Completa los datos correspondientes al movimiento.
                    </p>


                    <div class="form-grid">

                        {{-- PRODUCTO --}}
                        <div class="form-group full">

                            <label
                                for="producto_id"
                                class="form-label"
                            >
                                Producto <span>*</span>
                            </label>

                            <select
                                name="producto_id"
                                id="producto_id"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Selecciona un producto
                                </option>

                                @foreach($productos as $producto)

                                    <option
                                        value="{{ $producto->id }}"
                                        {{ old('producto_id') == $producto->id ? 'selected' : '' }}
                                    >
                                        {{ $producto->codigo }}
                                        —
                                        {{ $producto->nombre }}
                                        | Stock actual:
                                        {{ $producto->stock }}
                                    </option>

                                @endforeach

                            </select>

                            @error('producto_id')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- CANTIDAD --}}
                        <div class="form-group">

                            <label
                                for="cantidad"
                                class="form-label"
                            >
                                Cantidad <span>*</span>
                            </label>

                            <input
                                type="number"
                                name="cantidad"
                                id="cantidad"
                                class="form-input"
                                value="{{ old('cantidad') }}"
                                min="1"
                                required
                                placeholder="Ej. 10"
                            >

                            <div class="form-help">
                                Indica la cantidad de unidades.
                            </div>

                            @error('cantidad')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- FECHA --}}
                        <div class="form-group">

                            <label
                                for="fecha"
                                class="form-label"
                            >
                                Fecha y hora <span>*</span>
                            </label>

                            <input
                                type="datetime-local"
                                name="fecha"
                                id="fecha"
                                class="form-input"
                                value="{{ old('fecha', now()->format('Y-m-d\TH:i')) }}"
                                required
                            >

                            <div class="form-help">
                                Fecha en la que se registra el movimiento.
                            </div>

                            @error('fecha')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- MOTIVO --}}
                        <div class="form-group">

                            <label
                                for="motivo"
                                class="form-label"
                            >
                                Motivo
                            </label>

                            <input
                                type="text"
                                name="motivo"
                                id="motivo"
                                class="form-input"
                                value="{{ old('motivo') }}"
                                maxlength="255"
                                placeholder="Ej. Ajuste de inventario"
                            >

                            <div class="form-help">
                                Describe brevemente el motivo.
                            </div>

                            @error('motivo')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- REFERENCIA --}}
                        <div class="form-group">

                            <label
                                for="referencia"
                                class="form-label"
                            >
                                Referencia
                            </label>

                            <input
                                type="text"
                                name="referencia"
                                id="referencia"
                                class="form-input"
                                value="{{ old('referencia') }}"
                                maxlength="100"
                                placeholder="Ej. COM-000001"
                            >

                            <div class="form-help">
                                Compra, venta u otra referencia relacionada.
                            </div>

                            @error('referencia')

                                <div class="error-message">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>

                </div>


                {{-- AVISO --}}
                <div class="form-section">

                    <div class="notice">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <circle cx="12" cy="12" r="9"/>
                            <path d="M12 11v5"/>
                            <path d="M12 8h.01"/>

                        </svg>

                        <div>

                            <strong>
                                Importante
                            </strong>

                            <p>
                                Al registrar este movimiento, el stock del producto
                                se actualizará automáticamente. Los movimientos
                                registrados forman parte del historial del inventario
                                y no pueden modificarse ni eliminarse.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- BOTONES --}}
                <div class="form-actions">

                    <a
                        href="{{ route('inventario.index') }}"
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

                        Registrar movimiento

                    </button>

                </div>

            </div>

        </form>

    </div>

</x-app-layout>