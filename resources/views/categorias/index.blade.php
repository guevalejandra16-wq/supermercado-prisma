<x-app-layout>

    <style>

        .categorias-page {
            min-height: calc(100vh - 78px);
            background: #f4f7fb;
            padding: 32px;
        }

        .categorias-container {
            max-width: 1450px;
            margin: 0 auto;
        }

        /* =========================
           ENCABEZADO
        ========================= */

        .categorias-header {
            background: #0f1b35;
            border-radius: 18px;
            padding: 30px 32px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 20px;
            margin-bottom: 28px;

            box-shadow:
                0 10px 30px rgba(15, 27, 53, .12);
        }

        .categorias-label {
            color: #8ea7ff;
            font-size: 13px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            margin-bottom: 5px;
        }

        .categorias-header h1 {
            margin: 0;
            color: #fff;
            font-size: 30px;
            font-weight: 800;
        }

        .categorias-header p {
            margin: 7px 0 0;
            color: #b7c3da;
            font-size: 14px;
        }

        /* =========================
           BOTÓN PRINCIPAL
        ========================= */

        .btn-nueva-categoria {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 9px;

            padding: 13px 20px;

            border-radius: 10px;

            background: #2563eb;
            color: white;

            text-decoration: none;

            font-size: 14px;
            font-weight: 700;

            white-space: nowrap;

            transition: all .2s ease;
        }

        .btn-nueva-categoria:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        /* =========================
           ALERTAS
        ========================= */

        .alerta {
            padding: 14px 18px;
            border-radius: 11px;
            margin-bottom: 22px;

            font-size: 14px;
            font-weight: 600;
        }

        .alerta-success {
            background: #ecfdf5;
            border: 1px solid #bbf7d0;
            color: #15803d;
        }

        .alerta-error {
            background: #fff1f2;
            border: 1px solid #fecdd3;
            color: #be123c;
        }

        /* =========================
           ESTADÍSTICAS
        ========================= */

        .categorias-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 28px;
        }

        .categoria-stat {
            background: white;

            border: 1px solid #e3e8f0;
            border-radius: 16px;

            padding: 22px;

            display: flex;
            align-items: center;
            justify-content: space-between;

            box-shadow:
                0 5px 18px rgba(15, 27, 53, .05);
        }

        .categoria-stat-info span {
            display: block;
            color: #71809a;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .categoria-stat-info strong {
            display: block;
            color: #111c33;
            font-size: 30px;
            line-height: 1;
            font-weight: 800;
        }

        .categoria-stat-icon {
            width: 52px;
            height: 52px;

            border-radius: 14px;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .icon-blue {
            background: #eaf1ff;
            color: #2563eb;
        }

        .icon-green {
            background: #e8f8f0;
            color: #059669;
        }

        .icon-purple {
            background: #f3eefe;
            color: #7c3aed;
        }

        /* =========================
           TABLA
        ========================= */

        .categorias-card {
            background: white;

            border: 1px solid #e3e8f0;
            border-radius: 18px;

            overflow: hidden;

            box-shadow:
                0 7px 24px rgba(15, 27, 53, .06);
        }

        .categorias-card-header {
            padding: 22px 25px;

            border-bottom: 1px solid #e7ebf1;

            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .categorias-card-header h2 {
            margin: 0;

            color: #111c33;

            font-size: 18px;
            font-weight: 750;
        }

        .categorias-card-header p {
            margin: 5px 0 0;

            color: #71809a;

            font-size: 13px;
        }

        .categorias-count {
            background: #eef4ff;
            color: #2563eb;

            padding: 8px 13px;

            border-radius: 20px;

            font-size: 13px;
            font-weight: 700;

            white-space: nowrap;
        }

        .categorias-table-wrapper {
            overflow-x: auto;
        }

        .categorias-table {
            width: 100%;
            min-width: 800px;

            border-collapse: collapse;
        }

        .categorias-table th {
            background: #f8fafc;

            color: #64748b;

            font-size: 11px;
            font-weight: 800;

            text-transform: uppercase;
            letter-spacing: .5px;

            padding: 15px 20px;

            text-align: left;

            border-bottom: 1px solid #e7ebf1;
        }

        .categorias-table td {
            padding: 17px 20px;

            border-bottom: 1px solid #edf0f4;

            color: #475569;

            font-size: 14px;

            vertical-align: middle;
        }

        .categorias-table tbody tr {
            transition: background .15s ease;
        }

        .categorias-table tbody tr:hover {
            background: #f8fafc;
        }

        .categorias-table tbody tr:last-child td {
            border-bottom: none;
        }

        /* =========================
           CONTENIDO DE TABLA
        ========================= */

        .categoria-id {
            color: #94a3b8;
            font-size: 13px;
            font-weight: 600;
        }

        .categoria-nombre {
            color: #172033;
            font-weight: 750;
            font-size: 14px;
        }

        .categoria-descripcion {
            color: #71809a;
            max-width: 430px;
            line-height: 1.5;
        }

        .categoria-productos {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 34px;
            height: 30px;

            padding: 0 10px;

            border-radius: 8px;

            background: #eef4ff;
            color: #2563eb;

            font-size: 12px;
            font-weight: 800;
        }

        /* =========================
           ESTADOS
        ========================= */

        .categoria-badge {
            display: inline-flex;
            align-items: center;

            padding: 6px 11px;

            border-radius: 20px;

            font-size: 11px;
            font-weight: 800;
        }

        .categoria-activa {
            background: #dcfce7;
            color: #15803d;
        }

        .categoria-inactiva {
            background: #f1f5f9;
            color: #64748b;
        }

        /* =========================
           ACCIONES
        ========================= */

        .categoria-actions {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 7px;
        }

        .categoria-action {
            width: 36px;
            height: 36px;

            border: none;
            border-radius: 9px;

            display: inline-flex;
            align-items: center;
            justify-content: center;

            cursor: pointer;

            text-decoration: none;

            transition: all .15s ease;
        }

        .categoria-action:hover {
            transform: translateY(-1px);
        }

        .action-ver {
            background: #eff6ff;
            color: #2563eb;
        }

        .action-ver:hover {
            background: #dbeafe;
        }

        .action-editar {
            background: #f5f3ff;
            color: #7c3aed;
        }

        .action-editar:hover {
            background: #ede9fe;
        }

        .action-eliminar {
            background: #fff1f2;
            color: #dc2626;
        }

        .action-eliminar:hover {
            background: #ffe4e6;
        }

        /* =========================
           VACÍO
        ========================= */

        .categorias-empty {
            padding: 70px 25px;

            text-align: center;
        }

        .categorias-empty-icon {
            width: 64px;
            height: 64px;

            margin: 0 auto 18px;

            border-radius: 16px;

            background: #eaf1ff;
            color: #2563eb;

            display: flex;
            align-items: center;
            justify-content: center;
        }

        .categorias-empty h3 {
            margin: 0;

            color: #172033;

            font-size: 18px;
            font-weight: 750;
        }

        .categorias-empty p {
            margin: 7px 0 20px;

            color: #71809a;

            font-size: 13px;
        }

        .btn-empty {
            display: inline-flex;
            align-items: center;
            gap: 8px;

            background: #2563eb;
            color: white;

            padding: 10px 17px;

            border-radius: 9px;

            text-decoration: none;

            font-size: 13px;
            font-weight: 700;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .categorias-page {
                padding: 20px;
            }

            .categorias-stats {
                grid-template-columns: 1fr;
            }

            .categorias-header {
                align-items: flex-start;
                flex-direction: column;
            }

        }

        @media (max-width: 600px) {

            .categorias-page {
                padding: 14px;
            }

            .categorias-header {
                padding: 22px;
            }

            .categorias-header h1 {
                font-size: 25px;
            }

            .categorias-card-header {
                padding: 18px;
            }

        }

    </style>


    <div class="categorias-page">

        <div class="categorias-container">


            {{-- MENSAJE DE ÉXITO --}}

            @if(session('success'))

                <div class="alerta alerta-success">
                    {{ session('success') }}
                </div>

            @endif


            {{-- MENSAJE DE ERROR --}}

            @if(session('error'))

                <div class="alerta alerta-error">
                    {{ session('error') }}
                </div>

            @endif


            {{-- =========================
                 ENCABEZADO
            ========================== --}}

            <div class="categorias-header">

                <div>

                    <div class="categorias-label">
                        Supermercado Prisma
                    </div>

                    <h1>
                        Categorías
                    </h1>

                    <p>
                        Organiza y administra las categorías de productos del supermercado.
                    </p>

                </div>


                @if(auth()->user()->hasPrivilege('categorias.crear'))

                    <a
                        href="{{ route('categorias.create') }}"
                        class="btn-nueva-categoria"
                    >

                        <svg
                            width="18"
                            height="18"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >

                            <path d="M12 5v14"/>
                            <path d="M5 12h14"/>

                        </svg>

                        Nueva categoría

                    </a>

                @endif

            </div>


            {{-- =========================
                 ESTADÍSTICAS
            ========================== --}}

            @php

                $totalCategorias = $categorias->count();

                $categoriasActivas = $categorias
                    ->where('estado', true)
                    ->count();

                $totalProductosCategorias = $categorias
                    ->sum(function ($categoria) {
                        return $categoria->productos->count();
                    });

            @endphp


            <div class="categorias-stats">


                {{-- TOTAL --}}

                <div class="categoria-stat">

                    <div class="categoria-stat-info">

                        <span>
                            Categorías registradas
                        </span>

                        <strong>
                            {{ $totalCategorias }}
                        </strong>

                    </div>


                    <div class="categoria-stat-icon icon-blue">

                        <svg
                            width="26"
                            height="26"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            viewBox="0 0 24 24"
                        >

                            <path
                                d="M20 13l-7 7-9-9V4h7l9 9Z"
                            />

                            <circle
                                cx="7"
                                cy="7"
                                r="1.2"
                            />

                        </svg>

                    </div>

                </div>


                {{-- ACTIVAS --}}

                <div class="categoria-stat">

                    <div class="categoria-stat-info">

                        <span>
                            Categorías activas
                        </span>

                        <strong>
                            {{ $categoriasActivas }}
                        </strong>

                    </div>


                    <div class="categoria-stat-icon icon-green">

                        <svg
                            width="26"
                            height="26"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            viewBox="0 0 24 24"
                        >

                            <path
                                d="M20 6 9 17l-5-5"
                            />

                        </svg>

                    </div>

                </div>


                {{-- PRODUCTOS --}}

                <div class="categoria-stat">

                    <div class="categoria-stat-info">

                        <span>
                            Productos organizados
                        </span>

                        <strong>
                            {{ $totalProductosCategorias }}
                        </strong>

                    </div>


                    <div class="categoria-stat-icon icon-purple">

                        <svg
                            width="26"
                            height="26"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="1.8"
                            viewBox="0 0 24 24"
                        >

                            <path
                                d="M21 8.5 12 4 3 8.5v7L12 20l9-4.5v-7Z"
                            />

                            <path
                                d="M3 8.5 12 13l9-4.5"
                            />

                            <path
                                d="M12 13v7"
                            />

                        </svg>

                    </div>

                </div>


            </div>


            {{-- =========================
                 TABLA
            ========================== --}}

            <div class="categorias-card">


                <div class="categorias-card-header">

                    <div>

                        <h2>
                            Listado de categorías
                        </h2>

                        <p>
                            Categorías disponibles para organizar los productos de Prisma.
                        </p>

                    </div>


                    <div class="categorias-count">

                        {{ $totalCategorias }}

                        {{ $totalCategorias == 1 ? 'categoría' : 'categorías' }}

                    </div>

                </div>


                @if($totalCategorias > 0)


                    <div class="categorias-table-wrapper">

                        <table class="categorias-table">

                            <thead>

                                <tr>

                                    <th>
                                        #
                                    </th>

                                    <th>
                                        Categoría
                                    </th>

                                    <th>
                                        Descripción
                                    </th>

                                    <th style="text-align:center;">
                                        Productos
                                    </th>

                                    <th style="text-align:center;">
                                        Estado
                                    </th>

                                    <th style="text-align:center;">
                                        Acciones
                                    </th>

                                </tr>

                            </thead>


                            <tbody>

                                @foreach($categorias as $categoria)

                                    <tr>


                                        {{-- ID --}}

                                        <td>

                                            <span class="categoria-id">
                                                #{{ $categoria->id }}
                                            </span>

                                        </td>


                                        {{-- NOMBRE --}}

                                        <td>

                                            <span class="categoria-nombre">
                                                {{ $categoria->nombre }}
                                            </span>

                                        </td>


                                        {{-- DESCRIPCIÓN --}}

                                        <td>

                                            <span class="categoria-descripcion">

                                                {{ $categoria->descripcion ?: 'Sin descripción' }}

                                            </span>

                                        </td>


                                        {{-- PRODUCTOS --}}

                                        <td style="text-align:center;">

                                            <span class="categoria-productos">

                                                {{ $categoria->productos->count() }}

                                            </span>

                                        </td>


                                        {{-- ESTADO --}}

                                        <td style="text-align:center;">

                                            @if($categoria->estado)

                                                <span class="categoria-badge categoria-activa">

                                                    ACTIVA

                                                </span>

                                            @else

                                                <span class="categoria-badge categoria-inactiva">

                                                    INACTIVA

                                                </span>

                                            @endif

                                        </td>


                                        {{-- ACCIONES --}}

                                        <td>

                                            <div class="categoria-actions">


                                                {{-- VER --}}

                                                @if(auth()->user()->hasPrivilege('categorias.ver'))

                                                    <a
                                                        href="{{ route('categorias.show', $categoria) }}"
                                                        class="categoria-action action-ver"
                                                        title="Ver categoría"
                                                    >

                                                        <svg
                                                            width="17"
                                                            height="17"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="1.8"
                                                            viewBox="0 0 24 24"
                                                        >

                                                            <path
                                                                d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"
                                                            />

                                                            <circle
                                                                cx="12"
                                                                cy="12"
                                                                r="3"
                                                            />

                                                        </svg>

                                                    </a>

                                                @endif


                                                {{-- EDITAR --}}

                                                @if(auth()->user()->hasPrivilege('categorias.editar'))

                                                    <a
                                                        href="{{ route('categorias.edit', $categoria) }}"
                                                        class="categoria-action action-editar"
                                                        title="Editar categoría"
                                                    >

                                                        <svg
                                                            width="17"
                                                            height="17"
                                                            fill="none"
                                                            stroke="currentColor"
                                                            stroke-width="1.8"
                                                            viewBox="0 0 24 24"
                                                        >

                                                            <path d="M12 20h9"/>

                                                            <path
                                                                d="M16.5 3.5a2.1 2.1 0 0 1 3 3L8 18l-4 1 1-4Z"
                                                            />

                                                        </svg>

                                                    </a>

                                                @endif


                                                {{-- ELIMINAR --}}

                                                @if(auth()->user()->hasPrivilege('categorias.eliminar'))

                                                    <form
                                                        action="{{ route('categorias.destroy', $categoria) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?');"
                                                    >

                                                        @csrf

                                                        @method('DELETE')


                                                        <button
                                                            type="submit"
                                                            class="categoria-action action-eliminar"
                                                            title="Eliminar categoría"
                                                        >

                                                            <svg
                                                                width="17"
                                                                height="17"
                                                                fill="none"
                                                                stroke="currentColor"
                                                                stroke-width="1.8"
                                                                viewBox="0 0 24 24"
                                                            >

                                                                <path d="M3 6h18"/>

                                                                <path
                                                                    d="M8 6V4h8v2"
                                                                />

                                                                <path
                                                                    d="M19 6l-1 14H6L5 6"
                                                                />

                                                                <path d="M10 11v5"/>

                                                                <path d="M14 11v5"/>

                                                            </svg>

                                                        </button>

                                                    </form>

                                                @endif


                                            </div>

                                        </td>


                                    </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>


                @else


                    {{-- =========================
                         ESTADO VACÍO
                    ========================== --}}

                    <div class="categorias-empty">


                        <div class="categorias-empty-icon">

                            <svg
                                width="31"
                                height="31"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="1.7"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    d="M20 13l-7 7-9-9V4h7l9 9Z"
                                />

                                <circle
                                    cx="7"
                                    cy="7"
                                    r="1.2"
                                />

                            </svg>

                        </div>


                        <h3>
                            No hay categorías registradas
                        </h3>


                        <p>
                            Comienza creando la primera categoría para organizar tus productos.
                        </p>


                        @if(auth()->user()->hasPrivilege('categorias.crear'))

                            <a
                                href="{{ route('categorias.create') }}"
                                class="btn-empty"
                            >

                                <svg
                                    width="17"
                                    height="17"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                >

                                    <path d="M12 5v14"/>
                                    <path d="M5 12h14"/>

                                </svg>

                                Nueva categoría

                            </a>

                        @endif


                    </div>

                @endif


            </div>


        </div>

    </div>


</x-app-layout>