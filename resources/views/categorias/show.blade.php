<x-app-layout>

    <div class="categorias-page">

        <!-- ENCABEZADO -->

        <div class="page-header">

            <div>

                <a href="{{ route('categorias.index') }}" class="back-link">
                    ← Volver a categorías
                </a>

                <span class="section-label">
                    SUPERMERCADO PRISMA
                </span>

                <h1>Detalle de categoría</h1>

                <p>
                    Información y productos asociados a esta categoría.
                </p>

            </div>

            @if(auth()->user()->hasPrivilege('categorias.editar'))

                <a
                    href="{{ route('categorias.edit', $categoria) }}"
                    class="btn btn-primary"
                >
                    Editar categoría
                </a>

            @endif

        </div>


        <!-- INFORMACIÓN PRINCIPAL -->

        <div class="info-grid">

            <div class="info-card">

                <span class="info-label">
                    CATEGORÍA
                </span>

                <h2>
                    {{ $categoria->nombre }}
                </h2>

                <p>
                    {{ $categoria->descripcion ?: 'Sin descripción registrada.' }}
                </p>

            </div>


            <div class="info-card">

                <span class="info-label">
                    ESTADO
                </span>

                @if($categoria->estado)

                    <span class="status active">
                        Activa
                    </span>

                    <p>
                        Esta categoría está disponible para asociarse a productos.
                    </p>

                @else

                    <span class="status inactive">
                        Inactiva
                    </span>

                    <p>
                        Esta categoría no está disponible para nuevos productos.
                    </p>

                @endif

            </div>


            <div class="info-card">

                <span class="info-label">
                    PRODUCTOS
                </span>

                <div class="number">
                    {{ $categoria->productos->count() }}
                </div>

                <p>
                    Productos asociados a esta categoría.
                </p>

            </div>


            <div class="info-card">

                <span class="info-label">
                    IDENTIFICADOR
                </span>

                <div class="number">
                    #{{ $categoria->id }}
                </div>

                <p>
                    Identificador interno de la categoría.
                </p>

            </div>

        </div>


        <!-- PRODUCTOS -->

        <div class="products-card">

            <div class="card-header">

                <div>

                    <h2>
                        Productos de esta categoría
                    </h2>

                    <p>
                        Listado de productos asociados a
                        <strong>{{ $categoria->nombre }}</strong>.
                    </p>

                </div>

                <span class="count-badge">
                    {{ $categoria->productos->count() }}
                    {{ $categoria->productos->count() == 1 ? 'producto' : 'productos' }}
                </span>

            </div>


            @if($categoria->productos->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>Código</th>

                                <th>Producto</th>

                                <th>Proveedor</th>

                                <th>Precio venta</th>

                                <th>Stock</th>

                                <th>Estado</th>

                                <th>Acciones</th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($categoria->productos as $producto)

                                <tr>

                                    <td>

                                        <span class="product-code">
                                            {{ $producto->codigo }}
                                        </span>

                                    </td>


                                    <td>

                                        <div class="product-name">
                                            {{ $producto->nombre }}
                                        </div>

                                    </td>


                                    <td>

                                        {{ $producto->proveedor->nombre ?? 'Sin proveedor' }}

                                    </td>


                                    <td>

                                        <strong>
                                            L {{ number_format($producto->precio_venta, 2) }}
                                        </strong>

                                    </td>


                                    <td>

                                        <span
                                            class="
                                                stock-badge
                                                {{ $producto->stock <= $producto->stock_minimo
                                                    ? 'stock-low'
                                                    : 'stock-normal' }}
                                            "
                                        >
                                            {{ $producto->stock }}
                                        </span>

                                    </td>


                                    <td>

                                        @if($producto->estado)

                                            <span class="status active">
                                                Activo
                                            </span>

                                        @else

                                            <span class="status inactive">
                                                Inactivo
                                            </span>

                                        @endif

                                    </td>


                                    <td>

                                        @if(auth()->user()->hasPrivilege('productos.ver'))

                                            <a
                                                href="{{ route('productos.show', $producto) }}"
                                                class="action-btn view"
                                                title="Ver producto"
                                            >
                                                Ver
                                            </a>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty-state">

                    <div class="empty-icon">
                        —
                    </div>

                    <h3>
                        No hay productos asociados
                    </h3>

                    <p>
                        Esta categoría todavía no tiene productos registrados.
                    </p>

                    @if(auth()->user()->hasPrivilege('productos.crear'))

                        <a
                            href="{{ route('productos.create') }}"
                            class="btn btn-primary"
                        >
                            Nuevo producto
                        </a>

                    @endif

                </div>

            @endif

        </div>


        <!-- ACCIONES -->

        <div class="bottom-actions">

            <a
                href="{{ route('categorias.index') }}"
                class="btn btn-secondary"
            >
                Volver a categorías
            </a>


            @if(auth()->user()->hasPrivilege('categorias.editar'))

                <a
                    href="{{ route('categorias.edit', $categoria) }}"
                    class="btn btn-primary"
                >
                    Editar categoría
                </a>

            @endif

        </div>

    </div>


    <style>

        .categorias-page {
            padding: 32px;
            max-width: 1250px;
            margin: 0 auto;
        }


        /* HEADER */

        .page-header {
            background: #0f172a;
            border-radius: 18px;
            padding: 30px 32px;
            margin-bottom: 24px;
            color: white;

            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 20px;
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


        /* BUTTONS */

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


        /* INFO */

        .info-grid {
            display: grid;

            grid-template-columns:
                repeat(4, minmax(0, 1fr));

            gap: 18px;

            margin-bottom: 24px;
        }


        .info-card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 16px;

            padding: 22px;

            box-shadow:
                0 6px 20px rgba(15, 23, 42, 0.05);
        }


        .info-label {
            display: block;

            color: #64748b;

            font-size: 11px;

            font-weight: 800;

            letter-spacing: 1px;

            margin-bottom: 10px;
        }


        .info-card h2 {
            margin: 0;

            color: #0f172a;

            font-size: 21px;

            font-weight: 800;
        }


        .info-card p {
            margin: 8px 0 0;

            color: #64748b;

            font-size: 13px;

            line-height: 1.5;
        }


        .number {
            color: #0f172a;

            font-size: 27px;

            font-weight: 800;
        }


        /* STATUS */

        .status {
            display: inline-flex;

            align-items: center;

            padding: 5px 10px;

            border-radius: 999px;

            font-size: 12px;

            font-weight: 700;
        }


        .status.active {
            background: #dcfce7;
            color: #166534;
        }


        .status.inactive {
            background: #fee2e2;
            color: #991b1b;
        }


        /* PRODUCTS CARD */

        .products-card {
            background: white;

            border: 1px solid #e2e8f0;

            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.06);
        }


        .card-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

            padding: 24px 28px;

            background: #f8fafc;

            border-bottom: 1px solid #e2e8f0;
        }


        .card-header h2 {
            margin: 0;

            color: #0f172a;

            font-size: 19px;

            font-weight: 800;
        }


        .card-header p {
            margin: 6px 0 0;

            color: #64748b;

            font-size: 14px;
        }


        .count-badge {
            flex-shrink: 0;

            padding: 7px 12px;

            border-radius: 8px;

            background: #e2e8f0;

            color: #475569;

            font-size: 12px;

            font-weight: 700;
        }


        /* TABLE */

        .table-wrapper {
            width: 100%;

            overflow-x: auto;
        }


        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 850px;
        }


        th {
            background: #f8fafc;

            color: #64748b;

            font-size: 11px;

            font-weight: 800;

            text-transform: uppercase;

            letter-spacing: 0.6px;

            padding: 14px 18px;

            text-align: left;

            border-bottom: 1px solid #e2e8f0;
        }


        td {
            padding: 16px 18px;

            color: #475569;

            font-size: 13px;

            border-bottom: 1px solid #f1f5f9;
        }


        tbody tr:hover {
            background: #f8fafc;
        }


        tbody tr:last-child td {
            border-bottom: none;
        }


        .product-code {
            display: inline-block;

            padding: 5px 8px;

            border-radius: 6px;

            background: #f1f5f9;

            color: #475569;

            font-family: monospace;

            font-size: 12px;

            font-weight: 700;
        }


        .product-name {
            color: #0f172a;

            font-weight: 700;
        }


        .stock-badge {
            display: inline-flex;

            min-width: 32px;

            justify-content: center;

            padding: 5px 8px;

            border-radius: 7px;

            font-size: 12px;

            font-weight: 800;
        }


        .stock-normal {
            background: #dcfce7;
            color: #166534;
        }


        .stock-low {
            background: #fef3c7;
            color: #92400e;
        }


        /* ACTION */

        .action-btn {
            display: inline-flex;

            align-items: center;
            justify-content: center;

            padding: 7px 11px;

            border-radius: 8px;

            text-decoration: none;

            font-size: 12px;

            font-weight: 700;

            background: #eff6ff;

            color: #1d4ed8;

            border: 1px solid #dbeafe;
        }


        .action-btn:hover {
            background: #dbeafe;
        }


        /* EMPTY */

        .empty-state {
            text-align: center;

            padding: 55px 25px;
        }


        .empty-icon {
            width: 50px;
            height: 50px;

            display: flex;

            align-items: center;
            justify-content: center;

            margin: 0 auto 15px;

            border-radius: 12px;

            background: #f1f5f9;

            color: #64748b;

            font-size: 24px;

            font-weight: 700;
        }


        .empty-state h3 {
            margin: 0;

            color: #0f172a;

            font-size: 17px;

            font-weight: 800;
        }


        .empty-state p {
            margin: 7px 0 20px;

            color: #64748b;

            font-size: 14px;
        }


        /* BOTTOM */

        .bottom-actions {
            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 12px;

            margin-top: 22px;
        }


        /* RESPONSIVE */

        @media (max-width: 1000px) {

            .info-grid {
                grid-template-columns:
                    repeat(2, minmax(0, 1fr));
            }

        }


        @media (max-width: 700px) {

            .categorias-page {
                padding: 18px;
            }


            .page-header {
                padding: 24px;

                flex-direction: column;

                align-items: flex-start;
            }


            .page-header h1 {
                font-size: 25px;
            }


            .info-grid {
                grid-template-columns: 1fr;
            }


            .card-header {
                align-items: flex-start;

                flex-direction: column;
            }


            .bottom-actions {
                flex-direction: column-reverse;
            }


            .bottom-actions .btn {
                width: 100%;
            }

        }

    </style>

</x-app-layout>