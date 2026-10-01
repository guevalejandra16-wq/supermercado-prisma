<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Iniciar sesión | Prisma</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>

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
            font-family: Arial, Helvetica, sans-serif;
            background: #f4f7fb;
            color: #172033;
        }

        /* =========================================
           CONTENEDOR PRINCIPAL
        ========================================== */

        .prisma-login-page {
            min-height: 100vh;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 35px;

            background:
                radial-gradient(
                    circle at 10% 10%,
                    rgba(37, 99, 235, 0.08),
                    transparent 30%
                ),
                #f4f7fb;
        }

        .prisma-login-container {
            width: 100%;
            max-width: 1100px;
            min-height: 650px;

            display: grid;
            grid-template-columns: 1fr 1fr;

            background: #ffffff;

            border: 1px solid #e1e7f0;
            border-radius: 22px;

            overflow: hidden;

            box-shadow:
                0 25px 60px rgba(15, 23, 42, 0.12);
        }


        /* =========================================
           PANEL IZQUIERDO
        ========================================== */

        .prisma-brand-panel {
            position: relative;
            overflow: hidden;

            padding: 55px;

            display: flex;
            flex-direction: column;
            justify-content: space-between;

            color: white;

            background:
                linear-gradient(
                    145deg,
                    #14264a 0%,
                    #0d1b36 65%,
                    #10234a 100%
                );
        }

        .prisma-brand-panel::before {
            content: "";

            position: absolute;

            width: 380px;
            height: 380px;

            border-radius: 50%;

            background: rgba(37, 99, 235, 0.14);

            right: -170px;
            top: -130px;
        }

        .prisma-brand-panel::after {
            content: "";

            position: absolute;

            width: 300px;
            height: 300px;

            border-radius: 50%;

            border: 1px solid rgba(255, 255, 255, 0.07);

            right: -100px;
            bottom: -110px;
        }

        .prisma-brand-content,
        .prisma-brand-bottom {
            position: relative;
            z-index: 2;
        }


        /* =========================================
           LOGO
        ========================================== */

        .prisma-logo {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .prisma-logo-icon {
            width: 54px;
            height: 54px;

            border-radius: 15px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #2563eb;

            box-shadow:
                0 10px 25px rgba(37, 99, 235, 0.3);
        }

        .prisma-logo-icon svg {
            width: 29px;
            height: 29px;
        }

        .prisma-logo-name {
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .prisma-logo-subtitle {
            margin-top: 3px;

            font-size: 11px;

            color: #aebbd2;

            letter-spacing: 1px;
        }


        /* =========================================
           MENSAJE IZQUIERDO
        ========================================== */

        .prisma-brand-message {
            max-width: 430px;
            margin-top: 90px;
        }

        .prisma-brand-message .small-title {
            margin-bottom: 14px;

            color: #60a5fa;

            font-size: 13px;
            font-weight: 700;

            letter-spacing: 1px;
        }

        .prisma-brand-message h1 {
            margin: 0;

            color: #ffffff;

            font-size: 42px;
            line-height: 1.12;

            font-weight: 800;

            letter-spacing: -1px;
        }

        .prisma-brand-message p {
            margin: 20px 0 0;

            color: #b8c5da;

            font-size: 15px;
            line-height: 1.7;
        }


        /* =========================================
           CARACTERÍSTICAS
        ========================================== */

        .prisma-features {
            display: flex;
            flex-direction: column;
            gap: 14px;

            margin-top: 35px;
        }

        .prisma-feature {
            display: flex;
            align-items: center;
            gap: 12px;

            color: #dce6f5;

            font-size: 13px;
        }

        .prisma-feature-icon {
            width: 31px;
            height: 31px;

            flex-shrink: 0;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 8px;

            background: rgba(37, 99, 235, 0.18);

            color: #60a5fa;
        }

        .prisma-feature-icon svg {
            width: 16px;
            height: 16px;
        }

        .prisma-brand-bottom {
            color: #7f91ae;
            font-size: 11px;
        }


        /* =========================================
           PANEL DERECHO
        ========================================== */

        .prisma-form-panel {
            padding: 55px 70px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #ffffff;
        }

        .prisma-form-container {
            width: 100%;
            max-width: 400px;
        }


        /* =========================================
           ENCABEZADO
        ========================================== */

        .prisma-form-header {
            margin-bottom: 32px;
        }

        .prisma-form-header h2 {
            margin: 0;

            color: #172033;

            font-size: 31px;
            font-weight: 800;

            letter-spacing: -0.6px;
        }

        .prisma-form-header p {
            margin: 9px 0 0;

            color: #71809a;

            font-size: 14px;
            line-height: 1.5;
        }


        /* =========================================
           ESTADO
        ========================================== */

        .prisma-session-status {
            margin-bottom: 20px;

            padding: 11px 13px;

            border-radius: 8px;

            background: #ecfdf5;

            color: #047857;

            font-size: 13px;
        }


        /* =========================================
           CAMPOS
        ========================================== */

        .prisma-field {
            margin-bottom: 21px;
        }

        .prisma-label {
            display: block;

            margin-bottom: 8px;

            color: #344054;

            font-size: 13px;
            font-weight: 700;
        }

        .prisma-input {
            width: 100%;
            height: 49px;

            padding: 0 14px;

            border: 1px solid #d7dee9;
            border-radius: 9px;

            outline: none;

            background: #f9fafc;

            color: #172033;

            font-family: Arial, Helvetica, sans-serif;
            font-size: 14px;

            transition: 0.2s ease;
        }

        .prisma-input::placeholder {
            color: #a0aabe;
        }

        .prisma-input:hover {
            border-color: #b8c4d5;
        }

        .prisma-input:focus {
            border-color: #2563eb;

            background: #ffffff;

            box-shadow:
                0 0 0 4px rgba(37, 99, 235, 0.10);
        }

        .prisma-error {
            margin-top: 6px;

            color: #dc2626;

            font-size: 12px;
        }


        /* =========================================
           OPCIONES
        ========================================== */

        .prisma-options {
            display: flex;
            align-items: center;
            justify-content: space-between;

            gap: 15px;

            margin-top: 4px;
        }

        .prisma-remember {
            display: flex;
            align-items: center;

            gap: 8px;

            color: #667085;

            font-size: 13px;

            cursor: pointer;
        }

        .prisma-remember input {
            width: 16px;
            height: 16px;

            margin: 0;

            accent-color: #2563eb;

            cursor: pointer;
        }

        .prisma-forgot {
            color: #2563eb;

            font-size: 13px;
            font-weight: 600;

            text-decoration: none;
        }

        .prisma-forgot:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }


        /* =========================================
           BOTÓN
        ========================================== */

        .prisma-login-button {
            width: 100%;
            height: 50px;

            margin-top: 28px;

            border: none;
            border-radius: 9px;

            background: #2563eb;

            color: white;

            font-family: Arial, Helvetica, sans-serif;

            font-size: 13px;
            font-weight: 800;

            letter-spacing: 0.7px;

            cursor: pointer;

            transition: 0.2s ease;

            box-shadow:
                0 8px 18px rgba(37, 99, 235, 0.20);
        }

        .prisma-login-button:hover {
            background: #1d4ed8;

            transform: translateY(-1px);

            box-shadow:
                0 10px 22px rgba(37, 99, 235, 0.25);
        }

        .prisma-login-button:active {
            transform: translateY(0);
        }


        /* =========================================
           SEGURIDAD
        ========================================== */

        .prisma-security {
            margin-top: 32px;
            padding-top: 18px;

            border-top: 1px solid #edf0f5;

            display: flex;
            align-items: center;
            justify-content: center;

            gap: 7px;

            color: #98a2b3;

            font-size: 11px;
        }

        .prisma-security svg {
            width: 14px;
            height: 14px;
        }


        /* =========================================
           RESPONSIVE
        ========================================== */

        @media (max-width: 900px) {

            .prisma-login-page {
                padding: 20px;
            }

            .prisma-login-container {
                max-width: 800px;

                grid-template-columns: 0.9fr 1.1fr;
            }

            .prisma-brand-panel {
                padding: 40px;
            }

            .prisma-form-panel {
                padding: 40px;
            }

            .prisma-brand-message h1 {
                font-size: 34px;
            }

        }


        @media (max-width: 700px) {

            .prisma-login-page {
                padding: 0;
            }

            .prisma-login-container {
                min-height: 100vh;

                grid-template-columns: 1fr;

                border: none;
                border-radius: 0;

                box-shadow: none;
            }

            .prisma-brand-panel {
                min-height: 300px;

                padding: 35px;
            }

            .prisma-brand-message {
                margin-top: 45px;
            }

            .prisma-brand-message h1 {
                font-size: 30px;
            }

            .prisma-features {
                display: none;
            }

            .prisma-form-panel {
                padding: 45px 35px;
            }

        }


        @media (max-width: 450px) {

            .prisma-brand-panel {
                padding: 30px 25px;

                min-height: 270px;
            }

            .prisma-form-panel {
                padding: 35px 25px;
            }

            .prisma-form-header h2 {
                font-size: 27px;
            }

            .prisma-options {
                align-items: flex-start;

                flex-direction: column;
            }

        }

    </style>

</head>


<body>

    <div class="prisma-login-page">

        <div class="prisma-login-container">


            {{-- =========================================
                 PANEL IZQUIERDO
            ========================================== --}}

            <section class="prisma-brand-panel">

                <div class="prisma-brand-content">


                    {{-- LOGO --}}

                    <div class="prisma-logo">

                        <div class="prisma-logo-icon">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M3 3h2l2.4 11.2a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L21 7H6"/>

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

                        </div>


                        <div>

                            <div class="prisma-logo-name">
                                Prisma
                            </div>

                            <div class="prisma-logo-subtitle">
                                SUPERMERCADO
                            </div>

                        </div>

                    </div>


                    {{-- MENSAJE --}}

                    <div class="prisma-brand-message">

                        <div class="small-title">
                            SISTEMA DE GESTIÓN
                        </div>

                        <h1>
                            Todo lo que necesitas,
                            en un solo lugar.
                        </h1>

                        <p>
                            Administra productos, inventario,
                            compras, ventas y facturación
                            desde una plataforma centralizada.
                        </p>


                        {{-- CARACTERÍSTICAS --}}

                        <div class="prisma-features">


                            <div class="prisma-feature">

                                <span class="prisma-feature-icon">

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >

                                        <path d="M3 3h18v18H3z"/>

                                        <path d="M7 7h10"/>

                                        <path d="M7 11h10"/>

                                        <path d="M7 15h6"/>

                                    </svg>

                                </span>

                                Control de inventario

                            </div>


                            <div class="prisma-feature">

                                <span class="prisma-feature-icon">

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >

                                        <path d="M3 4h2l2.5 12h10L20 8H6"/>

                                        <circle
                                            cx="10"
                                            cy="20"
                                            r="1"
                                        />

                                        <circle
                                            cx="17"
                                            cy="20"
                                            r="1"
                                        />

                                    </svg>

                                </span>

                                Gestión de ventas

                            </div>


                            <div class="prisma-feature">

                                <span class="prisma-feature-icon">

                                    <svg
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    >

                                        <path d="M6 3h12v18l-3-2-3 2-3-2-3 2V3Z"/>

                                        <path d="M9 8h6M9 12h6M9 16h4"/>

                                    </svg>

                                </span>

                                Facturación y reportes

                            </div>


                        </div>

                    </div>

                </div>


                {{-- PIE --}}

                <div class="prisma-brand-bottom">

                    © {{ date('Y') }} Supermercado Prisma

                </div>

            </section>


            {{-- =========================================
                 PANEL DERECHO
            ========================================== --}}

            <section class="prisma-form-panel">

                <div class="prisma-form-container">


                    {{-- ESTADO DE SESIÓN --}}

                    @if (session('status'))

                        <div class="prisma-session-status">

                            {{ session('status') }}

                        </div>

                    @endif


                    {{-- ENCABEZADO --}}

                    <div class="prisma-form-header">

                        <h2>
                            Iniciar sesión
                        </h2>

                        <p>
                            Ingresa tus credenciales para acceder al sistema.
                        </p>

                    </div>


                    {{-- FORMULARIO --}}

                    <form
                        method="POST"
                        action="{{ route('login') }}"
                    >

                        @csrf


                        {{-- CORREO ELECTRÓNICO --}}

                        <div class="prisma-field">

                            <label
                                for="email"
                                class="prisma-label"
                            >
                                Correo electrónico
                            </label>

                            <input
                                id="email"
                                class="prisma-input"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="correo@prisma.com"
                                required
                                autofocus
                                autocomplete="username"
                            >

                            @if ($errors->get('email'))

                                <div class="prisma-error">

                                    @foreach ($errors->get('email') as $error)

                                        <div>
                                            {{ $error }}
                                        </div>

                                    @endforeach

                                </div>

                            @endif

                        </div>


                        {{-- CONTRASEÑA --}}

                        <div class="prisma-field">

                            <label
                                for="password"
                                class="prisma-label"
                            >
                                Contraseña
                            </label>

                            <input
                                id="password"
                                class="prisma-input"
                                type="password"
                                name="password"
                                placeholder="Ingresa tu contraseña"
                                required
                                autocomplete="current-password"
                            >

                            @if ($errors->get('password'))

                                <div class="prisma-error">

                                    @foreach ($errors->get('password') as $error)

                                        <div>
                                            {{ $error }}
                                        </div>

                                    @endforeach

                                </div>

                            @endif

                        </div>


                        {{-- OPCIONES --}}

                        <div class="prisma-options">

                            <label
                                for="remember_me"
                                class="prisma-remember"
                            >

                                <input
                                    id="remember_me"
                                    type="checkbox"
                                    name="remember"
                                >

                                <span>
                                    Recordarme
                                </span>

                            </label>


                            @if (Route::has('password.request'))

                                <a
                                    class="prisma-forgot"
                                    href="{{ route('password.request') }}"
                                >
                                    ¿Olvidaste tu contraseña?
                                </a>

                            @endif

                        </div>


                        {{-- BOTÓN DE INICIO DE SESIÓN --}}

                        <button
                            type="submit"
                            class="prisma-login-button"
                        >
                            INICIAR SESIÓN
                        </button>


                        {{-- SEGURIDAD --}}

                        <div class="prisma-security">

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <rect
                                    x="5"
                                    y="11"
                                    width="14"
                                    height="10"
                                    rx="2"
                                />

                                <path d="M8 11V7a4 4 0 0 1 8 0v4"/>

                            </svg>

                            Acceso protegido y seguro

                        </div>


                    </form>

                </div>

            </section>


        </div>

    </div>

</body>

</html>