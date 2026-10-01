<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Acceso denegado | Prisma</title>

    <style>

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            background: #f5f7fb;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #172033;
        }

        .error-container {
            width: 90%;
            max-width: 520px;
            text-align: center;
            background: #ffffff;
            border: 1px solid #e8ebf0;
            border-radius: 18px;
            padding: 45px 35px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, .06);
        }

        .logo {
            width: 64px;
            height: 64px;
            margin: 0 auto 25px;
            border-radius: 16px;
            background: #eef2ff;
            color: #4f46e5;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo svg {
            width: 32px;
            height: 32px;
        }

        .error-code {
            font-size: 64px;
            font-weight: 800;
            color: #172033;
            line-height: 1;
        }

        .error-title {
            margin-top: 15px;
            font-size: 24px;
            font-weight: 700;
        }

        .error-message {
            margin-top: 10px;
            color: #6b7280;
            font-size: 15px;
            line-height: 1.6;
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        .button {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            transition: .2s ease;
        }

        .button-primary {
            background: #4f46e5;
            color: white;
        }

        .button-primary:hover {
            background: #4338ca;
            transform: translateY(-1px);
        }

        .button-secondary {
            background: #f1f3f7;
            color: #374151;
        }

        .button-secondary:hover {
            background: #e5e7eb;
        }

        .system-name {
            margin-top: 30px;
            font-size: 13px;
            color: #9ca3af;
        }

    </style>

</head>


<body>

    <div class="error-container">


        <!-- ICONO -->

        <div class="logo">

            <svg
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                viewBox="0 0 24 24">

                <path d="M12 3 4 6v5c0 4.5 3.4 8.2 8 10 4.6-1.8 8-5.5 8-10V6l-8-3Z"/>

                <path d="M12 8v4"/>

                <circle cx="12" cy="16" r=".7" fill="currentColor"/>

            </svg>

        </div>


        <!-- CODIGO -->

        <div class="error-code">
            403
        </div>


        <!-- TITULO -->

        <div class="error-title">
            Acceso denegado
        </div>


        <!-- MENSAJE -->

        <div class="error-message">
            No tienes los permisos necesarios para realizar esta acción.
            Si consideras que deberías tener acceso, comunícate con el administrador del sistema.
        </div>


        <!-- BOTONES -->

        <div class="buttons">

            <a
                href="{{ route('dashboard') }}"
                class="button button-primary">

                Volver al Dashboard

            </a>


            <a
                href="javascript:history.back()"
                class="button button-secondary">

                Regresar

            </a>

        </div>


        <!-- SISTEMA -->

        <div class="system-name">

            Supermercado Prisma · Sistema de gestión

        </div>


    </div>

</body>

</html>