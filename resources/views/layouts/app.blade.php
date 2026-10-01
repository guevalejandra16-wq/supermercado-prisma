<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ $title ?? 'Prisma | Supermercado Prisma' }}
    </title>

    <!-- Figtree -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link
        href="https://fonts.bunny.net/css?family=figtree:400,500,600,700"
        rel="stylesheet"
    >

    <!-- Vite -->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <style>

        /* =========================================================
           RESET
        ========================================================= */

        * {
            box-sizing: border-box;
        }


        html,
        body {
            margin: 0;
            padding: 0;

            min-height: 100%;
        }


        body {

            font-family: 'Figtree', sans-serif;

            background: #f5f7fb;

            color: #172033;

            -webkit-font-smoothing: antialiased;

        }


        button,
        a {
            font-family: inherit;
        }


        /* =========================================================
           APP
        ========================================================= */

        .prisma-app {

            min-height: 100vh;

            background: #f5f7fb;

        }


        /* =========================================================
           HEADER
        ========================================================= */

        .prisma-header {

            height: 78px;

            width: 100%;

            background: #ffffff;

            border-bottom: 1px solid #e6ebf2;

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 0 38px;

            position: sticky;

            top: 0;

            z-index: 100;

            box-shadow:
                0 2px 8px rgba(15, 23, 42, 0.035);

        }


        /* =========================================================
           HEADER IZQUIERDA
        ========================================================= */

        .prisma-header-left {

            display: flex;

            align-items: center;

            gap: 16px;

        }


        /* =========================================================
           BOTÓN MENÚ
        ========================================================= */

        .prisma-menu-button {

            width: 44px;

            height: 44px;

            display: flex;

            align-items: center;

            justify-content: center;

            border: 1px solid #dce3ed;

            border-radius: 10px;

            background: #ffffff;

            color: #172033;

            cursor: pointer;

            transition:
                background .2s ease,
                border-color .2s ease,
                color .2s ease,
                transform .2s ease,
                box-shadow .2s ease;

        }


        .prisma-menu-button:hover {

            background: #f5f8fd;

            border-color: #cbd5e1;

            color: #2864e8;

            transform: translateY(-1px);

            box-shadow:
                0 5px 12px rgba(15, 23, 42, .07);

        }


        .prisma-menu-button svg {

            width: 21px;

            height: 21px;

        }


        /* =========================================================
           LOGO
        ========================================================= */

        .prisma-brand {

            display: flex;

            align-items: center;

            gap: 11px;

            text-decoration: none;

            color: #172033;

        }


        .prisma-brand-icon {

            width: 43px;

            height: 43px;

            border-radius: 11px;

            background: #2864e8;

            color: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            box-shadow:
                0 5px 12px rgba(40, 100, 232, .18);

        }


        .prisma-brand-icon svg {

            width: 23px;

            height: 23px;

        }


        .prisma-brand-name {

            font-size: 20px;

            font-weight: 700;

            line-height: 1.1;

            letter-spacing: -.2px;

        }


        .prisma-brand-subtitle {

            font-size: 12px;

            color: #71809a;

            margin-top: 4px;

        }


        /* =========================================================
           USUARIO
        ========================================================= */

        .prisma-user-area {

            display: flex;

            align-items: center;

            gap: 13px;

        }


        .prisma-user-info {

            text-align: right;

        }


        .prisma-user-name {

            font-size: 14px;

            font-weight: 700;

            color: #172033;

        }


        .prisma-user-role {

            font-size: 12px;

            color: #71809a;

            margin-top: 3px;

        }


        .prisma-user-avatar {

            width: 44px;

            height: 44px;

            border-radius: 50%;

            background: #2864e8;

            color: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 16px;

            font-weight: 700;

        }


        /* =========================================================
           CONTENIDO
        ========================================================= */

        .prisma-content {

            min-height: calc(100vh - 78px);

            padding: 42px 55px 65px;

            max-width: 1650px;

            margin: 0 auto;

            width: 100%;

        }


        /* =========================================================
           MENÚ LATERAL
        ========================================================= */

        .prisma-menu-overlay {

            position: fixed;

            inset: 0;

            background: rgba(15, 23, 42, .35);

            backdrop-filter: blur(2px);

            opacity: 0;

            visibility: hidden;

            transition:
                opacity .25s ease,
                visibility .25s ease;

            z-index: 200;

        }


        .prisma-menu-overlay.active {

            opacity: 1;

            visibility: visible;

        }


        .prisma-sidebar {

            position: fixed;

            top: 0;

            left: 0;

            bottom: 0;

            width: 285px;

            background:
                linear-gradient(
                    180deg,
                    #14284e 0%,
                    #0d1d3a 100%
                );

            color: #ffffff;

            transform: translateX(-100%);

            transition:
                transform .28s ease;

            z-index: 210;

            display: flex;

            flex-direction: column;

            box-shadow:
                10px 0 35px rgba(15, 23, 42, .18);

        }


        .prisma-sidebar.active {

            transform: translateX(0);

        }


        /* =========================================================
           SIDEBAR HEADER
        ========================================================= */

        .prisma-sidebar-header {

            height: 90px;

            padding: 0 22px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            border-bottom:
                1px solid rgba(255,255,255,.09);

        }


        .prisma-sidebar-brand {

            display: flex;

            align-items: center;

            gap: 11px;

        }


        .prisma-sidebar-logo {

            width: 42px;

            height: 42px;

            border-radius: 11px;

            background: #2864e8;

            display: flex;

            align-items: center;

            justify-content: center;

        }


        .prisma-sidebar-logo svg {

            width: 23px;

            height: 23px;

        }


        .prisma-sidebar-title {

            font-size: 18px;

            font-weight: 700;

        }


        .prisma-sidebar-subtitle {

            font-size: 11px;

            color: #aebbd1;

            margin-top: 2px;

        }


        /* =========================================================
           CERRAR MENÚ
        ========================================================= */

        .prisma-sidebar-close {

            width: 35px;

            height: 35px;

            border: 0;

            border-radius: 8px;

            background: transparent;

            color: #b9c5d8;

            cursor: pointer;

            display: flex;

            align-items: center;

            justify-content: center;

            transition: .2s ease;

        }


        .prisma-sidebar-close:hover {

            background: rgba(255,255,255,.08);

            color: #ffffff;

        }


        .prisma-sidebar-close svg {

            width: 19px;

            height: 19px;

        }


        /* =========================================================
           SIDEBAR CONTENIDO
        ========================================================= */

        .prisma-sidebar-content {

            flex: 1;

            overflow-y: auto;

            padding: 20px 14px 25px;

        }


        .prisma-sidebar-section {

            margin-bottom: 25px;

        }


        .prisma-sidebar-section-title {

            padding: 0 14px;

            margin-bottom: 9px;

            font-size: 10px;

            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: 1.6px;

            color: #7f91ae;

        }


        /* =========================================================
           ITEMS DEL MENÚ
        ========================================================= */

        .prisma-sidebar-link {

            display: flex;

            align-items: center;

            gap: 12px;

            width: 100%;

            min-height: 46px;

            padding: 0 14px;

            margin-bottom: 4px;

            border-radius: 9px;

            color: #d5deed;

            text-decoration: none;

            font-size: 14px;

            font-weight: 500;

            transition:
                background .18s ease,
                color .18s ease,
                transform .18s ease;

        }


        .prisma-sidebar-link:hover {

            background: rgba(255,255,255,.07);

            color: #ffffff;

            transform: translateX(2px);

        }


        .prisma-sidebar-link.active {

            background: #2864e8;

            color: #ffffff;

            box-shadow:
                0 6px 15px rgba(40,100,232,.25);

        }


        .prisma-sidebar-link svg {

            width: 19px;

            height: 19px;

            flex-shrink: 0;

        }


        .prisma-sidebar-link-arrow {

            margin-left: auto;

            opacity: .55;

        }


        /* =========================================================
           SIDEBAR FOOTER
        ========================================================= */

        .prisma-sidebar-footer {

            padding: 14px;

            border-top:
                1px solid rgba(255,255,255,.08);

        }


        .prisma-sidebar-user {

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 10px;

            border-radius: 9px;

            background: rgba(255,255,255,.045);

        }


        .prisma-sidebar-avatar {

            width: 36px;

            height: 36px;

            border-radius: 50%;

            background: #2864e8;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 13px;

            font-weight: 700;

        }


        .prisma-sidebar-user-name {

            font-size: 12px;

            font-weight: 600;

            color: #ffffff;

        }


        .prisma-sidebar-user-email {

            font-size: 10px;

            color: #91a0b8;

            margin-top: 2px;

            max-width: 175px;

            overflow: hidden;

            text-overflow: ellipsis;

            white-space: nowrap;

        }


        /* =========================================================
           BOTÓN CERRAR SESIÓN
        ========================================================= */

        .prisma-logout {

            width: 100%;

            margin-top: 9px;

            height: 40px;

            border: 1px solid rgba(255,255,255,.09);

            border-radius: 8px;

            background: rgba(255,255,255,.035);

            color: #cbd5e1;

            cursor: pointer;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            font-size: 12px;

            transition: .2s ease;

        }


        .prisma-logout:hover {

            background: rgba(239,68,68,.13);

            color: #fecaca;

            border-color: rgba(239,68,68,.18);

        }


        .prisma-logout svg {

            width: 17px;

            height: 17px;

        }


        /* =========================================================
           RESPONSIVE
        ========================================================= */

        @media (max-width: 900px) {

            .prisma-header {

                padding: 0 20px;

            }


            .prisma-content {

                padding: 30px 22px 50px;

            }

        }


        @media (max-width: 640px) {

            .prisma-header {

                height: 70px;

                padding: 0 15px;

            }


            .prisma-brand-subtitle {

                display: none;

            }


            .prisma-brand-name {

                font-size: 18px;

            }


            .prisma-user-info {

                display: none;

            }


            .prisma-user-avatar {

                width: 40px;

                height: 40px;

            }


            .prisma-content {

                min-height: calc(100vh - 70px);

                padding: 25px 15px 40px;

            }


            .prisma-sidebar {

                width: min(285px, 88vw);

            }

        }

    </style>

</head>


<body>

<div
    class="prisma-app"
    id="prismaApp"
>


    <!-- =====================================================
         HEADER
    ====================================================== -->

    <header class="prisma-header">


        <!-- IZQUIERDA -->

        <div class="prisma-header-left">


            <!-- BOTÓN MENÚ -->

            <button
                type="button"
                class="prisma-menu-button"
                onclick="openPrismaMenu()"
                title="Abrir menú"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16"
                    />

                </svg>

            </button>


            <!-- LOGO -->

            <a
                href="{{ route('dashboard') }}"
                class="prisma-brand"
            >

                <div class="prisma-brand-icon">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 4h13m-9-4v4m6-4v4M9 21h.01M17 21h.01"
                        />

                    </svg>

                </div>


                <div>

                    <div class="prisma-brand-name">
                        Prisma
                    </div>

                    <div class="prisma-brand-subtitle">
                        Supermercado
                    </div>

                </div>

            </a>

        </div>


        <!-- USUARIO -->

        <div class="prisma-user-area">


            <div class="prisma-user-info">

                <div class="prisma-user-name">

                    {{ Auth::user()->name }}

                </div>


                <div class="prisma-user-role">

                    @php

                        $rolUsuario = Auth::user()
                            ->roles()
                            ->first();

                    @endphp

                    {{ $rolUsuario?->nombre ?? 'Usuario' }}

                </div>

            </div>


            <div class="prisma-user-avatar">

                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

            </div>

        </div>

    </header>



    <!-- =====================================================
         MENÚ LATERAL
    ====================================================== -->

    <div
        id="prismaMenuOverlay"
        class="prisma-menu-overlay"
        onclick="closePrismaMenu()"
    ></div>


    <aside
        id="prismaSidebar"
        class="prisma-sidebar"
    >


        <!-- SIDEBAR HEADER -->

        <div class="prisma-sidebar-header">


            <div class="prisma-sidebar-brand">


                <div class="prisma-sidebar-logo">

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-2 4h13m-9-4v4m6-4v4M9 21h.01M17 21h.01"
                        />

                    </svg>

                </div>


                <div>

                    <div class="prisma-sidebar-title">
                        Prisma
                    </div>

                    <div class="prisma-sidebar-subtitle">
                        Supermercado
                    </div>

                </div>

            </div>


            <button
                type="button"
                class="prisma-sidebar-close"
                onclick="closePrismaMenu()"
                title="Cerrar menú"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 18L18 6M6 6l12 12"
                    />

                </svg>

            </button>

        </div>



        <!-- =================================================
             OPCIONES
        ================================================== -->

        <div class="prisma-sidebar-content">

            @php
                $canProductos = auth()->user()->hasPrivilege('productos.ver');
                $canClientes = auth()->user()->hasPrivilege('clientes.ver');
                $canProveedores = auth()->user()->hasPrivilege('proveedores.ver');
                $canInventario = auth()->user()->hasPrivilege('inventario.ver');
                $canCategorias = auth()->user()->hasPrivilege('categorias.ver');
                $canCompras = auth()->user()->hasPrivilege('compras.ver');
                $canVentas = auth()->user()->hasPrivilege('ventas.ver');
                $canFacturas = auth()->user()->hasPrivilege('facturas.ver');
                $canUsuarios = auth()->user()->hasPrivilege('usuarios.ver');
                $canRoles = auth()->user()->hasPrivilege('roles.ver');
                $canReporteVentas = auth()->user()->hasPrivilege('reportes.ventas');
                $canReporteCompras = auth()->user()->hasPrivilege('reportes.compras');
                $canReporteInventario = auth()->user()->hasPrivilege('reportes.inventario');
            @endphp


            <!-- PRINCIPAL -->

            <div class="prisma-sidebar-section">


                <div class="prisma-sidebar-section-title">
                    Principal
                </div>


                <!-- Dashboard -->

                <a
                    href="{{ route('dashboard') }}"
                    class="prisma-sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                    onclick="closePrismaMenu()"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 10.5L12 3l9 7.5v9a1.5 1.5 0 01-1.5 1.5h-15A1.5 1.5 0 013 19.5v-9z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 21v-7h6v7"
                        />

                    </svg>

                    <span>Dashboard</span>

                </a>


                <!-- Productos -->

                @if ($canProductos)


                <a
                    href="{{ route('productos.index') }}"
                    class="prisma-sidebar-link {{ request()->routeIs('productos.*') ? 'active' : '' }}"
                    onclick="closePrismaMenu()"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 7.5L12 3l8 4.5v9L12 21l-8-4.5v-9z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4.5 7.5L12 12l7.5-4.5M12 12v9"
                        />

                    </svg>

                    <span>Productos</span>

                    <span class="prisma-sidebar-link-arrow">›</span>

                </a>
                @endif


                <!-- Clientes -->

                @if ($canClientes)


                <a
                    href="{{ route('clientes.index') }}"
                    class="prisma-sidebar-link {{ request()->routeIs('clientes.*') ? 'active' : '' }}"
                    onclick="closePrismaMenu()"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"
                        />

                        <circle
                            cx="9"
                            cy="7"
                            r="4"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                        />

                    </svg>

                    <span>Clientes</span>

                    <span class="prisma-sidebar-link-arrow">›</span>

                </a>
                @endif


                <!-- Proveedores -->

                @if ($canProveedores)


                <a
                    href="{{ route('proveedores.index') }}"
                    class="prisma-sidebar-link {{ request()->routeIs('proveedores.*') ? 'active' : '' }}"
                    onclick="closePrismaMenu()"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 21h18M5 21V9l7-5 7 5v12"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 21v-6h6v6M8 10h.01M12 10h.01M16 10h.01"
                        />

                    </svg>

                    <span>Proveedores</span>

                    <span class="prisma-sidebar-link-arrow">›</span>

                </a>
                @endif


                <!-- Inventario -->

                @if ($canInventario)


                <a
                    href="{{ route('inventario.index') }}"
                    class="prisma-sidebar-link {{ request()->routeIs('inventario.*') ? 'active' : '' }}"
                    onclick="closePrismaMenu()"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <ellipse
                            cx="12"
                            cy="5"
                            rx="7"
                            ry="3"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 5v7c0 1.66 3.13 3 7 3s7-1.34 7-3V5"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5 12v7c0 1.66 3.13 3 7 3s7-1.34 7-3v-7"
                        />

                    </svg>

                    <span>Inventario</span>

                    <span class="prisma-sidebar-link-arrow">›</span>

                </a>
                @endif


                <!-- Categorías -->

                @if ($canCategorias)


                <a
                    href="{{ route('categorias.index') }}"
                    class="prisma-sidebar-link {{ request()->routeIs('categorias.*') ? 'active' : '' }}"
                    onclick="closePrismaMenu()"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M20 13l-7 7-9-9V4h7l9 9z"
                        />

                        <circle
                            cx="7"
                            cy="7"
                            r="1.2"
                        />

                    </svg>

                    <span>Categorías</span>

                    <span class="prisma-sidebar-link-arrow">›</span>

                </a>
                @endif

            </div>



            <!-- OPERACIONES -->

            @if ($canCompras || $canVentas || $canFacturas)

            <div class="prisma-sidebar-section">


                <div class="prisma-sidebar-section-title">
                    Operaciones
                </div>


                <!-- Compras -->

                @if ($canCompras)


                <a
                    href="{{ route('compras.index') }}"
                    class="prisma-sidebar-link {{ request()->routeIs('compras.*') ? 'active' : '' }}"
                    onclick="closePrismaMenu()"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 3h12v18H6z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 7h6M9 11h6M9 15h4"
                        />

                    </svg>

                    <span>Compras</span>

                    <span class="prisma-sidebar-link-arrow">›</span>

                </a>
                @endif


                <!-- Ventas -->

                @if ($canVentas)


                <a
                    href="{{ route('ventas.index') }}"
                    class="prisma-sidebar-link {{ request()->routeIs('ventas.*') ? 'active' : '' }}"
                    onclick="closePrismaMenu()"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 4h2l2.4 11.2a2 2 0 002 1.6h7.9a2 2 0 001.9-1.4L21 8H6"
                        />

                        <circle
                            cx="10"
                            cy="20"
                            r="1"
                        />

                        <circle
                            cx="18"
                            cy="20"
                            r="1"
                        />

                    </svg>

                    <span>Ventas</span>

                    <span class="prisma-sidebar-link-arrow">›</span>

                </a>
                @endif


                <!-- Facturas -->

                @if ($canFacturas)


                <a
                    href="{{ route('facturas.index') }}"
                    class="prisma-sidebar-link {{ request()->routeIs('facturas.*') ? 'active' : '' }}"
                    onclick="closePrismaMenu()"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 3h12v18l-3-2-3 2-3-2-3 2V3z"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M9 8h6M9 12h6M9 16h3"
                        />

                    </svg>

                    <span>Facturas</span>

                    <span class="prisma-sidebar-link-arrow">›</span>

                </a>
                @endif

            </div>

            @endif



         <!-- =================================================
     REPORTES
================================================== -->

@if ($canReporteVentas || $canReporteCompras || $canReporteInventario)

    <div class="prisma-sidebar-section">

        <div class="prisma-sidebar-section-title">
            Reportes
        </div>


        <!-- Reporte de ventas -->

        @if ($canReporteVentas)

            <a
                href="{{ route('reportes.ventas') }}"
                class="prisma-sidebar-link {{ request()->routeIs('reportes.ventas*') ? 'active' : '' }}"
                onclick="closePrismaMenu()"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4 19V5"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M4 19h16"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M7 15l3-4 3 2 5-6"
                    />

                </svg>

                <span>Reporte de ventas</span>

                <span class="prisma-sidebar-link-arrow">
                    ›
                </span>

            </a>

        @endif


        <!-- Reporte de compras -->

        @if ($canReporteCompras)

            <a
                href="{{ route('reportes.compras') }}"
                class="prisma-sidebar-link {{ request()->routeIs('reportes.compras*') ? 'active' : '' }}"
                onclick="closePrismaMenu()"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M6 3h12v18H6z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M9 7h6M9 11h6M9 15h4"
                    />

                </svg>

                <span>Reporte de compras</span>

                <span class="prisma-sidebar-link-arrow">
                    ›
                </span>

            </a>

        @endif


        <!-- Reporte de inventario -->

        @if ($canReporteInventario)

            <a
                href="{{ route('reportes.inventario') }}"
                class="prisma-sidebar-link {{ request()->routeIs('reportes.inventario*') ? 'active' : '' }}"
                onclick="closePrismaMenu()"
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="1.8"
                >

                    <rect
                        x="5"
                        y="3"
                        width="14"
                        height="18"
                        rx="1.5"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M8 7h8M8 11h8M8 15h5"
                    />

                </svg>

                <span>Reporte de inventario</span>

                <span class="prisma-sidebar-link-arrow">
                    ›
                </span>

            </a>

        @endif

    </div>

@endif


<!-- =================================================
     ADMINISTRACIÓN
================================================== -->

<div class="prisma-sidebar-section">

    <div class="prisma-sidebar-section-title">
        Administración
    </div>


    <!-- Usuarios -->

                @if ($canUsuarios)


    <a
        href="{{ route('usuarios.index') }}"
        class="prisma-sidebar-link {{ request()->routeIs('usuarios.*') ? 'active' : '' }}"
        onclick="closePrismaMenu()"
    >

        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.8"
        >

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"
            />

            <circle
                cx="9"
                cy="7"
                r="4"
            />

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19 8v6M22 11h-6"
            />

        </svg>

        <span>Usuarios</span>

        <span class="prisma-sidebar-link-arrow">
            ›
        </span>

    </a>
                @endif


    <!-- Roles -->

                @if ($canRoles)


    <a
        href="{{ route('roles.index') }}"
        class="prisma-sidebar-link {{ request()->routeIs('roles.*') ? 'active' : '' }}"
        onclick="closePrismaMenu()"
    >

        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.8"
        >

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
            />

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19.4 15a1.7 1.7 0 0 0 .34 1.88l.06.06-1.41 1.41-.06-.06a1.7 1.7 0 0 0-1.88-.34 1.7 1.7 0 0 0-1.04 1.56V21h-2v-.09a1.7 1.7 0 0 0-1.04-1.56 1.7 1.7 0 0 0-1.88.34l-.06.06-1.41-1.41.06-.06A1.7 1.7 0 0 0 9.4 15a1.7 1.7 0 0 0-1.56-1.04H7v-2h.84A1.7 1.7 0 0 0 9.4 10a1.7 1.7 0 0 0-.34-1.88L9 8.06l1.41-1.41.06.06a1.7 1.7 0 0 0 1.88.34A1.7 1.7 0 0 0 13.4 5.49V5h2v.49a1.7 1.7 0 0 0 1.04 1.56 1.7 1.7 0 0 0 1.88-.34l.06-.06 1.41 1.41-.06.06A1.7 1.7 0 0 0 19.4 10a1.7 1.7 0 0 0 1.56 1.04H21v2h-.04A1.7 1.7 0 0 0 19.4 15Z"
            />

        </svg>

        <span>Roles</span>

        <span class="prisma-sidebar-link-arrow">
            ›
        </span>

    </a>
                @endif


    <!-- Perfil -->

    <a
        href="{{ route('profile.edit') }}"
        class="prisma-sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}"
        onclick="closePrismaMenu()"
    >

        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="1.8"
        >

            <circle
                cx="12"
                cy="8"
                r="4"
            />

            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4 21a8 8 0 0116 0"
            />

        </svg>

        <span>Mi perfil</span>

    </a>

</div>



        <!-- =================================================
             FOOTER DEL MENÚ
        ================================================== -->

        <div class="prisma-sidebar-footer">


            <div class="prisma-sidebar-user">


                <div class="prisma-sidebar-avatar">

                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}

                </div>


                <div>

                    <div class="prisma-sidebar-user-name">

                        {{ Auth::user()->name }}

                    </div>


                    <div class="prisma-sidebar-user-email">

                        {{ Auth::user()->email }}

                    </div>

                </div>

            </div>


            <!-- CERRAR SESIÓN -->

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="prisma-logout"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4"
                        />

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10 17l5-5-5-5M15 12H3"
                        />

                    </svg>

                    <span>
                        Cerrar sesión
                    </span>

                </button>

            </form>

        </div>

    </aside>



    <!-- =====================================================
         CONTENIDO DE LA PÁGINA
    ====================================================== -->

    <main class="prisma-content">

        {{ $slot }}

    </main>


</div>



<!-- =========================================================
     JAVASCRIPT DEL MENÚ
========================================================= -->

<script>

    function openPrismaMenu() {

        const sidebar =
            document.getElementById('prismaSidebar');

        const overlay =
            document.getElementById('prismaMenuOverlay');


        sidebar.classList.add('active');

        overlay.classList.add('active');


        document.body.style.overflow = 'hidden';

    }


    function closePrismaMenu() {

        const sidebar =
            document.getElementById('prismaSidebar');

        const overlay =
            document.getElementById('prismaMenuOverlay');


        sidebar.classList.remove('active');

        overlay.classList.remove('active');


        document.body.style.overflow = '';

    }


    /*
     * Cerrar con ESC
     */

    document.addEventListener(
        'keydown',
        function(event) {

            if (event.key === 'Escape') {

                closePrismaMenu();

            }

        }
    );


</script>

</body>

</html>