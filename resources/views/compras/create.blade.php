<x-app-layout>

    <div class="compras-page">

        {{-- ENCABEZADO --}}
        <div class="page-header">

            <div>

                <a href="{{ route('compras.index') }}" class="back-link">

                    <svg width="18" height="18"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path d="M19 12H5"></path>
                        <path d="M12 19l-7-7 7-7"></path>

                    </svg>

                    Volver a compras

                </a>

                <span class="header-label">
                    SUPERMERCADO PRISMA
                </span>

                <h1>
                    Registrar compra
                </h1>

                <p>
                    Registra una nueva compra y actualiza automáticamente el inventario.
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


        <form action="{{ route('compras.store') }}"
              method="POST"
              id="compraForm">

            @csrf


            {{-- INFORMACIÓN DE LA COMPRA --}}
            <div class="content-card">

                <div class="card-header">

                    <div>

                        <span class="section-label">
                            INFORMACIÓN GENERAL
                        </span>

                        <h2>
                            Datos de la compra
                        </h2>

                        <p>
                            Selecciona el proveedor y establece la fecha de la compra.
                        </p>

                    </div>

                </div>


                <div class="form-grid">

                    {{-- PROVEEDOR --}}
                    <div class="form-group">

                        <label for="proveedor_id">
                            Proveedor
                            <span>*</span>
                        </label>

                        <select
                            id="proveedor_id"
                            name="proveedor_id"
                            required
                        >

                            <option value="">
                                Selecciona un proveedor
                            </option>

                            @foreach($proveedores as $proveedor)

                                <option
                                    value="{{ $proveedor->id }}"
                                    {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}
                                >
                                    {{ $proveedor->nombre }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- FECHA --}}
                    <div class="form-group">

                        <label for="fecha">
                            Fecha y hora
                            <span>*</span>
                        </label>

                        <input
                            type="datetime-local"
                            id="fecha"
                            name="fecha"
                            value="{{ old('fecha', now()->format('Y-m-d\TH:i')) }}"
                            required
                        >

                    </div>


                    {{-- IMPUESTO --}}
                    <div class="form-group">

                        <label for="impuesto">
                            Impuesto
                        </label>

                        <div class="input-money">

                            <span>
                                L
                            </span>

                            <input
                                type="number"
                                id="impuesto"
                                name="impuesto"
                                value="{{ old('impuesto', 0) }}"
                                min="0"
                                step="0.01"
                                placeholder="0.00"
                            >

                        </div>

                        <small>
                            Ingresa el impuesto total de esta compra.
                        </small>

                    </div>

                </div>

            </div>


            {{-- PRODUCTOS --}}
            <div class="content-card">

                <div class="card-header">

                    <div>

                        <span class="section-label">
                            DETALLE
                        </span>

                        <h2>
                            Productos de la compra
                        </h2>

                        <p>
                            Agrega los productos, cantidades y precios de compra.
                        </p>

                    </div>

                    <button
                        type="button"
                        class="btn-secondary"
                        onclick="agregarProducto()"
                    >

                        <svg width="18" height="18"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2">

                            <path d="M12 5v14"></path>
                            <path d="M5 12h14"></path>

                        </svg>

                        Agregar producto

                    </button>

                </div>


                <div class="products-container" id="productosContainer">

                    {{-- PRIMER PRODUCTO --}}
                    <div class="product-row">

                        <div class="product-number">
                            1
                        </div>


                        <div class="product-field product-select">

                            <label>
                                Producto
                            </label>

                            <select
                                name="detalles[0][producto_id]"
                                class="producto-select"
                                required
                                onchange="actualizarFila(this)"
                            >

                                <option value="">
                                    Selecciona un producto
                                </option>

                                @foreach($productos as $producto)

                                    <option
                                        value="{{ $producto->id }}"
                                        data-precio="{{ $producto->precio_compra }}"
                                    >
                                        {{ $producto->codigo }}
                                        —
                                        {{ $producto->nombre }}
                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="product-field">

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
                                required
                                oninput="calcularFila(this)"
                            >

                        </div>


                        <div class="product-field">

                            <label>
                                Precio
                            </label>

                            <div class="input-money">

                                <span>
                                    L
                                </span>

                                <input
                                    type="number"
                                    name="detalles[0][precio]"
                                    class="precio-input"
                                    value=""
                                    min="0"
                                    step="0.01"
                                    required
                                    oninput="calcularFila(this)"
                                >

                            </div>

                        </div>


                        <div class="product-field subtotal-field">

                            <label>
                                Subtotal
                            </label>

                            <strong class="subtotal-value">
                                L 0.00
                            </strong>

                        </div>


                        <button
                            type="button"
                            class="remove-btn"
                            onclick="eliminarProducto(this)"
                            title="Eliminar producto"
                        >

                            <svg width="17" height="17"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2">

                                <polyline points="3 6 5 6 21 6"></polyline>

                                <path d="M19 6l-1 14H6L5 6"></path>

                                <path d="M10 11v6"></path>
                                <path d="M14 11v6"></path>

                                <path d="M9 6V4h6v2"></path>

                            </svg>

                        </button>

                    </div>

                </div>

            </div>


            {{-- RESUMEN --}}
            <div class="summary-card">

                <div>

                    <span>
                        SUBTOTAL
                    </span>

                    <strong id="subtotalGeneral">
                        L 0.00
                    </strong>

                </div>


                <div>

                    <span>
                        IMPUESTO
                    </span>

                    <strong id="impuestoGeneral">
                        L 0.00
                    </strong>

                </div>


                <div class="total-summary">

                    <span>
                        TOTAL
                    </span>

                    <strong id="totalGeneral">
                        L 0.00
                    </strong>

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
                        Actualización automática del inventario
                    </strong>

                    <p>
                        Al guardar la compra, las cantidades registradas se
                        sumarán automáticamente al stock de cada producto y
                        se generará un movimiento de entrada en el historial.
                    </p>

                </div>

            </div>


            {{-- BOTONES --}}
            <div class="form-actions">

                <a href="{{ route('compras.index') }}"
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

                        <path d="M19 21H5a2 2 0 0 1-2-2V5
                            a2 2 0 0 1 2-2h11l5 5v11
                            a2 2 0 0 1-2 2z">
                        </path>

                        <polyline points="17 21 17 13 7 13 7 21"></polyline>

                        <polyline points="7 3 7 8 15 8"></polyline>

                    </svg>

                    Registrar compra

                </button>

            </div>

        </form>

    </div>


    <style>

        .compras-page {
            padding: 30px;
            max-width: 1450px;
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
            margin-bottom: 24px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        }

        .card-header {
            padding: 23px 25px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
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

        .form-group label,
        .product-field label {
            display: block;
            color: #334155;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 7px;
        }

        .form-group label span {
            color: #dc2626;
        }

        .form-group input,
        .form-group select,
        .product-field input,
        .product-field select {
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #dbe2ea;
            border-radius: 9px;
            background: white;
            color: #1e293b;
            font-size: 13px;
            padding: 11px 12px;
            outline: none;
            transition: .2s;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus,
        .product-field input:focus,
        .product-field select:focus {
            border-color: #64748b;
            box-shadow: 0 0 0 3px rgba(100, 116, 139, .10);
        }

        .form-group small {
            display: block;
            color: #94a3b8;
            font-size: 11px;
            margin-top: 6px;
        }

        .input-money {
            display: flex;
            align-items: stretch;
        }

        .input-money > span {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            background: #f8fafc;
            border: 1px solid #dbe2ea;
            border-right: 0;
            border-radius: 9px 0 0 9px;
            color: #64748b;
            font-size: 13px;
            font-weight: 700;
        }

        .input-money input {
            border-radius: 0 9px 9px 0 !important;
        }

        .products-container {
            padding: 0;
        }

        .product-row {
            display: grid;
            grid-template-columns: 35px minmax(240px, 2fr) 120px 150px 150px 42px;
            align-items: end;
            gap: 12px;
            padding: 20px 25px;
            border-bottom: 1px solid #eef2f7;
        }

        .product-row:last-child {
            border-bottom: 0;
        }

        .product-number {
            width: 30px;
            height: 30px;
            border-radius: 8px;
            background: #f1f5f9;
            color: #475569;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            font-weight: 750;
            margin-bottom: 4px;
        }

        .product-field {
            min-width: 0;
        }

        .subtotal-field strong {
            display: flex;
            align-items: center;
            min-height: 42px;
            color: #0f172a;
            font-size: 14px;
        }

        .remove-btn {
            width: 36px;
            height: 36px;
            margin-bottom: 3px;
            border: 0;
            border-radius: 8px;
            background: #fee2e2;
            color: #b91c1c;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: .2s;
        }

        .remove-btn:hover {
            background: #fecaca;
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
            border: 1px solid transparent;
            cursor: pointer;
        }

        .btn-primary {
            background: #0f172a;
            color: white;
            border-color: #0f172a;
        }

        .btn-primary:hover {
            background: #1e293b;
        }

        .btn-secondary {
            background: white;
            color: #334155;
            border-color: #dbe2ea;
        }

        .btn-secondary:hover {
            background: #f8fafc;
        }

        .summary-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 16px;
            padding: 22px 25px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 45px;
            margin-bottom: 20px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        }

        .summary-card > div {
            text-align: right;
        }

        .summary-card span {
            display: block;
            color: #64748b;
            font-size: 10px;
            font-weight: 750;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .summary-card strong {
            color: #334155;
            font-size: 17px;
        }

        .summary-card .total-summary {
            border-left: 1px solid #e2e8f0;
            padding-left: 45px;
        }

        .summary-card .total-summary strong {
            color: #0f172a;
            font-size: 24px;
        }

        .info-box {
            display: flex;
            align-items: flex-start;
            gap: 11px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 16px;
            margin-bottom: 20px;
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
            margin-bottom: 25px;
        }

        @media (max-width: 1050px) {

            .product-row {
                grid-template-columns: 35px 1fr 110px 140px;
            }

            .subtotal-field {
                grid-column: 2;
            }

            .remove-btn {
                grid-column: 4;
                grid-row: 2;
                justify-self: end;
            }

        }

        @media (max-width: 700px) {

            .compras-page {
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

            .card-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .product-row {
                grid-template-columns: 1fr;
                gap: 10px;
                padding: 20px;
            }

            .product-number {
                margin-bottom: 0;
            }

            .subtotal-field {
                grid-column: auto;
            }

            .remove-btn {
                grid-column: auto;
                grid-row: auto;
                justify-self: end;
                margin-top: -45px;
            }

            .summary-card {
                flex-direction: column;
                align-items: stretch;
                gap: 15px;
            }

            .summary-card > div {
                text-align: left;
            }

            .summary-card .total-summary {
                border-left: 0;
                border-top: 1px solid #e2e8f0;
                padding-left: 0;
                padding-top: 15px;
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


    <script>

        let productoIndex = 1;


        function agregarProducto() {

            const container = document.getElementById('productosContainer');

            const row = document.createElement('div');

            row.className = 'product-row';

            row.innerHTML = `
                <div class="product-number">
                    ${productoIndex + 1}
                </div>

                <div class="product-field product-select">

                    <label>
                        Producto
                    </label>

                    <select
                        name="detalles[${productoIndex}][producto_id]"
                        class="producto-select"
                        required
                        onchange="actualizarFila(this)"
                    >

                        <option value="">
                            Selecciona un producto
                        </option>

                        @foreach($productos as $producto)

                            <option
                                value="{{ $producto->id }}"
                                data-precio="{{ $producto->precio_compra }}"
                            >
                                {{ $producto->codigo }} — {{ $producto->nombre }}
                            </option>

                        @endforeach

                    </select>

                </div>

                <div class="product-field">

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
                        required
                        oninput="calcularFila(this)"
                    >

                </div>

                <div class="product-field">

                    <label>
                        Precio
                    </label>

                    <div class="input-money">

                        <span>
                            L
                        </span>

                        <input
                            type="number"
                            name="detalles[${productoIndex}][precio]"
                            class="precio-input"
                            value=""
                            min="0"
                            step="0.01"
                            required
                            oninput="calcularFila(this)"
                        >

                    </div>

                </div>

                <div class="product-field subtotal-field">

                    <label>
                        Subtotal
                    </label>

                    <strong class="subtotal-value">
                        L 0.00
                    </strong>

                </div>

                <button
                    type="button"
                    class="remove-btn"
                    onclick="eliminarProducto(this)"
                    title="Eliminar producto"
                >

                    <svg width="17" height="17"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <polyline points="3 6 5 6 21 6"></polyline>

                        <path d="M19 6l-1 14H6L5 6"></path>

                        <path d="M10 11v6"></path>
                        <path d="M14 11v6"></path>

                        <path d="M9 6V4h6v2"></path>

                    </svg>

                </button>
            `;

            container.appendChild(row);

            productoIndex++;

            actualizarNumeros();

        }


        function eliminarProducto(button) {

            const rows = document.querySelectorAll('.product-row');

            if (rows.length <= 1) {

                alert('Debe existir al menos un producto en la compra.');

                return;
            }

            button.closest('.product-row').remove();

            actualizarNumeros();

            calcularTotales();

        }


        function actualizarNumeros() {

            const rows = document.querySelectorAll('.product-row');

            rows.forEach((row, index) => {

                const number = row.querySelector('.product-number');

                if (number) {
                    number.textContent = index + 1;
                }

            });

        }


        function actualizarFila(select) {

            const row = select.closest('.product-row');

            const option = select.options[select.selectedIndex];

            const precio = option.dataset.precio || '';

            const precioInput = row.querySelector('.precio-input');

            if (precioInput && precio !== '') {

                precioInput.value = precio;

            }

            calcularFila(select);

        }


        function calcularFila(element) {

            const row = element.closest('.product-row');

            const cantidadInput = row.querySelector('.cantidad-input');

            const precioInput = row.querySelector('.precio-input');

            const subtotalElement = row.querySelector('.subtotal-value');

            const cantidad = parseFloat(cantidadInput.value) || 0;

            const precio = parseFloat(precioInput.value) || 0;

            const subtotal = cantidad * precio;

            subtotalElement.textContent =
                'L ' + subtotal.toFixed(2);

            calcularTotales();

        }


        function calcularTotales() {

            let subtotal = 0;

            document.querySelectorAll('.product-row').forEach(row => {

                const cantidad =
                    parseFloat(
                        row.querySelector('.cantidad-input')?.value
                    ) || 0;

                const precio =
                    parseFloat(
                        row.querySelector('.precio-input')?.value
                    ) || 0;

                subtotal += cantidad * precio;

            });


            const impuesto =
                parseFloat(
                    document.getElementById('impuesto').value
                ) || 0;


            const total = subtotal + impuesto;


            document.getElementById('subtotalGeneral').textContent =
                'L ' + subtotal.toFixed(2);

            document.getElementById('impuestoGeneral').textContent =
                'L ' + impuesto.toFixed(2);

            document.getElementById('totalGeneral').textContent =
                'L ' + total.toFixed(2);

        }


        document
            .getElementById('impuesto')
            .addEventListener('input', calcularTotales);


        document
            .getElementById('compraForm')
            .addEventListener('submit', function(event) {

                const rows =
                    document.querySelectorAll('.product-row');

                let valido = true;

                rows.forEach(row => {

                    const producto =
                        row.querySelector('.producto-select')?.value;

                    const cantidad =
                        parseFloat(
                            row.querySelector('.cantidad-input')?.value
                        ) || 0;

                    const precio =
                        parseFloat(
                            row.querySelector('.precio-input')?.value
                        );

                    if (
                        !producto ||
                        cantidad < 1 ||
                        isNaN(precio) ||
                        precio < 0
                    ) {

                        valido = false;

                    }

                });


                if (!valido) {

                    event.preventDefault();

                    alert(
                        'Completa correctamente todos los productos antes de registrar la compra.'
                    );

                }

            });


        calcularTotales();

    </script>

</x-app-layout>