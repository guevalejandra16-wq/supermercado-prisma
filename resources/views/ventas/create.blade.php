<x-app-layout>

    <div class="ventas-create-page">

        {{-- ============================================
             ENCABEZADO
        ============================================= --}}

        <div class="page-header">

            <div class="header-left">

                <a href="{{ route('ventas.index') }}"
                   class="back-button">

                    <svg width="18" height="18"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M19 12H5"/>
                        <path d="M12 19l-7-7 7-7"/>

                    </svg>

                    Volver a ventas

                </a>


                <span class="header-brand">
                    SUPERMERCADO PRISMA
                </span>


                <h1>
                    Registrar venta
                </h1>


                <p>
                    Registra una nueva venta y actualiza
                    automáticamente el inventario.
                </p>

            </div>


            <div class="header-icon">

                <svg width="30" height="30"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="1.8">

                    <path d="M6 2h12l2 5H4l2-5Z"/>
                    <path d="M4 7h16v15H4z"/>

                </svg>

            </div>

        </div>


        {{-- ============================================
             ERRORES
        ============================================= --}}

        @if ($errors->any())

            <div class="errors-card">

                <div class="errors-title">

                    <svg width="20" height="20"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 8v4"/>
                        <path d="M12 16h.01"/>

                    </svg>

                    Revisa los siguientes campos

                </div>


                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- ============================================
             FORMULARIO
        ============================================= --}}

        <form action="{{ route('ventas.store') }}"
              method="POST"
              id="ventaForm">

            @csrf


            {{-- ========================================
                 INFORMACIÓN GENERAL
            ========================================= --}}

            <div class="form-card">

                <div class="card-header">

                    <div>

                        <span class="section-label">
                            Información general
                        </span>

                        <h2>
                            Datos de la venta
                        </h2>

                    </div>

                </div>


                <div class="form-body">

                    <div class="form-grid">


                        {{-- CLIENTE --}}

                        <div class="field">

                            <label for="cliente_id">
                                Cliente
                            </label>


                            <div class="input-wrapper">

                                <svg width="18" height="18"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2">

                                    <circle cx="12" cy="8" r="4"/>
                                    <path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"/>

                                </svg>


                                <select id="cliente_id"
                                        name="cliente_id">

                                    <option value="">
                                        Consumidor final
                                    </option>


                                    @foreach($clientes as $cliente)

                                        <option
                                            value="{{ $cliente->id }}"
                                            {{ old('cliente_id') == $cliente->id
                                                ? 'selected'
                                                : ''
                                            }}>

                                            {{ $cliente->nombre }}
                                            {{ $cliente->apellido }}

                                            @if($cliente->dni)
                                                — {{ $cliente->dni }}
                                            @endif

                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            <small>
                                Puedes dejarlo vacío para consumidor final.
                            </small>

                        </div>


                        {{-- FECHA --}}

                        <div class="field">

                            <label for="fecha">
                                Fecha y hora
                                <span class="required">*</span>
                            </label>


                            <div class="input-wrapper">

                                <svg width="18" height="18"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2">

                                    <rect x="3" y="4"
                                          width="18"
                                          height="18"
                                          rx="2"/>

                                    <path d="M16 2v4"/>
                                    <path d="M8 2v4"/>
                                    <path d="M3 10h18"/>

                                </svg>


                                <input
                                    type="datetime-local"
                                    id="fecha"
                                    name="fecha"
                                    value="{{ old(
                                        'fecha',
                                        now()->format('Y-m-d\TH:i')
                                    ) }}"
                                    required
                                >

                            </div>

                            @error('fecha')

                                <span class="field-error">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        {{-- DESCUENTO --}}

                        <div class="field">

                            <label for="descuento">
                                Descuento
                            </label>


                            <div class="input-wrapper money-input">

                                <span class="money-symbol">
                                    L
                                </span>


                                <input
                                    type="number"
                                    id="descuento"
                                    name="descuento"
                                    value="{{ old('descuento', 0) }}"
                                    min="0"
                                    step="0.01"
                                    placeholder="0.00"
                                >

                            </div>


                            <small>
                                Descuento general aplicado a la venta.
                            </small>

                        </div>


                        {{-- IMPUESTO PORCENTUAL --}}

                        <div class="field">

                            <label for="impuesto_porcentaje">
                                Impuesto
                            </label>


                            <div class="input-wrapper money-input">

                                <span class="money-symbol">
                                    %
                                </span>


                                <input
                                    type="number"
                                    id="impuesto_porcentaje"
                                    name="impuesto_porcentaje"
                                    value="{{ old(
                                        'impuesto_porcentaje',
                                        15
                                    ) }}"
                                    min="0"
                                    max="100"
                                    step="0.01"
                                    placeholder="15.00"
                                >

                            </div>


                            <small>
                                Porcentaje de impuesto aplicado a la venta.
                            </small>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ============================================
                 PRODUCTOS
            ============================================= --}}

            <div class="form-card">

                <div class="card-header products-header">

                    <div>

                        <span class="section-label">
                            Productos
                        </span>

                        <h2>
                            Productos de la venta
                        </h2>

                        <p>
                            Agrega los productos que serán vendidos.
                        </p>

                    </div>


                    <button type="button"
                            class="add-product-button"
                            onclick="agregarProducto()">

                        <svg width="18" height="18"
                             viewBox="0 0 24 24"
                             fill="none"
                             stroke="currentColor"
                             stroke-width="2">

                            <path d="M12 5v14"/>
                            <path d="M5 12h14"/>

                        </svg>

                        Agregar producto

                    </button>

                </div>


                <div class="products-body">

                    <div id="productosContainer">


                        {{-- PRIMERA FILA --}}

                        <div class="product-row">

                            <div class="product-number">
                                1
                            </div>


                            {{-- PRODUCTO --}}

                            <div class="product-field product-select-field">

                                <label>
                                    Producto
                                </label>


                                <select
                                    name="detalles[0][producto_id]"
                                    class="producto-select"
                                    onchange="actualizarFila(this)"
                                    required>

                                    <option value="">
                                        Selecciona un producto
                                    </option>


                                    @foreach($productos as $producto)

                                        <option
                                            value="{{ $producto->id }}"
                                            data-precio="{{ $producto->precio_venta }}"
                                            data-stock="{{ $producto->stock }}">

                                            {{ $producto->codigo }}
                                            —
                                            {{ $producto->nombre }}
                                            | Stock: {{ $producto->stock }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>


                            {{-- CANTIDAD --}}

                            <div class="product-field quantity-field">

                                <label>
                                    Cantidad
                                </label>


                                <input
                                    type="number"
                                    name="detalles[0][cantidad]"
                                    class="cantidad-input"
                                    value="1"
                                    min="1"
                                    step="1"
                                    onchange="calcularFila(this)"
                                    oninput="calcularFila(this)"
                                    required
                                >

                            </div>


                            {{-- PRECIO --}}

                            <div class="product-field price-field">

                                <label>
                                    Precio
                                </label>


                                <div class="price-wrapper">

                                    <span>
                                        L
                                    </span>


                                    <input
                                        type="number"
                                        name="detalles[0][precio]"
                                        class="precio-input"
                                        value="0"
                                        min="0"
                                        step="0.01"
                                        onchange="calcularFila(this)"
                                        oninput="calcularFila(this)"
                                        required
                                    >

                                </div>

                            </div>


                            {{-- SUBTOTAL --}}

                            <div class="product-field subtotal-field">

                                <label>
                                    Subtotal
                                </label>


                                <div class="row-subtotal">
                                    L 0.00
                                </div>

                            </div>


                            {{-- ELIMINAR --}}

                            <button
                                type="button"
                                class="remove-product"
                                onclick="eliminarProducto(this)"
                                title="Eliminar producto">

                                <svg width="17" height="17"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2">

                                    <path d="M3 6h18"/>
                                    <path d="M8 6V4h8v2"/>
                                    <path d="M19 6l-1 14H6L5 6"/>
                                    <path d="M10 11v5"/>
                                    <path d="M14 11v5"/>

                                </svg>

                            </button>

                        </div>

                    </div>

                </div>


                {{-- RESUMEN PRODUCTOS --}}

                <div class="products-summary">

                    <div>

                        <span>
                            Productos
                        </span>

                        <strong id="cantidadProductos">
                            0
                        </strong>

                    </div>


                    <div>

                        <span>
                            Unidades
                        </span>

                        <strong id="cantidadUnidades">
                            0
                        </strong>

                    </div>

                </div>

            </div>


            {{-- ============================================
                 PAGO Y TOTALES
            ============================================= --}}

            <div class="payment-grid">


                {{-- MÉTODO DE PAGO --}}

                <div class="form-card payment-card">

                    <div class="card-header">

                        <div>

                            <span class="section-label">
                                Pago
                            </span>

                            <h2>
                                Método de pago
                            </h2>

                        </div>

                    </div>


                    <div class="form-body">


                        <div class="field">

                            <label>
                                Método de pago
                                <span class="required">*</span>
                            </label>


                            <div class="payment-options">


                                {{-- EFECTIVO --}}

                                <label class="payment-option">

                                    <input
                                        type="radio"
                                        name="metodo_pago"
                                        value="EFECTIVO"
                                        {{ old(
                                            'metodo_pago',
                                            'EFECTIVO'
                                        ) === 'EFECTIVO'
                                            ? 'checked'
                                            : ''
                                        }}
                                        onchange="cambiarMetodoPago()"
                                    >


                                    <span class="payment-option-content">

                                        <span class="payment-option-icon">

                                            <svg width="19" height="19"
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2">

                                                <rect x="3" y="5"
                                                      width="18"
                                                      height="14"
                                                      rx="2"/>

                                                <path d="M7 10h10"/>
                                                <path d="M7 14h5"/>

                                            </svg>

                                        </span>

                                        <span>
                                            Efectivo
                                        </span>

                                    </span>

                                </label>


                                {{-- TARJETA --}}

                                <label class="payment-option">

                                    <input
                                        type="radio"
                                        name="metodo_pago"
                                        value="TARJETA"
                                        {{ old('metodo_pago') === 'TARJETA'
                                            ? 'checked'
                                            : ''
                                        }}
                                        onchange="cambiarMetodoPago()"
                                    >


                                    <span class="payment-option-content">

                                        <span class="payment-option-icon">

                                            <svg width="19" height="19"
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2">

                                                <rect x="3" y="5"
                                                      width="18"
                                                      height="14"
                                                      rx="2"/>

                                                <path d="M3 10h18"/>

                                            </svg>

                                        </span>

                                        <span>
                                            Tarjeta
                                        </span>

                                    </span>

                                </label>


                                {{-- TRANSFERENCIA --}}

                                <label class="payment-option">

                                    <input
                                        type="radio"
                                        name="metodo_pago"
                                        value="TRANSFERENCIA"
                                        {{ old('metodo_pago') === 'TRANSFERENCIA'
                                            ? 'checked'
                                            : ''
                                        }}
                                        onchange="cambiarMetodoPago()"
                                    >


                                    <span class="payment-option-content">

                                        <span class="payment-option-icon">

                                            <svg width="19" height="19"
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                 stroke-width="2">

                                                <path d="M4 12h16"/>
                                                <path d="m13 5 7 7-7 7"/>
                                                <path d="M20 12H4"/>

                                            </svg>

                                        </span>

                                        <span>
                                            Transferencia
                                        </span>

                                    </span>

                                </label>

                            </div>

                        </div>


                        {{-- EFECTIVO RECIBIDO --}}

                        <div id="efectivoFields">

                            <div class="cash-grid">

                                <div class="field">

                                    <label for="efectivo_recibido">
                                        Efectivo recibido
                                    </label>


                                    <div class="input-wrapper money-input">

                                        <span class="money-symbol">
                                            L
                                        </span>


                                        <input
                                            type="number"
                                            id="efectivo_recibido"
                                            name="efectivo_recibido"
                                            value="{{ old(
                                                'efectivo_recibido',
                                                0
                                            ) }}"
                                            min="0"
                                            step="0.01"
                                            oninput="calcularCambio()"
                                        >

                                    </div>

                                </div>


                                <div class="change-box">

                                    <span>
                                        Cambio
                                    </span>

                                    <strong id="cambioDisplay">
                                        L 0.00
                                    </strong>

                                </div>

                            </div>

                        </div>


                        <div class="payment-info">

                            <svg width="18" height="18"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <circle cx="12" cy="12" r="9"/>
                                <path d="M12 8v4"/>
                                <path d="M12 16h.01"/>

                            </svg>

                            <span>
                                El cambio se calcula automáticamente
                                cuando el método de pago es efectivo.
                            </span>

                        </div>

                    </div>

                </div>


                {{-- TOTALES --}}

                <div class="totals-card">

                    <div class="totals-header">

                        <span class="section-label">
                            Resumen
                        </span>

                        <h2>
                            Total de la venta
                        </h2>

                    </div>


                    <div class="totals-body">

                        <div class="total-row">

                            <span>
                                Subtotal
                            </span>

                            <strong id="subtotalDisplay">
                                L 0.00
                            </strong>

                        </div>


                        <div class="total-row">

                            <span>
                                Descuento
                            </span>

                            <strong id="descuentoDisplay">
                                L 0.00
                            </strong>

                        </div>


                        <div class="total-row">

                            <span>
                                Impuesto (15%)
                            </span>

                            <strong id="impuestoDisplay">
                                L 0.00
                            </strong>

                        </div>


                        <div class="total-divider"></div>


                        <div class="grand-total">

                            <span>
                                Total
                            </span>

                            <strong id="totalDisplay">
                                L 0.00
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ============================================
                 BOTONES
            ============================================= --}}

            <div class="form-actions">

                <a href="{{ route('ventas.index') }}"
                   class="btn-secondary">

                    Cancelar

                </a>


                <button type="submit"
                        class="btn-primary-submit">

                    <svg width="18" height="18"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/>
                        <path d="M17 21v-8H7v8"/>
                        <path d="M7 3v5h8"/>

                    </svg>

                    Registrar venta

                </button>

            </div>

        </form>

    </div>


    <style>

        /* ============================================
           CONTENEDOR
        ============================================ */

        .ventas-create-page {

            max-width: 1400px;

            margin: 0 auto;

            padding: 45px 32px 32px;

            color: #172033;

        }


        /* ============================================
           HEADER
        ============================================ */

        .page-header {

            background:
                linear-gradient(
                    135deg,
                    #111827,
                    #1e293b
                );

            border-radius: 18px;

            padding: 30px 32px;

            color: white;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 25px;

            margin-bottom: 20px;

            box-shadow:
                0 12px 30px
                rgba(15,23,42,.12);

        }


        .header-left {

            min-width: 0;

        }


        .back-button {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            background:
                rgba(255,255,255,.10);

            border:
                1px solid
                rgba(255,255,255,.18);

            color: white;

            text-decoration: none;

            font-size: 13px;

            font-weight: 700;

            padding: 9px 13px;

            border-radius: 9px;

            margin-bottom: 20px;

            transition: .2s;

        }


        .back-button:hover {

            background:
                rgba(255,255,255,.18);

            transform:
                translateX(-2px);

        }


        .header-brand {

            display: block;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 2px;

            color: #94a3b8;

            margin-bottom: 6px;

        }


        .page-header h1 {

            margin: 0;

            font-size: 30px;

            font-weight: 800;

        }


        .page-header p {

            margin: 8px 0 0;

            color: #cbd5e1;

            font-size: 14px;

        }


        .header-icon {

            width: 65px;

            height: 65px;

            border-radius: 17px;

            background:
                rgba(255,255,255,.08);

            border:
                1px solid
                rgba(255,255,255,.12);

            display: flex;

            align-items: center;

            justify-content: center;

            color: #cbd5e1;

            flex-shrink: 0;

        }


        /* ============================================
           ERRORES
        ============================================ */

        .errors-card {

            background: #fef2f2;

            border:
                1px solid #fecaca;

            border-radius: 14px;

            padding: 18px 20px;

            margin-bottom: 20px;

            color: #991b1b;

        }


        .errors-title {

            display: flex;

            align-items: center;

            gap: 8px;

            font-weight: 800;

            font-size: 14px;

            margin-bottom: 8px;

        }


        .errors-card ul {

            margin: 0;

            padding-left: 28px;

            font-size: 13px;

        }


        .errors-card li {

            margin: 4px 0;

        }


        .field-error {

            display: block;

            color: #dc2626;

            font-size: 11px;

            margin-top: 6px;

        }


        /* ============================================
           TARJETAS
        ============================================ */

        .form-card {

            background: white;

            border:
                1px solid #e5e7eb;

            border-radius: 17px;

            overflow: hidden;

            box-shadow:
                0 5px 18px
                rgba(15,23,42,.05);

            margin-bottom: 20px;

        }


        .card-header {

            padding: 24px;

            border-bottom:
                1px solid #e5e7eb;

            display: flex;

            align-items: center;

            justify-content: space-between;

            gap: 20px;

        }


        .section-label {

            display: block;

            color: #64748b;

            text-transform: uppercase;

            letter-spacing: .8px;

            font-size: 11px;

            font-weight: 800;

            margin-bottom: 5px;

        }


        .card-header h2 {

            margin: 0;

            font-size: 19px;

            color: #172033;

        }


        .card-header p {

            margin: 7px 0 0;

            color: #64748b;

            font-size: 13px;

        }


        .form-body {

            padding: 25px;

        }


        /* ============================================
           CAMPOS
        ============================================ */

        .form-grid {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 22px;

        }


        .field {

            min-width: 0;

        }


        .field label {

            display: block;

            color: #334155;

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 8px;

        }


        .required {

            color: #dc2626;

        }


        .field small {

            display: block;

            color: #94a3b8;

            font-size: 11px;

            margin-top: 6px;

        }


        .input-wrapper {

            position: relative;

        }


        .input-wrapper > svg {

            position: absolute;

            left: 13px;

            top: 50%;

            transform:
                translateY(-50%);

            color: #64748b;

            pointer-events: none;

        }


        .input-wrapper input,
        .input-wrapper select {

            width: 100%;

            height: 46px;

            box-sizing: border-box;

            border:
                1px solid #dbe2ea;

            border-radius: 10px;

            background: white;

            color: #172033;

            padding:
                0 14px 0 42px;

            font-size: 14px;

            outline: none;

            transition: .2s;

        }


        .input-wrapper input:focus,
        .input-wrapper select:focus {

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37,99,235,.10);

        }


        .money-input input {

            padding-left: 38px;

        }


        .money-symbol {

            position: absolute;

            left: 14px;

            top: 50%;

            transform:
                translateY(-50%);

            color: #64748b;

            font-size: 13px;

            font-weight: 800;

            z-index: 2;

        }


        /* ============================================
           PRODUCTOS
        ============================================ */

        .products-header {

            align-items: flex-end;

        }


        .add-product-button {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            background: #2563eb;

            color: white;

            border: none;

            border-radius: 10px;

            padding: 11px 15px;

            font-size: 13px;

            font-weight: 700;

            cursor: pointer;

            white-space: nowrap;

            transition: .2s;

        }


        .add-product-button:hover {

            background: #1d4ed8;

            transform:
                translateY(-1px);

        }


        .products-body {

            padding: 20px 24px;

        }


        .product-row {

            display: grid;

            grid-template-columns:
                38px
                minmax(260px, 1fr)
                130px
                155px
                155px
                40px;

            gap: 13px;

            align-items: end;

            padding: 18px;

            background: #f8fafc;

            border:
                1px solid #e5e7eb;

            border-radius: 13px;

            margin-bottom: 12px;

        }


        .product-number {

            width: 32px;

            height: 32px;

            border-radius: 9px;

            background: #e0e7ff;

            color: #1e3a8a;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 12px;

            font-weight: 800;

            margin-bottom: 2px;

        }


        .product-field label {

            display: block;

            color: #64748b;

            font-size: 11px;

            font-weight: 800;

            margin-bottom: 7px;

            text-transform: uppercase;

            letter-spacing: .4px;

        }


        .product-field select,
        .product-field input {

            width: 100%;

            height: 43px;

            box-sizing: border-box;

            border:
                1px solid #dbe2ea;

            border-radius: 9px;

            background: white;

            color: #172033;

            padding: 0 11px;

            font-size: 13px;

            outline: none;

        }


        .product-field select:focus,
        .product-field input:focus {

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37,99,235,.08);

        }


        .price-wrapper {

            position: relative;

        }


        .price-wrapper span {

            position: absolute;

            left: 11px;

            top: 50%;

            transform:
                translateY(-50%);

            color: #64748b;

            font-weight: 800;

            font-size: 12px;

            pointer-events: none;

        }


        .price-wrapper input {

            padding-left: 28px;

        }


        .row-subtotal {

            height: 43px;

            box-sizing: border-box;

            display: flex;

            align-items: center;

            padding: 0 12px;

            border-radius: 9px;

            background: white;

            border:
                1px solid #e5e7eb;

            color: #172033;

            font-size: 13px;

            font-weight: 800;

        }


        .remove-product {

            width: 38px;

            height: 38px;

            border: none;

            border-radius: 9px;

            background: #fee2e2;

            color: #b91c1c;

            display: flex;

            align-items: center;

            justify-content: center;

            cursor: pointer;

            transition: .2s;

        }


        .remove-product:hover {

            background: #fecaca;

        }


        .products-summary {

            border-top:
                1px solid #e5e7eb;

            padding: 17px 24px;

            display: flex;

            justify-content: flex-end;

            gap: 35px;

            background: #fafbfc;

        }


        .products-summary div {

            display: flex;

            align-items: center;

            gap: 8px;

        }


        .products-summary span {

            color: #64748b;

            font-size: 12px;

        }


        .products-summary strong {

            color: #172033;

            font-size: 14px;

        }


        /* ============================================
           PAGO
        ============================================ */

        .payment-grid {

            display: grid;

            grid-template-columns:
                1.2fr .8fr;

            gap: 20px;

            align-items: stretch;

        }


        .payment-card {

            margin-bottom: 0;

        }


        .payment-options {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 10px;

        }


        .payment-option {

            cursor: pointer;

        }


        .payment-option input {

            display: none;

        }


        .payment-option-content {

            min-height: 55px;

            border:
                1px solid #dbe2ea;

            border-radius: 10px;

            display: flex;

            align-items: center;

            gap: 9px;

            padding: 0 12px;

            color: #475569;

            font-size: 12px;

            font-weight: 700;

            transition: .2s;

        }


        .payment-option input:checked
        + .payment-option-content {

            border-color: #2563eb;

            background: #eff6ff;

            color: #1d4ed8;

            box-shadow:
                0 0 0 2px
                rgba(37,99,235,.08);

        }


        .payment-option-icon {

            width: 32px;

            height: 32px;

            border-radius: 8px;

            background: #f1f5f9;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

        }


        .payment-option input:checked
        + .payment-option-content
        .payment-option-icon {

            background: #dbeafe;

        }


        .cash-grid {

            display: grid;

            grid-template-columns:
                1fr 1fr;

            gap: 15px;

            margin-top: 22px;

        }


        .change-box {

            min-height: 46px;

            border-radius: 10px;

            background: #f8fafc;

            border:
                1px solid #e5e7eb;

            padding: 9px 14px;

            box-sizing: border-box;

        }


        .change-box span {

            display: block;

            color: #64748b;

            font-size: 11px;

            margin-bottom: 3px;

        }


        .change-box strong {

            display: block;

            color: #166534;

            font-size: 17px;

        }


        .payment-info {

            margin-top: 18px;

            display: flex;

            align-items: flex-start;

            gap: 8px;

            color: #64748b;

            font-size: 11px;

            line-height: 1.5;

        }


        /* ============================================
           TOTALES
        ============================================ */

        .totals-card {

            background: white;

            border:
                1px solid #e5e7eb;

            border-radius: 17px;

            overflow: hidden;

            box-shadow:
                0 5px 18px
                rgba(15,23,42,.05);

        }


        .totals-header {

            padding: 24px;

            border-bottom:
                1px solid #e5e7eb;

        }


        .totals-header h2 {

            margin: 0;

            color: #172033;

            font-size: 19px;

        }


        .totals-body {

            padding: 24px;

        }


        .total-row {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 16px;

            gap: 20px;

            font-size: 14px;

        }


        .total-row span {

            color: #64748b;

        }


        .total-row strong {

            color: #172033;

        }


        .total-divider {

            height: 1px;

            background: #e5e7eb;

            margin: 20px 0;

        }


        .grand-total {

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

        }


        .grand-total span {

            color: #172033;

            font-size: 17px;

            font-weight: 800;

        }


        .grand-total strong {

            color: #1e3a8a;

            font-size: 27px;

            font-weight: 900;

        }


        /* ============================================
           BOTONES
        ============================================ */

        .form-actions {

            display: flex;

            justify-content: flex-end;

            gap: 12px;

            margin-top: 20px;

        }


        .btn-secondary,
        .btn-primary-submit {

            min-height: 46px;

            padding: 0 18px;

            border-radius: 10px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            font-size: 14px;

            font-weight: 700;

            text-decoration: none;

            cursor: pointer;

            transition: .2s;

        }


        .btn-secondary {

            background: white;

            border:
                1px solid #dbe2ea;

            color: #475569;

        }


        .btn-secondary:hover {

            background: #f8fafc;

        }


        .btn-primary-submit {

            border: none;

            background: #2563eb;

            color: white;

            box-shadow:
                0 6px 14px
                rgba(37,99,235,.20);

        }


        .btn-primary-submit:hover {

            background: #1d4ed8;

            transform:
                translateY(-1px);

        }


        /* ============================================
           RESPONSIVE
        ============================================ */

        @media (max-width: 1100px) {

            .product-row {

                grid-template-columns:
                    35px
                    1fr
                    120px
                    140px
                    140px
                    38px;

            }


            .payment-grid {

                grid-template-columns: 1fr;

            }

        }


        @media (max-width: 850px) {

            .ventas-create-page {

                padding:
                    30px 18px 20px;

            }


            .page-header {

                padding: 24px;

                align-items: flex-start;

            }


            .page-header h1 {

                font-size: 25px;

            }


            .form-grid {

                grid-template-columns: 1fr;

            }


            .product-row {

                grid-template-columns:
                    1fr 1fr;

            }


            .product-number {

                display: none;

            }


            .product-select-field {

                grid-column:
                    1 / -1;

            }


            .subtotal-field {

                grid-column:
                    1 / 2;

            }


            .remove-product {

                grid-column: 2;

                justify-self: end;

            }


            .payment-options {

                grid-template-columns: 1fr;

            }

        }


        @media (max-width: 550px) {

            .header-icon {

                display: none;

            }


            .products-body,
            .form-body {

                padding: 18px;

            }


            .cash-grid {

                grid-template-columns: 1fr;

            }


            .products-summary {

                justify-content: space-between;

                gap: 10px;

                padding: 15px 18px;

            }


            .form-actions {

                flex-direction: column-reverse;

            }


            .btn-secondary,
            .btn-primary-submit {

                width: 100%;

            }

        }

    </style>


    {{-- ============================================
         JAVASCRIPT
    ============================================= --}}

    <script>

        let productoIndex = 1;


        /* ============================================
           AGREGAR PRODUCTO
        ============================================ */

        function agregarProducto() {

            const container =
                document.getElementById(
                    'productosContainer'
                );


            const row =
                document.createElement('div');


            row.className =
                'product-row';


            row.innerHTML = `

                <div class="product-number">
                    ${productoIndex + 1}
                </div>


                <div class="product-field product-select-field">

                    <label>
                        Producto
                    </label>


                    <select
                        name="detalles[${productoIndex}][producto_id]"
                        class="producto-select"
                        onchange="actualizarFila(this)"
                        required>

                        <option value="">
                            Selecciona un producto
                        </option>


                        @foreach($productos as $producto)

                            <option
                                value="{{ $producto->id }}"
                                data-precio="{{ $producto->precio_venta }}"
                                data-stock="{{ $producto->stock }}">

                                {{ $producto->codigo }}
                                —
                                {{ $producto->nombre }}
                                | Stock: {{ $producto->stock }}

                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="product-field quantity-field">

                    <label>
                        Cantidad
                    </label>


                    <input
                        type="number"
                        name="detalles[${productoIndex}][cantidad]"
                        class="cantidad-input"
                        value="1"
                        min="1"
                        step="1"
                        onchange="calcularFila(this)"
                        oninput="calcularFila(this)"
                        required>

                </div>


                <div class="product-field price-field">

                    <label>
                        Precio
                    </label>


                    <div class="price-wrapper">

                        <span>
                            L
                        </span>


                        <input
                            type="number"
                            name="detalles[${productoIndex}][precio]"
                            class="precio-input"
                            value="0"
                            min="0"
                            step="0.01"
                            onchange="calcularFila(this)"
                            oninput="calcularFila(this)"
                            required>

                    </div>

                </div>


                <div class="product-field subtotal-field">

                    <label>
                        Subtotal
                    </label>


                    <div class="row-subtotal">
                        L 0.00
                    </div>

                </div>


                <button
                    type="button"
                    class="remove-product"
                    onclick="eliminarProducto(this)"
                    title="Eliminar producto">

                    <svg width="17" height="17"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M3 6h18"/>
                        <path d="M8 6V4h8v2"/>
                        <path d="M19 6l-1 14H6L5 6"/>
                        <path d="M10 11v5"/>
                        <path d="M14 11v5"/>

                    </svg>

                </button>

            `;


            container.appendChild(row);


            productoIndex++;


            actualizarNumeros();

            actualizarResumenProductos();

        }


        /* ============================================
           ELIMINAR PRODUCTO
        ============================================ */

        function eliminarProducto(button) {

            const rows =
                document.querySelectorAll(
                    '.product-row'
                );


            if (rows.length <= 1) {

                alert(
                    'Debe existir al menos un producto en la venta.'
                );

                return;

            }


            button
                .closest('.product-row')
                .remove();


            actualizarNumeros();

            actualizarResumenProductos();

            calcularTotales();

        }


        /* ============================================
           ACTUALIZAR NÚMEROS
        ============================================ */

        function actualizarNumeros() {

            const rows =
                document.querySelectorAll(
                    '.product-row'
                );


            rows.forEach(
                (row, index) => {

                    const number =
                        row.querySelector(
                            '.product-number'
                        );


                    if (number) {

                        number.textContent =
                            index + 1;

                    }

                }
            );

        }


        /* ============================================
           SELECCIONAR PRODUCTO
        ============================================ */

        function actualizarFila(select) {

            const row =
                select.closest(
                    '.product-row'
                );


            const option =
                select.options[
                    select.selectedIndex
                ];


            if (!option) {
                return;
            }


            const precio =
                option.dataset.precio || 0;


            const stock =
                parseInt(
                    option.dataset.stock || 0
                );


            const precioInput =
                row.querySelector(
                    '.precio-input'
                );


            const cantidadInput =
                row.querySelector(
                    '.cantidad-input'
                );


            precioInput.value =
                parseFloat(precio).toFixed(2);


            cantidadInput.max =
                stock;


            calcularFila(select);

        }


        /* ============================================
           CALCULAR FILA
        ============================================ */

        function calcularFila(element) {

            const row =
                element.closest(
                    '.product-row'
                );


            if (!row) {
                return;
            }


            const cantidad =
                parseFloat(
                    row.querySelector(
                        '.cantidad-input'
                    ).value
                ) || 0;


            const precio =
                parseFloat(
                    row.querySelector(
                        '.precio-input'
                    ).value
                ) || 0;


            const subtotal =
                cantidad * precio;


            row.querySelector(
                '.row-subtotal'
            ).textContent =
                'L ' +
                subtotal.toFixed(2);


            calcularTotales();

            actualizarResumenProductos();

        }


        /* ============================================
           CALCULAR TOTALES
        ============================================ */

        function calcularTotales() {

            let subtotal = 0;


            document
                .querySelectorAll(
                    '.product-row'
                )
                .forEach(row => {

                    const cantidad =
                        parseFloat(
                            row.querySelector(
                                '.cantidad-input'
                            ).value
                        ) || 0;


                    const precio =
                        parseFloat(
                            row.querySelector(
                                '.precio-input'
                            ).value
                        ) || 0;


                    subtotal +=
                        cantidad * precio;

                });


            const descuento =
                parseFloat(
                    document.getElementById(
                        'descuento'
                    ).value
                ) || 0;


            const impuestoPorcentaje =
                parseFloat(
                    document.getElementById(
                        'impuesto_porcentaje'
                    ).value
                ) || 0;


            /*
             * La base imponible se obtiene
             * después del descuento.
             */

            const base =
                Math.max(
                    0,
                    subtotal - descuento
                );


            /*
             * Cálculo del impuesto:
             *
             * Base × porcentaje / 100
             */

            const impuesto =
                base *
                (impuestoPorcentaje / 100);


            /*
             * Total final:
             *
             * Base + impuesto
             */

            const total =
                base + impuesto;


            document.getElementById(
                'subtotalDisplay'
            ).textContent =
                'L ' +
                subtotal.toFixed(2);


            document.getElementById(
                'descuentoDisplay'
            ).textContent =
                'L ' +
                descuento.toFixed(2);


            document.getElementById(
                'impuestoDisplay'
            ).textContent =
                'L ' +
                impuesto.toFixed(2);


            /*
             * Actualizar etiqueta para
             * mostrar el porcentaje actual.
             */

            const impuestoLabel =
                document.querySelector(
                    '.total-row:nth-of-type(3) span'
                );


            if (impuestoLabel) {

                impuestoLabel.textContent =
                    'Impuesto (' +
                    impuestoPorcentaje.toFixed(2) +
                    '%)';

            }


            document.getElementById(
                'totalDisplay'
            ).textContent =
                'L ' +
                total.toFixed(2);


            calcularCambio();

        }


        /* ============================================
           RESUMEN DE PRODUCTOS
        ============================================ */

        function actualizarResumenProductos() {

            const rows =
                document.querySelectorAll(
                    '.product-row'
                );


            let unidades = 0;

            let productosSeleccionados = 0;


            rows.forEach(row => {

                const cantidad =
                    parseInt(
                        row.querySelector(
                            '.cantidad-input'
                        ).value
                    ) || 0;


                const producto =
                    row.querySelector(
                        '.producto-select'
                    ).value;


                if (producto) {

                    productosSeleccionados++;

                    unidades += cantidad;

                }

            });


            document.getElementById(
                'cantidadProductos'
            ).textContent =
                productosSeleccionados;


            document.getElementById(
                'cantidadUnidades'
            ).textContent =
                unidades;

        }


        /* ============================================
           CALCULAR CAMBIO
        ============================================ */

        function calcularCambio() {

            const metodo =
                document.querySelector(
                    'input[name="metodo_pago"]:checked'
                );


            const efectivoFields =
                document.getElementById(
                    'efectivoFields'
                );


            const efectivo =
                parseFloat(
                    document.getElementById(
                        'efectivo_recibido'
                    ).value
                ) || 0;


            const totalText =
                document.getElementById(
                    'totalDisplay'
                ).textContent
                .replace('L', '')
                .trim();


            const total =
                parseFloat(totalText) || 0;


            if (
                metodo &&
                metodo.value === 'EFECTIVO'
            ) {

                efectivoFields.style.display =
                    'block';


                const cambio =
                    Math.max(
                        0,
                        efectivo - total
                    );


                document.getElementById(
                    'cambioDisplay'
                ).textContent =
                    'L ' +
                    cambio.toFixed(2);

            } else {

                efectivoFields.style.display =
                    'none';


                document.getElementById(
                    'cambioDisplay'
                ).textContent =
                    'L 0.00';

            }

        }


        /* ============================================
           CAMBIAR MÉTODO DE PAGO
        ============================================ */

        function cambiarMetodoPago() {

            calcularCambio();

        }


        /* ============================================
           EVENTOS
        ============================================ */

        document.getElementById(
            'descuento'
        ).addEventListener(
            'input',
            calcularTotales
        );


        document.getElementById(
            'impuesto_porcentaje'
        ).addEventListener(
            'input',
            calcularTotales
        );


        /* ============================================
           VALIDACIÓN FINAL
        ============================================ */

        document.getElementById(
            'ventaForm'
        ).addEventListener(
            'submit',
            function(event) {

                const rows =
                    document.querySelectorAll(
                        '.product-row'
                    );


                let valido = true;


                rows.forEach(row => {

                    const producto =
                        row.querySelector(
                            '.producto-select'
                        ).value;


                    const cantidad =
                        parseInt(
                            row.querySelector(
                                '.cantidad-input'
                            ).value
                        ) || 0;


                    const precio =
                        parseFloat(
                            row.querySelector(
                                '.precio-input'
                            ).value
                        );


                    if (
                        !producto ||
                        cantidad <= 0 ||
                        isNaN(precio) ||
                        precio < 0
                    ) {

                        valido = false;

                    }

                });


                if (!valido) {

                    event.preventDefault();


                    alert(
                        'Completa correctamente todos los productos de la venta.'
                    );

                    return;

                }


                /* VALIDAR IMPUESTO */

                const impuestoPorcentaje =
                    parseFloat(
                        document.getElementById(
                            'impuesto_porcentaje'
                        ).value
                    );


                if (
                    isNaN(impuestoPorcentaje) ||
                    impuestoPorcentaje < 0 ||
                    impuestoPorcentaje > 100
                ) {

                    event.preventDefault();


                    alert(
                        'El impuesto debe estar entre 0% y 100%.'
                    );

                    return;

                }


                /* VALIDAR DESCUENTO */

                const descuento =
                    parseFloat(
                        document.getElementById(
                            'descuento'
                        ).value
                    ) || 0;


                const subtotal =
                    parseFloat(
                        document.getElementById(
                            'subtotalDisplay'
                        ).textContent
                            .replace('L', '')
                            .trim()
                    ) || 0;


                if (descuento > subtotal) {

                    event.preventDefault();


                    alert(
                        'El descuento no puede ser mayor que el subtotal.'
                    );

                    return;

                }


                /* VALIDAR EFECTIVO */

                const metodo =
                    document.querySelector(
                        'input[name="metodo_pago"]:checked'
                    );


                if (
                    metodo &&
                    metodo.value === 'EFECTIVO'
                ) {

                    const efectivo =
                        parseFloat(
                            document.getElementById(
                                'efectivo_recibido'
                            ).value
                        ) || 0;


                    const total =
                        parseFloat(
                            document.getElementById(
                                'totalDisplay'
                            ).textContent
                                .replace('L', '')
                                .trim()
                        ) || 0;


                    if (efectivo < total) {

                        event.preventDefault();


                        alert(
                            'El efectivo recibido no puede ser menor que el total de la venta.'
                        );

                        return;

                    }

                }

            }
        );


        /* ============================================
           INICIALIZAR
        ============================================ */

        calcularTotales();

        actualizarResumenProductos();

        cambiarMetodoPago();

    </script>

</x-app-layout>