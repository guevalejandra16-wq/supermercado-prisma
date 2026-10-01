<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Reporte de Inventario - Prisma</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 30px;
            font-family: Arial, Helvetica, sans-serif;
            color: #111827;
            background: white;
        }

        .reporte {
            max-width: 1200px;
            margin: 0 auto;
        }

        .encabezado {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid #111827;
            padding-bottom: 18px;
            margin-bottom: 20px;
        }

        .empresa h1 {
            margin: 0;
            font-size: 25px;
            font-weight: 700;
        }

        .empresa p {
            margin: 5px 0 0;
            color: #6b7280;
            font-size: 13px;
        }

        .titulo {
            text-align: right;
        }

        .titulo h2 {
            margin: 0;
            font-size: 20px;
        }

        .titulo p {
            margin: 5px 0 0;
            color: #6b7280;
            font-size: 12px;
        }

        .resumen {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 12px;
            margin-bottom: 22px;
        }

        .resumen-card {
            border: 1px solid #d1d5db;
            border-radius: 7px;
            padding: 13px;
        }

        .resumen-card span {
            display: block;
            color: #6b7280;
            font-size: 11px;
            margin-bottom: 5px;
        }

        .resumen-card strong {
            font-size: 18px;
        }

        .filtros {
            margin-bottom: 18px;
            font-size: 12px;
            color: #4b5563;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f3f4f6;
            border: 1px solid #d1d5db;
            padding: 9px 7px;
            text-align: left;
            font-size: 10px;
            font-weight: 700;
        }

        td {
            border: 1px solid #e5e7eb;
            padding: 8px 7px;
            font-size: 10px;
        }

        .numero {
            text-align: center;
        }

        .precio {
            text-align: right;
        }

        .estado {
            font-weight: 700;
            text-align: center;
        }

        .agotado {
            color: #991b1b;
        }

        .bajo {
            color: #92400e;
        }

        .disponible {
            color: #166534;
        }

        .pie {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #d1d5db;
            display: flex;
            justify-content: space-between;
            color: #6b7280;
            font-size: 10px;
        }

        @media print {

            body {
                padding: 10px;
            }

            .reporte {
                max-width: none;
            }

            @page {
                size: landscape;
                margin: 12mm;
            }

        }

    </style>

</head>


<body>

    <div class="reporte">

        {{-- ENCABEZADO --}}

        <div class="encabezado">

            <div class="empresa">

                <h1>Supermercado Prisma</h1>

                <p>
                    Todo lo que necesitas, en un solo lugar.
                </p>

            </div>


            <div class="titulo">

                <h2>
                    Reporte de Inventario
                </h2>

                <p>
                    Fecha:
                    {{ now()->format('d/m/Y H:i') }}
                </p>

            </div>

        </div>


        {{-- RESUMEN --}}

        <div class="resumen">

            <div class="resumen-card">

                <span>
                    Productos
                </span>

                <strong>
                    {{ $totalProductos }}
                </strong>

            </div>


            <div class="resumen-card">

                <span>
                    Unidades en stock
                </span>

                <strong>
                    {{ number_format($totalUnidades) }}
                </strong>

            </div>


            <div class="resumen-card">

                <span>
                    Stock bajo
                </span>

                <strong>
                    {{ $productosStockBajo }}
                </strong>

            </div>


            <div class="resumen-card">

                <span>
                    Productos agotados
                </span>

                <strong>
                    {{ $productosAgotados }}
                </strong>

            </div>

        </div>


        {{-- FILTROS APLICADOS --}}

        @if ($categoriaId || $estadoStock)

            <div class="filtros">

                <strong>
                    Filtros aplicados:
                </strong>

                @if ($categoriaId)

                    Categoría:
                    {{ \App\Models\Categoria::find($categoriaId)?->nombre ?? 'No encontrada' }}

                @endif

                @if ($categoriaId && $estadoStock)
                    |
                @endif

                @if ($estadoStock)

                    Estado:
                    {{ $estadoStock }}

                @endif

            </div>

        @endif


        {{-- TABLA --}}

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
                        Proveedor
                    </th>

                    <th>
                        Stock
                    </th>

                    <th>
                        Stock mínimo
                    </th>

                    <th>
                        Precio compra
                    </th>

                    <th>
                        Precio venta
                    </th>

                    <th>
                        Estado
                    </th>

                </tr>

            </thead>


            <tbody>

                @forelse ($productos as $producto)

                    <tr>

                        <td>
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

                        <td class="numero">
                            {{ number_format($producto->stock) }}
                        </td>

                        <td class="numero">
                            {{ number_format($producto->stock_minimo) }}
                        </td>

                        <td class="precio">
                            L {{ number_format($producto->precio_compra, 2) }}
                        </td>

                        <td class="precio">
                            L {{ number_format($producto->precio_venta, 2) }}
                        </td>

                        <td class="estado">

                            @if ($producto->estado_stock === 'AGOTADO')

                                <span class="agotado">
                                    AGOTADO
                                </span>

                            @elseif ($producto->estado_stock === 'STOCK BAJO')

                                <span class="bajo">
                                    STOCK BAJO
                                </span>

                            @else

                                <span class="disponible">
                                    DISPONIBLE
                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="9"
                            style="text-align: center; padding: 25px;"
                        >
                            No se encontraron productos.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>


        {{-- PIE --}}

        <div class="pie">

            <span>
                Supermercado Prisma
            </span>

            <span>
                Reporte generado automáticamente
            </span>

        </div>

    </div>


    <script>
        window.onload = function () {
            window.print();
        };
    </script>

</body>

</html>