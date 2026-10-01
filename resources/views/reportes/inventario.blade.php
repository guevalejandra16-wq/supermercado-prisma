<x-app-layout>

    <style>
        .reporte-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 30px;
        }

        .reporte-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            margin-bottom: 25px;
        }

        .reporte-titulo h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            color: #111827;
        }

        .reporte-titulo p {
            margin: 6px 0 0;
            color: #6b7280;
            font-size: 14px;
        }

        .btn-imprimir {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 11px 18px;
            background: #111827;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .btn-imprimir:hover {
            background: #1f2937;
        }

        .filtros {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .filtros-grid {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 15px;
            align-items: end;
        }

        .campo label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
            color: #374151;
        }

        .campo select {
            width: 100%;
            height: 42px;
            padding: 0 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            color: #111827;
            font-size: 14px;
            outline: none;
        }

        .campo select:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .botones-filtro {
            display: flex;
            gap: 8px;
        }

        .btn-filtrar {
            height: 42px;
            padding: 0 18px;
            border: none;
            border-radius: 8px;
            background: #2563eb;
            color: white;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-filtrar:hover {
            background: #1d4ed8;
        }

        .btn-limpiar {
            height: 42px;
            padding: 0 18px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            background: white;
            color: #374151;
            font-size: 14px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-limpiar:hover {
            background: #f9fafb;
        }

        .estadisticas {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .stat-label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 27px;
            font-weight: 700;
            color: #111827;
        }

        .tabla-contenedor {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .tabla-header {
            padding: 18px 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        .tabla-header h2 {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
            color: #111827;
        }

        .tabla-scroll {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f9fafb;
            color: #374151;
            font-size: 12px;
            font-weight: 700;
            text-align: left;
            padding: 13px 15px;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        td {
            padding: 14px 15px;
            border-bottom: 1px solid #f1f5f9;
            color: #374151;
            font-size: 13px;
            white-space: nowrap;
        }

        tbody tr:hover {
            background: #f9fafb;
        }

        .codigo {
            font-weight: 600;
            color: #111827;
        }

        .stock {
            font-weight: 700;
        }

        .estado {
            display: inline-flex;
            align-items: center;
            padding: 5px 9px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 700;
        }

        .estado-disponible {
            background: #dcfce7;
            color: #166534;
        }

        .estado-bajo {
            background: #fef3c7;
            color: #92400e;
        }

        .estado-agotado {
            background: #fee2e2;
            color: #991b1b;
        }

        .sin-resultados {
            text-align: center;
            padding: 45px 20px;
            color: #6b7280;
            font-size: 14px;
        }

        @media (max-width: 1000px) {
            .estadisticas {
                grid-template-columns: repeat(2, 1fr);
            }

            .filtros-grid {
                grid-template-columns: 1fr 1fr;
            }

            .botones-filtro {
                grid-column: 1 / -1;
            }
        }

        @media (max-width: 700px) {
            .reporte-container {
                padding: 20px 15px;
            }

            .reporte-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .estadisticas {
                grid-template-columns: 1fr;
            }

            .filtros-grid {
                grid-template-columns: 1fr;
            }

            .botones-filtro {
                grid-column: auto;
            }
        }
    </style>

    <div class="reporte-container">

        {{-- ENCABEZADO --}}
        <div class="reporte-header">

            <div class="reporte-titulo">
                <h1>Reporte de Inventario</h1>
                <p>Consulta el estado actual del inventario del supermercado.</p>
            </div>

            <a
                href="{{ route('reportes.inventario.imprimir', [
                    'categoria_id' => $categoriaId,
                    'estado_stock' => $estadoStock
                ]) }}"
                target="_blank"
                class="btn-imprimir"
            >
                <svg
                    width="17"
                    height="17"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M6 9V2h12v7"/>
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                    <path d="M6 14h12v8H6z"/>
                </svg>

                Imprimir reporte
            </a>

        </div>


        {{-- FILTROS --}}
        <div class="filtros">

            <form
                method="GET"
                action="{{ route('reportes.inventario') }}"
            >

                <div class="filtros-grid">

                    <div class="campo">

                        <label for="categoria_id">
                            Categoría
                        </label>

                        <select
                            name="categoria_id"
                            id="categoria_id"
                        >

                            <option value="">
                                Todas las categorías
                            </option>

                            @foreach ($categorias as $categoria)

                                <option
                                    value="{{ $categoria->id }}"
                                    {{ (string) $categoriaId === (string) $categoria->id ? 'selected' : '' }}
                                >
                                    {{ $categoria->nombre }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    <div class="campo">

                        <label for="estado_stock">
                            Estado del stock
                        </label>

                        <select
                            name="estado_stock"
                            id="estado_stock"
                        >

                            <option value="">
                                Todos los estados
                            </option>

                            <option
                                value="DISPONIBLE"
                                {{ $estadoStock === 'DISPONIBLE' ? 'selected' : '' }}
                            >
                                Disponible
                            </option>

                            <option
                                value="STOCK BAJO"
                                {{ $estadoStock === 'STOCK BAJO' ? 'selected' : '' }}
                            >
                                Stock bajo
                            </option>

                            <option
                                value="AGOTADO"
                                {{ $estadoStock === 'AGOTADO' ? 'selected' : '' }}
                            >
                                Agotado
                            </option>

                        </select>

                    </div>


                    <div class="botones-filtro">

                        <button
                            type="submit"
                            class="btn-filtrar"
                        >
                            Filtrar
                        </button>

                        <a
                            href="{{ route('reportes.inventario') }}"
                            class="btn-limpiar"
                        >
                            Limpiar
                        </a>

                    </div>

                </div>

            </form>

        </div>


        {{-- ESTADÍSTICAS --}}
        <div class="estadisticas">

            <div class="stat-card">

                <div class="stat-label">
                    Productos
                </div>

                <div class="stat-value">
                    {{ $totalProductos }}
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Unidades en stock
                </div>

                <div class="stat-value">
                    {{ number_format($totalUnidades) }}
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Stock bajo
                </div>

                <div class="stat-value">
                    {{ $productosStockBajo }}
                </div>

            </div>


            <div class="stat-card">

                <div class="stat-label">
                    Agotados
                </div>

                <div class="stat-value">
                    {{ $productosAgotados }}
                </div>

            </div>

        </div>


        {{-- TABLA --}}
        <div class="tabla-contenedor">

            <div class="tabla-header">

                <h2>
                    Detalle del inventario
                </h2>

            </div>


            <div class="tabla-scroll">

                <table>

                    <thead>

                        <tr>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Proveedor</th>
                            <th>Stock</th>
                            <th>Stock mínimo</th>
                            <th>Precio compra</th>
                            <th>Precio venta</th>
                            <th>Estado</th>
                        </tr>

                    </thead>


                    <tbody>

                        @forelse ($productos as $producto)

                            <tr>

                                <td class="codigo">
                                    {{ $producto->codigo }}
                                </td>

                                <td>
                                    {{ $producto->nombre }}
                                </td>

                                <td>
                                    {{ $producto->categoria?->nombre ?? 'Sin categoría' }}
                                </td>

                                <td>
                                    {{ $producto->proveedor?->nombre ?? 'Sin proveedor' }}
                                </td>

                                <td class="stock">
                                    {{ number_format($producto->stock) }}
                                </td>

                                <td>
                                    {{ number_format($producto->stock_minimo) }}
                                </td>

                                <td>
                                    L {{ number_format($producto->precio_compra, 2) }}
                                </td>

                                <td>
                                    L {{ number_format($producto->precio_venta, 2) }}
                                </td>

                                <td>

                                    @if ($producto->estado_stock === 'AGOTADO')

                                        <span class="estado estado-agotado">
                                            AGOTADO
                                        </span>

                                    @elseif ($producto->estado_stock === 'STOCK BAJO')

                                        <span class="estado estado-bajo">
                                            STOCK BAJO
                                        </span>

                                    @else

                                        <span class="estado estado-disponible">
                                            DISPONIBLE
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="9"
                                    class="sin-resultados"
                                >
                                    No se encontraron productos con los filtros seleccionados.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</x-app-layout>