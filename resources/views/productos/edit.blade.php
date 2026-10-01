<x-app-layout>

    <style>
        .producto-form-page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 32px 24px 50px;
        }

        .producto-header {
            background: linear-gradient(135deg, #0f172a, #1e293b);
            border-radius: 18px;
            padding: 30px;
            color: white;
            margin-bottom: 24px;
        }

        .producto-header small {
            display: block;
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 7px;
        }

        .producto-header h1 {
            margin: 0;
            font-size: 30px;
            font-weight: 800;
        }

        .producto-header p {
            margin: 8px 0 0;
            color: #cbd5e1;
            font-size: 15px;
        }

        .form-card {
            background: white;
            border-radius: 18px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .08);
        }

        .section-title {
            margin: 0 0 20px;
            color: #0f172a;
            font-size: 19px;
            font-weight: 800;
        }

        .section-description {
            margin: -12px 0 24px;
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
            font-size: 14px;
            font-weight: 700;
        }

        .required {
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
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, .10);
        }

        .form-textarea {
            min-height: 105px;
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
        }

        .status-box {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            padding: 15px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: #f8fafc;
        }

        .status-info strong {
            display: block;
            color: #0f172a;
            font-size: 14px;
        }

        .status-info span {
            display: block;
            margin-top: 3px;
            color: #64748b;
            font-size: 12px;
        }

        .switch {
            position: relative;
            width: 48px;
            height: 26px;
            flex-shrink: 0;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            inset: 0;
            cursor: pointer;
            background: #cbd5e1;
            border-radius: 999px;
            transition: .2s ease;
        }

        .slider::before {
            content: "";
            position: absolute;
            width: 20px;
            height: 20px;
            left: 3px;
            top: 3px;
            background: white;
            border-radius: 50%;
            transition: .2s ease;
            box-shadow: 0 1px 3px rgba(0,0,0,.2);
        }

        .switch input:checked + .slider {
            background: #4f46e5;
        }

        .switch input:checked + .slider::before {
            transform: translateX(22px);
        }

        .stock-info {
            padding: 13px 15px;
            margin-bottom: 20px;
            border-radius: 10px;
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            color: #1e40af;
            font-size: 13px;
        }

        .stock-info strong {
            font-weight: 800;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 30px;
            padding-top: 24px;
            border-top: 1px solid #e2e8f0;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            min-height: 46px;
            padding: 0 20px;
            border-radius: 10px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            font-weight: 800;
            transition: .2s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #e2e8f0;
            color: #334155;
        }

        .btn-secondary:hover {
            background: #cbd5e1;
        }

        .btn-primary {
            background: #4f46e5;
            color: white;
        }

        .btn-primary:hover {
            background: #4338ca;
        }

        .btn svg {
            width: 18px;
            height: 18px;
        }

        @media (max-width: 700px) {
            .producto-form-page {
                padding: 20px 14px 35px;
            }

            .producto-header {
                padding: 23px;
            }

            .producto-header h1 {
                font-size: 25px;
            }

            .form-card {
                padding: 21px;
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

            .btn {
                width: 100%;
            }
        }
    </style>


    <div class="producto-form-page">

        {{-- ENCABEZADO --}}
        <div class="producto-header">

            <small>Supermercado Prisma</small>

            <h1>Editar producto</h1>

            <p>
                Actualiza la información y configuración del producto.
            </p>

        </div>


        {{-- FORMULARIO --}}
        <div class="form-card">

            <form action="{{ route('productos.update', $producto->id) }}"
                  method="POST">

                @csrf
                @method('PUT')


                {{-- INFORMACIÓN GENERAL --}}
                <h2 class="section-title">
                    Información general
                </h2>

                <p class="section-description">
                    Modifica los datos principales del producto.
                </p>


                <div class="form-grid">

                    {{-- CÓDIGO --}}
                    <div class="form-group">

                        <label class="form-label">
                            Código <span class="required">*</span>
                        </label>

                        <input type="text"
                               name="codigo"
                               value="{{ old('codigo', $producto->codigo) }}"
                               class="form-input"
                               maxlength="30"
                               required>

                        @error('codigo')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- NOMBRE --}}
                    <div class="form-group">

                        <label class="form-label">
                            Nombre <span class="required">*</span>
                        </label>

                        <input type="text"
                               name="nombre"
                               value="{{ old('nombre', $producto->nombre) }}"
                               class="form-input"
                               maxlength="150"
                               required>

                        @error('nombre')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- CATEGORÍA --}}
                    <div class="form-group">

                        <label class="form-label">
                            Categoría <span class="required">*</span>
                        </label>

                        <select name="categoria_id"
                                class="form-select"
                                required>

                            <option value="">
                                Selecciona una categoría
                            </option>

                            @foreach($categorias as $categoria)

                                <option value="{{ $categoria->id }}"
                                    {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>

                                    {{ $categoria->nombre }}

                                </option>

                            @endforeach

                        </select>

                        @error('categoria_id')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- PROVEEDOR --}}
                    <div class="form-group">

                        <label class="form-label">
                            Proveedor <span class="required">*</span>
                        </label>

                        <select name="proveedor_id"
                                class="form-select"
                                required>

                            <option value="">
                                Selecciona un proveedor
                            </option>

                            @foreach($proveedores as $proveedor)

                                <option value="{{ $proveedor->id }}"
                                    {{ old('proveedor_id', $producto->proveedor_id) == $proveedor->id ? 'selected' : '' }}>

                                    {{ $proveedor->nombre }}

                                </option>

                            @endforeach

                        </select>

                        @error('proveedor_id')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- DESCRIPCIÓN --}}
                    <div class="form-group full">

                        <label class="form-label">
                            Descripción
                        </label>

                        <textarea name="descripcion"
                                  class="form-textarea"
                                  placeholder="Descripción opcional del producto">{{ old('descripcion', $producto->descripcion) }}</textarea>

                        @error('descripcion')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                {{-- PRECIOS --}}
                <h2 class="section-title"
                    style="margin-top: 32px;">

                    Precios e impuestos

                </h2>

                <p class="section-description">
                    Actualiza el costo, precio de venta e impuesto aplicable.
                </p>


                <div class="form-grid">

                    {{-- PRECIO COMPRA --}}
                    <div class="form-group">

                        <label class="form-label">
                            Precio de compra <span class="required">*</span>
                        </label>

                        <input type="number"
                               name="precio_compra"
                               value="{{ old('precio_compra', $producto->precio_compra) }}"
                               class="form-input"
                               min="0"
                               step="0.01"
                               required>

                        @error('precio_compra')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- PRECIO VENTA --}}
                    <div class="form-group">

                        <label class="form-label">
                            Precio de venta <span class="required">*</span>
                        </label>

                        <input type="number"
                               name="precio_venta"
                               value="{{ old('precio_venta', $producto->precio_venta) }}"
                               class="form-input"
                               min="0"
                               step="0.01"
                               required>

                        @error('precio_venta')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- IMPUESTO --}}
                    <div class="form-group">

                        <label class="form-label">
                            Impuesto (%)
                            <span class="required">*</span>
                        </label>

                        <input type="number"
                               name="impuesto_porcentaje"
                               value="{{ old('impuesto_porcentaje', $producto->impuesto_porcentaje) }}"
                               class="form-input"
                               min="0"
                               max="100"
                               step="0.01"
                               required>

                        <span class="form-help">
                            Ejemplo: 15 para aplicar un 15%.
                        </span>

                        @error('impuesto_porcentaje')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- VENCIMIENTO --}}
                    <div class="form-group">

                        <label class="form-label">
                            Fecha de vencimiento
                        </label>

                        <input type="date"
                               name="fecha_vencimiento"
                               value="{{ old('fecha_vencimiento', optional($producto->fecha_vencimiento)->format('Y-m-d')) }}"
                               class="form-input">

                        @error('fecha_vencimiento')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                {{-- INVENTARIO --}}
                <h2 class="section-title"
                    style="margin-top: 32px;">

                    Inventario

                </h2>

                <p class="section-description">
                    Consulta la existencia actual y configura el stock mínimo.
                </p>


                <div class="stock-info">

                    <strong>Stock actual:</strong>
                    {{ $producto->stock }} unidades.

                    El stock puede cambiar automáticamente mediante compras,
                    ventas y movimientos de inventario.

                </div>


                <div class="form-grid">

                    {{-- STOCK ACTUAL --}}
                    <div class="form-group">

                        <label class="form-label">
                            Stock actual
                        </label>

                        <input type="number"
                               value="{{ $producto->stock }}"
                               class="form-input"
                               readonly>

                        <span class="form-help">
                            El stock actual se mantiene para conservar el historial de inventario.
                        </span>

                    </div>


                    {{-- STOCK MÍNIMO --}}
                    <div class="form-group">

                        <label class="form-label">
                            Stock mínimo <span class="required">*</span>
                        </label>

                        <input type="number"
                               name="stock_minimo"
                               value="{{ old('stock_minimo', $producto->stock_minimo) }}"
                               class="form-input"
                               min="0"
                               step="1"
                               required>

                        <span class="form-help">
                            Se utilizará para detectar productos con stock bajo.
                        </span>

                        @error('stock_minimo')
                            <div class="error-message">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>


                {{-- ESTADO --}}
                <h2 class="section-title"
                    style="margin-top: 32px;">

                    Estado

                </h2>

                <div class="status-box">

                    <div class="status-info">

                        <strong>
                            Producto activo
                        </strong>

                        <span>
                            Los productos activos estarán disponibles para compras y ventas.
                        </span>

                    </div>

                    <label class="switch">

                        <input type="checkbox"
                               name="estado"
                               value="1"
                               {{ old('estado', $producto->estado) ? 'checked' : '' }}>

                        <span class="slider"></span>

                    </label>

                </div>


                {{-- BOTONES --}}
                <div class="form-actions">

                    <a href="{{ route('productos.index') }}"
                       class="btn btn-secondary">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M19 12H5"/>
                            <path d="m12 19-7-7 7-7"/>

                        </svg>

                        Cancelar

                    </a>


                    <button type="submit"
                            class="btn btn-primary">

                        <svg viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M20 6 9 17l-5-5"/>

                        </svg>

                        Actualizar producto

                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>