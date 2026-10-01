<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Supermercado Prisma</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #172033;
        }

        .dashboard-wrapper {
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: linear-gradient(180deg, #14264a 0%, #0d1b36 100%);
            color: white;
            padding: 24px 16px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            overflow-y: auto;
            z-index: 50;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 4px 12px 28px;
            border-bottom: 1px solid rgba(255,255,255,.12);
            margin-bottom: 20px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-icon svg {
            width: 25px;
            height: 25px;
        }

        .brand-title {
            font-size: 20px;
            font-weight: 800;
            line-height: 1.1;
        }

        .brand-subtitle {
            font-size: 12px;
            color: #aebbd2;
            margin-top: 3px;
        }

        .menu-title {
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 1.3px;
            color: #8191af;
            padding: 0 12px;
            margin: 18px 0 8px;
        }

        .menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #d9e2f2;
            text-decoration: none;
            padding: 11px 12px;
            border-radius: 10px;
            font-size: 14px;
            transition: .2s ease;
        }

        .menu-link:hover {
            background: rgba(255,255,255,.08);
            color: white;
        }

        .menu-link.active {
            background: #2563eb;
            color: white;
            box-shadow: 0 8px 18px rgba(37,99,235,.25);
        }

        .menu-link svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        .menu-arrow {
            margin-left: auto;
            width: 15px !important;
            height: 15px !important;
            opacity: .7;
        }

        .sidebar-bottom {
            margin-top: 30px;
            padding-top: 18px;
            border-top: 1px solid rgba(255,255,255,.12);
        }

        .logout-button {
            width: 100%;
            border: none;
            background: transparent;
            color: #d9e2f2;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 12px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 14px;
            text-align: left;
        }

        .logout-button:hover {
            background: rgba(239,68,68,.15);
            color: #fecaca;
        }

        .logout-button svg {
            width: 20px;
            height: 20px;
        }

        /* CONTENIDO */

        .main-content {
            width: calc(100% - 260px);
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            height: 76px;
            background: white;
            border-bottom: 1px solid #e5eaf1;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 32px;
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 9px;
            font-size: 14px;
            color: #71809a;
        }

        .breadcrumb strong {
            color: #172033;
        }

        .breadcrumb svg {
            width: 15px;
            height: 15px;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #2563eb;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        .user-info {
            line-height: 1.2;
        }

        .user-name {
            font-size: 14px;
            font-weight: 700;
            color: #172033;
        }

        .user-role {
            font-size: 11px;
            color: #7b8494;
            margin-top: 3px;
        }

        .content {
            padding: 30px 32px 45px;
        }

        /* BIENVENIDA */

        .welcome {
            min-height: 160px;
            border-radius: 18px;
            padding: 30px 34px;
            margin-bottom: 26px;
            background:
                linear-gradient(
                    90deg,
                    #edf5ff 0%,
                    #f5f9ff 50%,
                    #e8f0ff 100%
                );
            border: 1px solid #dce8fa;
            position: relative;
            overflow: hidden;
        }

        .welcome::after {
            content: "";
            position: absolute;
            width: 270px;
            height: 270px;
            border-radius: 50%;
            background: rgba(37,99,235,.07);
            right: -80px;
            top: -90px;
        }

        .welcome-small {
            color: #2563eb;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .welcome h1 {
            margin: 0;
            font-size: 34px;
            font-weight: 800;
            color: #12213e;
        }

        .welcome p {
            margin: 7px 0 0;
            color: #667895;
            font-size: 15px;
        }

        /* TARJETAS */

        .cards-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
        }

        .stat-card {
            background: white;
            border: 1px solid #e5eaf1;
            border-radius: 17px;
            padding: 20px;
            min-height: 190px;
            display: flex;
            flex-direction: column;
            box-shadow: 0 5px 18px rgba(26,43,75,.04);
            transition: .2s ease;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(26,43,75,.09);
        }

        .card-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .card-icon {
            width: 48px;
            height: 48px;
            border-radius: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .card-icon svg {
            width: 24px;
            height: 24px;
        }

        .blue {
            background: #e8f0ff;
            color: #2563eb;
        }

        .green {
            background: #e6f8ef;
            color: #16a36a;
        }

        .purple {
            background: #f0eaff;
            color: #7c3aed;
        }

        .orange {
            background: #fff1e4;
            color: #ea6a00;
        }

        .yellow {
            background: #fff7d9;
            color: #d99b00;
        }

        .cyan {
            background: #e4f8fc;
            color: #0891b2;
        }

        .red {
            background: #ffe9ed;
            color: #e11d48;
        }

        .gray {
            background: #eef1f5;
            color: #526174;
        }

        .card-title {
            font-size: 16px;
            font-weight: 700;
            color: #172033;
            margin-top: 2px;
        }

        .card-number {
            font-size: 30px;
            font-weight: 800;
            color: #172033;
            margin-top: 17px;
        }

        .card-description {
            color: #73829b;
            font-size: 13px;
            margin-top: 3px;
        }

        .card-button {
            margin-top: auto;
            padding-top: 15px;
        }

        .card-button a {
            display: flex;
            align-items: center;
            justify-content: space-between;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            padding: 9px 11px;
            border-radius: 10px;
            transition: .2s ease;
        }

        .card-button a:hover {
            filter: brightness(.96);
        }

        .button-blue {
            background: #edf4ff;
            color: #2563eb;
        }

        .button-green {
            background: #eaf9f1;
            color: #159669;
        }

        .button-purple {
            background: #f3edff;
            color: #7c3aed;
        }

        .button-orange {
            background: #fff2e7;
            color: #df6900;
        }

        .button-yellow {
            background: #fff8df;
            color: #c18a00;
        }

        .button-cyan {
            background: #e8f9fc;
            color: #0891b2;
        }

        .button-red {
            background: #ffedf0;
            color: #e11d48;
        }

        .button-gray {
            background: #f0f2f5;
            color: #526174;
        }

        .button-arrow {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: currentColor;
            color: white;
        }

        .button-arrow svg {
            width: 14px;
            height: 14px;
        }

        /* RESPONSIVE */

        @media (max-width: 1200px) {
            .cards-grid {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 900px) {
            .sidebar {
                width: 220px;
            }

            .main-content {
                width: calc(100% - 220px);
                margin-left: 220px;
            }

            .cards-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 650px) {
            .sidebar {
                position: relative;
                width: 100%;
                min-height: auto;
            }

            .main-content {
                width: 100%;
                margin-left: 0;
            }

            .dashboard-wrapper {
                display: block;
            }

            .cards-grid {
                grid-template-columns: 1fr;
            }

            .topbar {
                padding: 0 18px;
            }

            .content {
                padding: 20px 16px;
            }
        }
    </style>
</head>

<body>

<div class="dashboard-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="brand">

            <div class="brand-icon">
                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="M3 3h2l2.4 11.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L21 7H6"/>
                    <circle cx="10" cy="20" r="1"/>
                    <circle cx="18" cy="20" r="1"/>
                </svg>
            </div>

            <div>
                <div class="brand-title">Prisma</div>
                <div class="brand-subtitle">Supermercado</div>
            </div>

        </div>

        <div class="menu-title">Principal</div>

        <nav class="menu">

            <a href="{{ route('dashboard') }}"
               class="menu-link active">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="M3 11.5 12 4l9 7.5"/>
                    <path d="M5 10v10h14V10"/>
                    <path d="M9 20v-6h6v6"/>
                </svg>

                Dashboard

            </a>

            @if (auth()->user()->hasPrivilege('productos.ver'))

            <a href="{{ route('productos.index') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z"/>
                    <path d="m4 7.5 8 4.5 8-4.5"/>
                    <path d="M12 12v9"/>
                </svg>

                Productos

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m9 18 6-6-6-6"/>
                </svg>

            </a>

            @endif

            @if (auth()->user()->hasPrivilege('clientes.ver'))

            <a href="{{ route('clientes.index') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <circle cx="9" cy="8" r="3"/>
                    <path d="M3 20a6 6 0 0 1 12 0"/>
                    <circle cx="17" cy="9" r="2.5"/>
                    <path d="M15 15a5 5 0 0 1 6 5"/>
                </svg>

                Clientes

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m9 18 6-6-6-6"/>
                </svg>

            </a>

            @endif

            @if (auth()->user()->hasPrivilege('proveedores.ver'))

            <a href="{{ route('proveedores.index') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="M3 21V8l9-5 9 5v13"/>
                    <path d="M7 21v-6h10v6"/>
                    <path d="M9 10h6"/>
                </svg>

                Proveedores

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m9 18 6-6-6-6"/>
                </svg>

            </a>

            @endif

            @if (auth()->user()->hasPrivilege('inventario.ver'))

            <a href="{{ route('inventario.index') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <ellipse cx="12" cy="5" rx="7" ry="3"/>
                    <path d="M5 5v7c0 1.7 3.1 3 7 3s7-1.3 7-3V5"/>
                    <path d="M5 12v7c0 1.7 3.1 3 7 3s7-1.3 7-3v-7"/>
                </svg>

                Inventario

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m9 18 6-6-6-6"/>
                </svg>

            </a>

            @endif

            @if (auth()->user()->hasPrivilege('categorias.ver'))

            <a href="{{ route('categorias.index') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="m20 13-7 7-9-9V4h7l9 9Z"/>
                    <circle cx="7.5" cy="7.5" r="1"/>
                </svg>

                Categorías

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m9 18 6-6-6-6"/>
                </svg>

            </a>

            @endif

        </nav>

        <div class="menu-title">Operaciones</div>

        <nav class="menu">

            @if (auth()->user()->hasPrivilege('compras.ver'))

            <a href="{{ route('compras.index') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="M6 3h12v18H6z"/>
                    <path d="M9 7h6M9 11h6M9 15h4"/>
                </svg>

                Compras

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m9 18 6-6-6-6"/>
                </svg>

            </a>

            @endif

            @if (auth()->user()->hasPrivilege('ventas.ver'))

            <a href="{{ route('ventas.index') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="M3 4h2l2.5 12h10L20 8H6"/>
                    <circle cx="10" cy="20" r="1"/>
                    <circle cx="17" cy="20" r="1"/>
                </svg>

                Ventas

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m9 18 6-6-6-6"/>
                </svg>

            </a>

            @endif

            @if (auth()->user()->hasPrivilege('facturas.ver'))

            <a href="{{ route('facturas.index') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="M6 3h12v18l-3-2-3 2-3-2-3 2V3Z"/>
                    <path d="M9 8h6M9 12h6M9 16h4"/>
                </svg>

                Facturas

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m9 18 6-6-6-6"/>
                </svg>

            </a>

            @endif

        </nav>

        <!-- REPORTES -->
        @if (
            auth()->user()->hasPrivilege('reportes.ventas') ||
            auth()->user()->hasPrivilege('reportes.compras') ||
            auth()->user()->hasPrivilege('reportes.inventario')
        )

        <div class="menu-title">Reportes</div>

        <nav class="menu">

            @if (auth()->user()->hasPrivilege('reportes.ventas'))

            <a href="{{ route('reportes.ventas') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">

                    <path d="M4 19V5"/>
                    <path d="M4 19h16"/>
                    <path d="m7 15 3-4 3 2 5-6"/>

                </svg>

                Reporte de ventas

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">

                    <path d="m9 18 6-6-6-6"/>

                </svg>

            </a>

            @endif


            @if (auth()->user()->hasPrivilege('reportes.compras'))

            <a href="{{ route('reportes.compras') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">

                    <path d="M6 3h12v18H6z"/>
                    <path d="M9 7h6M9 11h6M9 15h4"/>

                </svg>

                Reporte de compras

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">

                    <path d="m9 18 6-6-6-6"/>

                </svg>

            </a>

            @endif


            @if (auth()->user()->hasPrivilege('reportes.inventario'))

            <a href="{{ route('reportes.inventario') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">

                    <path d="M3 3h18v18H3z"/>
                    <path d="M7 7h10"/>
                    <path d="M7 11h10"/>
                    <path d="M7 15h6"/>

                </svg>

                Reporte de inventario

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">

                    <path d="m9 18 6-6-6-6"/>

                </svg>

            </a>

            @endif


        </nav>

        @endif


        <div class="menu-title">Administración</div>

        <nav class="menu">

            @if (auth()->user()->hasPrivilege('usuarios.ver'))

            <a href="{{ route('usuarios.index') }}" class="menu-link">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="8" r="3"/>
                    <path d="M5 21a7 7 0 0 1 14 0"/>
                </svg>

                Usuarios

                <svg class="menu-arrow" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2">
                    <path d="m9 18 6-6-6-6"/>
                </svg>

            </a>

            @endif

            @if (Route::has('roles.index') && auth()->user()->hasPrivilege('roles.ver'))
                <a href="{{ route('roles.index') }}" class="menu-link">

                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2">
                        <path d="M12 3 20 6v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6l8-3Z"/>
                        <path d="m9 12 2 2 4-4"/>
                    </svg>

                    Roles

                    <svg class="menu-arrow" viewBox="0 0 24 24"
                         fill="none" stroke="currentColor" stroke-width="2">
                        <path d="m9 18 6-6-6-6"/>
                    </svg>

                </a>
            @endif

        </nav>

        <div class="sidebar-bottom">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="logout-button">

                    <svg viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2">
                        <path d="M10 17l5-5-5-5"/>
                        <path d="M15 12H3"/>
                        <path d="M14 4h5v16h-5"/>
                    </svg>

                    Cerrar sesión

                </button>

            </form>

        </div>

    </aside>


    <!-- CONTENIDO PRINCIPAL -->

    <main class="main-content">

        <!-- TOPBAR -->

        <header class="topbar">

            <div class="breadcrumb">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="M3 11.5 12 4l9 7.5"/>
                    <path d="M5 10v10h14V10"/>
                </svg>

                <span>Inicio</span>

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2">
                    <path d="m9 18 6-6-6-6"/>
                </svg>

                <strong>Dashboard</strong>

            </div>

            <div class="user-area">

                <div class="user-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>

                <div class="user-info">

                    <div class="user-name">
                        {{ auth()->user()->name }}
                    </div>

                    <div class="user-role">
                        @if (method_exists(auth()->user(), 'roles'))
                            {{ optional(auth()->user()->roles()->first())->nombre ?? 'Usuario' }}
                        @else
                            Usuario
                        @endif
                    </div>

                </div>

            </div>

        </header>


        <!-- CONTENIDO -->

        <section class="content">

            <!-- BIENVENIDA -->

            <div class="welcome">

                <div class="welcome-small">
                    Bienvenido nuevamente
                </div>

                <h1>
                    {{ auth()->user()->name }}
                </h1>

                <p>
                    Administra las operaciones de Supermercado Prisma desde un solo lugar.
                </p>

            </div>


            <!-- ESTADÍSTICAS -->

            <div class="cards-grid">

                <!-- PRODUCTOS -->

                @if (auth()->user()->hasPrivilege('productos.ver'))



                <div class="stat-card">

                    <div class="card-top">

                        <div>
                            <div class="card-title">
                                Productos
                            </div>

                            <div class="card-number">
                                {{ \App\Models\Producto::count() }}
                            </div>

                            <div class="card-description">
                                Productos registrados
                            </div>
                        </div>

                        <div class="card-icon blue">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <path d="m12 3 8 4.5v9L12 21l-8-4.5v-9L12 3Z"/>
                                <path d="m4 7.5 8 4.5 8-4.5"/>
                                <path d="M12 12v9"/>
                            </svg>

                        </div>

                    </div>

                    <div class="card-button">

                        <a href="{{ route('productos.index') }}"
                           class="button-blue">

                            Ver productos

                            <span class="button-arrow">
                                →
                            </span>

                        </a>

                    </div>

                </div>


                
                @endif

<!-- CLIENTES -->

                @if (auth()->user()->hasPrivilege('clientes.ver'))



                <div class="stat-card">

                    <div class="card-top">

                        <div>

                            <div class="card-title">
                                Clientes
                            </div>

                            <div class="card-number">
                                {{ \App\Models\Cliente::count() }}
                            </div>

                            <div class="card-description">
                                Clientes registrados
                            </div>

                        </div>

                        <div class="card-icon green">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="8" r="3"/>
                                <path d="M3 20a6 6 0 0 1 12 0"/>
                                <circle cx="17" cy="9" r="2.5"/>
                                <path d="M15 15a5 5 0 0 1 6 5"/>
                            </svg>

                        </div>

                    </div>

                    <div class="card-button">

                        <a href="{{ route('clientes.index') }}"
                           class="button-green">

                            Ver clientes

                            <span class="button-arrow">
                                →
                            </span>

                        </a>

                    </div>

                </div>


                
                @endif

<!-- PROVEEDORES -->

                @if (auth()->user()->hasPrivilege('proveedores.ver'))



                <div class="stat-card">

                    <div class="card-top">

                        <div>

                            <div class="card-title">
                                Proveedores
                            </div>

                            <div class="card-number">
                                {{ \App\Models\Proveedor::count() }}
                            </div>

                            <div class="card-description">
                                Proveedores registrados
                            </div>

                        </div>

                        <div class="card-icon purple">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <path d="M3 21V8l9-5 9 5v13"/>
                                <path d="M7 21v-6h10v6"/>
                                <path d="M9 10h6"/>
                            </svg>

                        </div>

                    </div>

                    <div class="card-button">

                        <a href="{{ route('proveedores.index') }}"
                           class="button-purple">

                            Ver proveedores

                            <span class="button-arrow">
                                →
                            </span>

                        </a>

                    </div>

                </div>


                
                @endif

<!-- INVENTARIO -->

                @if (auth()->user()->hasPrivilege('inventario.ver'))



                <div class="stat-card">

                    <div class="card-top">

                        <div>

                            <div class="card-title">
                                Inventario
                            </div>

                            <div class="card-number">
                                {{ \App\Models\Producto::sum('stock') }}
                            </div>

                            <div class="card-description">
                                Unidades en inventario
                            </div>

                        </div>

                        <div class="card-icon orange">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <ellipse cx="12" cy="5" rx="7" ry="3"/>
                                <path d="M5 5v7c0 1.7 3.1 3 7 3s7-1.3 7-3V5"/>
                                <path d="M5 12v7c0 1.7 3.1 3 7 3s7-1.3 7-3v-7"/>
                            </svg>

                        </div>

                    </div>

                    <div class="card-button">

                        <a href="{{ route('inventario.index') }}"
                           class="button-orange">

                            Ver inventario

                            <span class="button-arrow">
                                →
                            </span>

                        </a>

                    </div>

                </div>


                
                @endif

<!-- CATEGORÍAS -->

                @if (auth()->user()->hasPrivilege('categorias.ver'))



                <div class="stat-card">

                    <div class="card-top">

                        <div>

                            <div class="card-title">
                                Categorías
                            </div>

                            <div class="card-number">
                                {{ \App\Models\Categoria::count() }}
                            </div>

                            <div class="card-description">
                                Categorías registradas
                            </div>

                        </div>

                        <div class="card-icon yellow">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <path d="m20 13-7 7-9-9V4h7l9 9Z"/>
                                <circle cx="7.5" cy="7.5" r="1"/>
                            </svg>

                        </div>

                    </div>

                    <div class="card-button">

                        <a href="{{ route('categorias.index') }}"
                           class="button-yellow">

                            Ver categorías

                            <span class="button-arrow">
                                →
                            </span>

                        </a>

                    </div>

                </div>


                
                @endif

<!-- COMPRAS -->

                @if (auth()->user()->hasPrivilege('compras.ver'))



                <div class="stat-card">

                    <div class="card-top">

                        <div>

                            <div class="card-title">
                                Compras
                            </div>

                            <div class="card-number">
                                {{ \App\Models\Compra::count() }}
                            </div>

                            <div class="card-description">
                                Compras registradas
                            </div>

                        </div>

                        <div class="card-icon blue">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <path d="M6 3h12v18H6z"/>
                                <path d="M9 7h6M9 11h6M9 15h4"/>
                            </svg>

                        </div>

                    </div>

                    <div class="card-button">

                        <a href="{{ route('compras.index') }}"
                           class="button-blue">

                            Ver compras

                            <span class="button-arrow">
                                →
                            </span>

                        </a>

                    </div>

                </div>


                
                @endif

<!-- VENTAS -->

                @if (auth()->user()->hasPrivilege('ventas.ver'))



                <div class="stat-card">

                    <div class="card-top">

                        <div>

                            <div class="card-title">
                                Ventas
                            </div>

                            <div class="card-number">
                                {{ \App\Models\Venta::count() }}
                            </div>

                            <div class="card-description">
                                Ventas registradas
                            </div>

                        </div>

                        <div class="card-icon green">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <path d="M3 4h2l2.5 12h10L20 8H6"/>
                                <circle cx="10" cy="20" r="1"/>
                                <circle cx="17" cy="20" r="1"/>
                            </svg>

                        </div>

                    </div>

                    <div class="card-button">

                        <a href="{{ route('ventas.index') }}"
                           class="button-green">

                            Ver ventas

                            <span class="button-arrow">
                                →
                            </span>

                        </a>

                    </div>

                </div>


                
                @endif

<!-- FACTURAS -->

                @if (auth()->user()->hasPrivilege('facturas.ver'))



                <div class="stat-card">

                    <div class="card-top">

                        <div>

                            <div class="card-title">
                                Facturas
                            </div>

                            <div class="card-number">
                                {{ \App\Models\Factura::count() }}
                            </div>

                            <div class="card-description">
                                Facturas registradas
                            </div>

                        </div>

                        <div class="card-icon red">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <path d="M6 3h12v18l-3-2-3 2-3-2-3 2V3Z"/>
                                <path d="M9 8h6M9 12h6M9 16h4"/>
                            </svg>

                        </div>

                    </div>

                    <div class="card-button">

                        <a href="{{ route('facturas.index') }}"
                           class="button-red">

                            Ver facturas

                            <span class="button-arrow">
                                →
                            </span>

                        </a>

                    </div>

                </div>


                
                @endif

<!-- USUARIOS -->

                @if (auth()->user()->hasPrivilege('usuarios.ver'))



                <div class="stat-card">

                    <div class="card-top">

                        <div>

                            <div class="card-title">
                                Usuarios
                            </div>

                            <div class="card-number">
                                {{ \App\Models\User::count() }}
                            </div>

                            <div class="card-description">
                                Usuarios registrados
                            </div>

                        </div>

                        <div class="card-icon cyan">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">
                                <circle cx="12" cy="8" r="3"/>
                                <path d="M5 21a7 7 0 0 1 14 0"/>
                            </svg>

                        </div>

                    </div>

                    <div class="card-button">

                        <a href="{{ route('usuarios.index') }}"
                           class="button-cyan">

                            Ver usuarios

                            <span class="button-arrow">
                                →
                            </span>

                        </a>

                    </div>

                </div>


                
                @endif

<!-- ROLES -->

                @if (auth()->user()->hasPrivilege('roles.ver'))



                @if (Route::has('roles.index'))

                    <div class="stat-card">

                        <div class="card-top">

                            <div>

                                <div class="card-title">
                                    Roles
                                
                @endif

</div>

                                <div class="card-number">
                                    {{ \App\Models\Role::count() }}
                                </div>

                                <div class="card-description">
                                    Roles registrados
                                </div>

                            </div>

                            <div class="card-icon gray">

                                <svg viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2">
                                    <path d="M12 3 20 6v6c0 5-3.5 8-8 9-4.5-1-8-4-8-9V6l8-3Z"/>
                                    <path d="m9 12 2 2 4-4"/>
                                </svg>

                            </div>

                        </div>

                        <div class="card-button">

                            <a href="{{ route('roles.index') }}"
                               class="button-gray">

                                Ver roles

                                <span class="button-arrow">
                                    →
                                </span>

                            </a>

                        </div>

                    </div>

                @endif

            </div>

        </section>

    </main>

</div>

</body>
</html>