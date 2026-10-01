<x-app-layout>

    <div class="proveedores-page">

        {{-- ENCABEZADO --}}
        <div class="page-header">

            <div class="header-content">

                <a href="{{ route('proveedores.index') }}" class="back-link">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <path d="M19 12H5"></path>
                        <path d="M12 19l-7-7 7-7"></path>
                    </svg>

                    Volver a proveedores
                </a>

                <span class="header-label">
                    SUPERMERCADO PRISMA
                </span>

                <h1>
                    Detalle del proveedor
                </h1>

                <p>
                    Consulta la información y los productos asociados a este proveedor.
                </p>

            </div>

            @if(auth()->user()->hasPrivilege('proveedores.editar'))

                <a href="{{ route('proveedores.edit', $proveedor) }}"
                   class="btn-primary">

                    <svg width="18" height="18" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 20h9"></path>
                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
                    </svg>

                    Editar proveedor

                </a>

            @endif

        </div>


        {{-- INFORMACIÓN PRINCIPAL --}}
        <div class="info-grid">

            {{-- PROVEEDOR --}}
            <div class="info-card">

                <div class="info-icon">
                    <svg width="22" height="22" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M3 21h18"></path>
                        <path d="M5 21V7l7-4 7 4v14"></path>
                        <path d="M9 21v-5h6v5"></path>
                    </svg>
                </div>

                <div>
                    <span class="info-label">
                        PROVEEDOR
                    </span>

                    <h2>
                        {{ $proveedor->nombre }}
                    </h2>

                    <p>
                        {{ $proveedor->contacto ?: 'Sin contacto registrado' }}
                    </p>
                </div>

            </div>


            {{-- CONTACTO --}}
            <div class="info-card">

                <div class="info-icon">

                    <svg width="22" height="22" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2
                            19.79 19.79 0 0 1-8.63-3.07
                            19.5 19.5 0 0 1-6-6
                            19.79 19.79 0 0 1-3.07-8.67
                            A2 2 0 0 1 4.11 2h3
                            a2 2 0 0 1 2 1.72
                            12.84 12.84 0 0 0 .7 2.81
                            2 2 0 0 1-.45 2.11L8.09 9.91
                            a16 16 0 0 0 6 6l1.27-1.27
                            a2 2 0 0 1 2.11-.45
                            12.84 12.84 0 0 0 2.81.7
                            A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>

                </div>

                <div>

                    <span class="info-label">
                        TELÉFONO
                    </span>

                    <h2>
                        {{ $proveedor->telefono ?: 'No registrado' }}
                    </h2>

                    <p>
                        {{ $proveedor->correo ?: 'Sin correo registrado' }}
                    </p>

                </div>

            </div>


            {{-- ESTADO --}}
            <div class="info-card">

                <div class="info-icon">

                    <svg width="22" height="22" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <path d="M9 12l2 2 4-4"></path>
                    </svg>

                </div>

                <div>

                    <span class="info-label">
                        ESTADO
                    </span>

                    @if($proveedor->estado)

                        <span class="status active">
                            Activo
                        </span>

                        <p>
                            Proveedor disponible
                        </p>

                    @else

                        <span class="status inactive">
                            Inactivo
                        </span>

                        <p>
                            Proveedor no disponible
                        </p>

                    @endif

                </div>

            </div>


            {{-- PRODUCTOS --}}
            <div class="info-card">

                <div class="info-icon">

                    <svg width="22" height="22" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4
                            a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8
                            a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4
                            A2 2 0 0 0 21 16z">
                        </path>

                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                        <line x1="12" y1="22.08" x2="12" y2="12"></line>
                    </svg>

                </div>

                <div>

                    <span class="info-label">
                        PRODUCTOS ASOCIADOS
                    </span>

                    <h2>
                        {{ $proveedor->productos->count() }}
                    </h2>

                    <p>
                        Productos registrados
                    </p>

                </div>

            </div>

        </div>


        {{-- DATOS DEL PROVEEDOR --}}
        <div class="content-card">

            <div class="card-header">

                <div>
                    <span class="section-label">
                        INFORMACIÓN
                    </span>

                    <h2>
                        Datos del proveedor
                    </h2>
                </div>

            </div>


            <div class="details-grid">

                <div class="detail-item">

                    <span>
                        Nombre
                    </span>

                    <strong>
                        {{ $proveedor->nombre }}
                    </strong>

                </div>


                <div class="detail-item">

                    <span>
                        RTN
                    </span>

                    <strong>
                        {{ $proveedor->rtn ?: 'No registrado' }}
                    </strong>

                </div>


                <div class="detail-item">

                    <span>
                        Teléfono
                    </span>

                    <strong>
                        {{ $proveedor->telefono ?: 'No registrado' }}
                    </strong>

                </div>


                <div class="detail-item">

                    <span>
                        Correo electrónico
                    </span>

                    <strong>
                        {{ $proveedor->correo ?: 'No registrado' }}
                    </strong>

                </div>


                <div class="detail-item">

                    <span>
                        Persona de contacto
                    </span>

                    <strong>
                        {{ $proveedor->contacto ?: 'No registrado' }}
                    </strong>

                </div>


                <div class="detail-item detail-full">

                    <span>
                        Dirección
                    </span>

                    <strong>
                        {{ $proveedor->direccion ?: 'No registrada' }}
                    </strong>

                </div>

            </div>

        </div>


        {{-- PRODUCTOS DEL PROVEEDOR --}}
        <div class="content-card">

            <div class="card-header">

                <div>

                    <span class="section-label">
                        INVENTARIO
                    </span>

                    <h2>
                        Productos del proveedor
                    </h2>

                    <p>
                        Productos registrados actualmente con este proveedor.
                    </p>

                </div>

                <div class="product-count">
                    {{ $proveedor->productos->count() }}
                    {{ $proveedor->productos->count() == 1 ? 'producto' : 'productos' }}
                </div>

            </div>


            @if($proveedor->productos->count() > 0)

                <div class="table-wrapper">

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    Código
                                </th>

                                <th>
                                    Producto
                                </th>

                                <th>
                                    Categoría
                                </th>

                                <th>
                                    Precio venta
                                </th>

                                <th>
                                    Stock
                                </th>

                                <th>
                                    Estado
                                </th>

                                <th>
                                    Acción
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @foreach($proveedor->productos as $producto)

                                <tr>

                                    <td>

                                        <span class="product-code">
                                            {{ $producto->codigo }}
                                        </span>

                                    </td>


                                    <td>

                                        <div class="product-name">

                                            <strong>
                                                {{ $producto->nombre }}
                                            </strong>

                                            @if($producto->descripcion)

                                                <small>
                                                    {{ Str::limit($producto->descripcion, 45) }}
                                                </small>

                                            @endif

                                        </div>

                                    </td>


                                    <td>

                                        {{ $producto->categoria->nombre ?? 'Sin categoría' }}

                                    </td>


                                    <td>

                                        <strong class="price">
                                            L {{ number_format($producto->precio_venta, 2) }}
                                        </strong>

                                    </td>


                                    <td>

                                        @if($producto->stock <= $producto->stock_minimo)

                                            <span class="stock low">
                                                {{ $producto->stock }}
                                            </span>

                                        @else

                                            <span class="stock">
                                                {{ $producto->stock }}
                                            </span>

                                        @endif

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

                                            <a href="{{ route('productos.show', $producto) }}"
                                               class="action-btn view"
                                               title="Ver producto">

                                                <svg width="17" height="17"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2">

                                                    <path d="M1 12s4-8 11-8
                                                        11 8 11 8-4 8-11 8
                                                        -11-8-11-8z">
                                                    </path>

                                                    <circle cx="12" cy="12" r="3"></circle>

                                                </svg>

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

                        <svg width="30" height="30"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.7">

                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4
                                a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8
                                a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4
                                A2 2 0 0 0 21 16z">
                            </path>

                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>

                            <line x1="12" y1="22.08" x2="12" y2="12"></line>

                        </svg>

                    </div>

                    <h3>
                        No hay productos asociados
                    </h3>

                    <p>
                        Este proveedor todavía no tiene productos registrados.
                    </p>

                    @if(auth()->user()->hasPrivilege('productos.crear'))

                        <a href="{{ route('productos.create') }}"
                           class="btn-secondary">

                            Registrar producto

                        </a>

                    @endif

                </div>

            @endif

        </div>


        {{-- BOTONES INFERIORES --}}
        <div class="bottom-actions">

            <a href="{{ route('proveedores.index') }}"
               class="btn-secondary">

                <svg width="17" height="17"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2">

                    <path d="M19 12H5"></path>
                    <path d="M12 19l-7-7 7-7"></path>

                </svg>

                Volver a proveedores

            </a>


            @if(auth()->user()->hasPrivilege('proveedores.editar'))

                <a href="{{ route('proveedores.edit', $proveedor) }}"
                   class="btn-primary">

                    <svg width="17" height="17"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2">

                        <path d="M12 20h9"></path>
                        <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3
                            L7 19l-4 1 1-4L16.5 3.5z">
                        </path>

                    </svg>

                    Editar proveedor

                </a>

            @endif

        </div>

    </div>


    <style>

        .proveedores-page {
            padding: 30px;
            max-width: 1450px;
            margin: 0 auto;
        }

        .page-header {
            background: #0f172a;
            color: white;
            border-radius: 18px;
            padding: 30px;
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 25px;
            margin-bottom: 24px;
        }

        .header-content {
            flex: 1;
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

        .header-label,
        .section-label {
            display: block;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            color: #64748b;
            margin-bottom: 7px;
        }

        .header-label {
            color: #94a3b8;
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
        }

        .btn-primary {
            background: white;
            color: #0f172a;
        }

        .btn-primary:hover {
            background: #e2e8f0;
        }

        .btn-secondary {
            background: white;
            color: #334155;
            border-color: #dbe2ea;
        }

        .btn-secondary:hover {
            background: #f8fafc;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-bottom: 24px;
        }

        .info-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 15px;
            padding: 20px;
            display: flex;
            gap: 15px;
            align-items: flex-start;
            box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        }

        .info-icon {
            width: 44px;
            height: 44px;
            min-width: 44px;
            border-radius: 11px;
            background: #eef2ff;
            color: #334155;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .info-label {
            display: block;
            color: #64748b;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 5px;
        }

        .info-card h2 {
            margin: 0;
            font-size: 18px;
            color: #0f172a;
            font-weight: 750;
        }

        .info-card p {
            margin: 4px 0 0;
            color: #64748b;
            font-size: 13px;
        }

        .status {
            display: inline-flex;
            align-items: center;
            border-radius: 999px;
            padding: 5px 10px;
            font-size: 11px;
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

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .detail-item {
            padding: 20px 25px;
            border-bottom: 1px solid #eef2f7;
        }

        .detail-item:nth-child(odd) {
            border-right: 1px solid #eef2f7;
        }

        .detail-item span {
            display: block;
            color: #64748b;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .detail-item strong {
            color: #1e293b;
            font-size: 14px;
            font-weight: 650;
        }

        .detail-full {
            grid-column: 1 / -1;
            border-right: 0 !important;
        }

        .product-count {
            background: #f1f5f9;
            color: #475569;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 700;
            white-space: nowrap;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #f8fafc;
        }

        th {
            padding: 13px 18px;
            text-align: left;
            color: #64748b;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-weight: 750;
            white-space: nowrap;
        }

        td {
            padding: 16px 18px;
            border-top: 1px solid #eef2f7;
            color: #475569;
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        .product-code {
            font-family: monospace;
            font-size: 12px;
            background: #f1f5f9;
            color: #475569;
            padding: 5px 8px;
            border-radius: 6px;
        }

        .product-name strong {
            display: block;
            color: #1e293b;
            font-size: 14px;
        }

        .product-name small {
            display: block;
            color: #94a3b8;
            margin-top: 3px;
            font-size: 11px;
        }

        .price {
            color: #0f172a;
        }

        .stock {
            display: inline-flex;
            min-width: 34px;
            justify-content: center;
            background: #dcfce7;
            color: #166534;
            padding: 5px 9px;
            border-radius: 7px;
            font-weight: 700;
            font-size: 12px;
        }

        .stock.low {
            background: #fef3c7;
            color: #92400e;
        }

        .action-btn {
            width: 34px;
            height: 34px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 8px;
            text-decoration: none;
            transition: .2s;
        }

        .action-btn.view {
            color: #334155;
            background: #f1f5f9;
        }

        .action-btn.view:hover {
            background: #e2e8f0;
        }

        .empty-state {
            text-align: center;
            padding: 55px 25px;
        }

        .empty-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            border-radius: 15px;
            background: #f1f5f9;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .empty-state h3 {
            margin: 0 0 7px;
            color: #1e293b;
            font-size: 17px;
        }

        .empty-state p {
            margin: 0 0 20px;
            color: #64748b;
            font-size: 13px;
        }

        .bottom-actions {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 20px;
        }

        @media (max-width: 1100px) {

            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }

        }

        @media (max-width: 700px) {

            .proveedores-page {
                padding: 18px;
            }

            .page-header {
                flex-direction: column;
                align-items: stretch;
                padding: 23px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .details-grid {
                grid-template-columns: 1fr;
            }

            .detail-item:nth-child(odd) {
                border-right: 0;
            }

            .detail-full {
                grid-column: auto;
            }

            .card-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .bottom-actions {
                flex-direction: column;
            }

            .bottom-actions a {
                width: 100%;
            }

        }

    </style>

</x-app-layout>