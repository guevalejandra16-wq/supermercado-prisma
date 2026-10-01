<x-app-layout>

    <div class="compras-edit-page">

        {{-- ============================================
             ENCABEZADO
        ============================================= --}}

        <div class="page-header">

            <div class="header-left">

                <a href="{{ route('compras.show', $compra->id) }}"
                   class="back-button">

                    <svg width="18" height="18"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M19 12H5"/>
                        <path d="M12 19l-7-7 7-7"/>

                    </svg>

                    Volver al detalle

                </a>


                <span class="header-brand">
                    SUPERMERCADO PRISMA
                </span>


                <h1>
                    Editar compra
                </h1>


                <p>
                    Modifica la información general de la compra
                    <strong>{{ $compra->numero_compra }}</strong>
                </p>

            </div>


            <div class="header-number">

                <span>
                    COMPRA
                </span>

                <strong>
                    {{ $compra->numero_compra }}
                </strong>

            </div>

        </div>


        {{-- ============================================
             ALERTA
        ============================================= --}}

        <div class="warning-card">

            <div class="warning-icon">

                <svg width="22" height="22"
                     viewBox="0 0 24 24"
                     fill="none"
                     stroke="currentColor"
                     stroke-width="2">

                    <path d="M12 9v4"/>
                    <path d="M12 17h.01"/>
                    <path d="M10.3 3.6 2.8 17a2 2 0 0 0 1.7 3h15a2 2 0 0 0 1.7-3l-7.5-13.4a2 2 0 0 0-3.4 0Z"/>

                </svg>

            </div>


            <div>

                <strong>
                    Compra vinculada al inventario
                </strong>

                <p>
                    Esta compra ya forma parte del historial del sistema.
                    Los productos y cantidades registrados no se modifican
                    desde esta pantalla para proteger la integridad del inventario.
                </p>

            </div>

        </div>


        {{-- ============================================
             ERRORES DE VALIDACIÓN
        ============================================= --}}

        @if ($errors->any())

            <div class="errors-card">

                <div class="errors-title">

                    <svg width="20" height="20"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <circle cx="12" cy="12" r="9"/>
                        <path d="M12 8v4"/>
                        <path d="M12 16h.01"/>

                    </svg>

                    Revisa los siguientes campos

                </div>


                <ul>

                    @foreach ($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- ============================================
             FORMULARIO
        ============================================= --}}

        <form action="{{ route('compras.update', $compra->id) }}"
              method="POST">

            @csrf

            @method('PUT')


            <div class="form-card">

                {{-- CABECERA DEL FORMULARIO --}}

                <div class="card-header">

                    <div>

                        <span class="section-label">
                            Información general
                        </span>

                        <h2>
                            Datos de la compra
                        </h2>

                        <p>
                            Actualiza únicamente la información administrativa.
                        </p>

                    </div>

                </div>


                {{-- CAMPOS --}}

                <div class="form-body">

                    <div class="form-grid">


                        {{-- NÚMERO DE COMPRA --}}

                        <div class="field">

                            <label>
                                Número de compra
                            </label>

                            <div class="readonly-field">

                                <svg width="18" height="18"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2">

                                    <path d="M6 2h9l5 5v15H6z"/>
                                    <path d="M15 2v6h5"/>

                                </svg>

                                <span>
                                    {{ $compra->numero_compra }}
                                </span>

                            </div>

                            <small>
                                Este número no puede modificarse.
                            </small>

                        </div>


                        {{-- PROVEEDOR --}}

                        <div class="field">

                            <label for="proveedor_id">
                                Proveedor
                                <span class="required">*</span>
                            </label>


                            <div class="input-wrapper">

                                <svg width="18" height="18"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2">

                                    <path d="M3 21h18"/>
                                    <path d="M5 21V8l7-5 7 5v13"/>
                                    <path d="M9 21v-6h6v6"/>

                                </svg>


                                <select id="proveedor_id"
                                        name="proveedor_id"
                                        required>

                                    <option value="">
                                        Selecciona un proveedor
                                    </option>


                                    @foreach($proveedores as $proveedor)

                                        <option
                                            value="{{ $proveedor->id }}"
                                            {{ old(
                                                'proveedor_id',
                                                $compra->proveedor_id
                                            ) == $proveedor->id
                                                ? 'selected'
                                                : ''
                                            }}>

                                            {{ $proveedor->nombre }}

                                        </option>

                                    @endforeach

                                </select>

                            </div>

                            @error('proveedor_id')

                                <span class="field-error">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        {{-- FECHA --}}

                        <div class="field">

                            <label for="fecha">
                                Fecha y hora
                                <span class="required">*</span>
                            </label>


                            <div class="input-wrapper">

                                <svg width="18" height="18"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2">

                                    <rect x="3" y="4"
                                          width="18"
                                          height="18"
                                          rx="2"/>

                                    <path d="M16 2v4"/>
                                    <path d="M8 2v4"/>
                                    <path d="M3 10h18"/>

                                </svg>


                                <input
                                    type="datetime-local"
                                    id="fecha"
                                    name="fecha"
                                    value="{{ old(
                                        'fecha',
                                        \Carbon\Carbon::parse(
                                            $compra->fecha
                                        )->format('Y-m-d\TH:i')
                                    ) }}"
                                    required
                                >

                            </div>

                            @error('fecha')

                                <span class="field-error">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        {{-- ESTADO --}}

                        <div class="field">

                            <label for="estado">
                                Estado
                                <span class="required">*</span>
                            </label>


                            <div class="input-wrapper">

                                <svg width="18" height="18"
                                     viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor"
                                     stroke-width="2">

                                    <circle cx="12" cy="12" r="9"/>
                                    <path d="m9 12 2 2 4-4"/>

                                </svg>


                                <select id="estado"
                                        name="estado"
                                        required>

                                    <option
                                        value="COMPLETADA"
                                        {{ old(
                                            'estado',
                                            $compra->estado
                                        ) === 'COMPLETADA'
                                            ? 'selected'
                                            : ''
                                        }}>

                                        COMPLETADA

                                    </option>


                                    <option
                                        value="PENDIENTE"
                                        {{ old(
                                            'estado',
                                            $compra->estado
                                        ) === 'PENDIENTE'
                                            ? 'selected'
                                            : ''
                                        }}>

                                        PENDIENTE

                                    </option>


                                    <option
                                        value="CANCELADA"
                                        {{ old(
                                            'estado',
                                            $compra->estado
                                        ) === 'CANCELADA'
                                            ? 'selected'
                                            : ''
                                        }}>

                                        CANCELADA

                                    </option>

                                </select>

                            </div>

                            @error('estado')

                                <span class="field-error">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>

                    </div>

                </div>

            </div>


            {{-- ============================================
                 RESUMEN DE LA COMPRA
            ============================================= --}}

            <div class="summary-card">

                <div class="summary-header">

                    <div>

                        <span class="section-label">
                            Resumen
                        </span>

                        <h2>
                            Compra registrada
                        </h2>

                    </div>

                </div>


                <div class="summary-grid">


                    {{-- PRODUCTOS --}}

                    <div class="summary-item">

                        <div class="summary-icon">

                            <svg width="20" height="20"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <path d="M6 2h12l2 5H4l2-5Z"/>
                                <path d="M4 7h16v15H4z"/>

                            </svg>

                        </div>


                        <div>

                            <span>
                                Productos
                            </span>

                            <strong>
                                {{ $compra->detalles->sum('cantidad') }}
                                unidades
                            </strong>

                        </div>

                    </div>


                    {{-- DETALLES --}}

                    <div class="summary-item">

                        <div class="summary-icon">

                            <svg width="20" height="20"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <path d="M8 6h13"/>
                                <path d="M8 12h13"/>
                                <path d="M8 18h13"/>
                                <path d="M3 6h.01"/>
                                <path d="M3 12h.01"/>
                                <path d="M3 18h.01"/>

                            </svg>

                        </div>


                        <div>

                            <span>
                                Detalles
                            </span>

                            <strong>
                                {{ $compra->detalles->count() }}
                                {{ $compra->detalles->count() === 1
                                    ? 'producto'
                                    : 'productos'
                                }}
                            </strong>

                        </div>

                    </div>


                    {{-- TOTAL --}}

                    <div class="summary-item total-item">

                        <div class="summary-icon">

                            <svg width="20" height="20"
                                 viewBox="0 0 24 24"
                                 fill="none"
                                 stroke="currentColor"
                                 stroke-width="2">

                                <rect x="3" y="5"
                                      width="18"
                                      height="14"
                                      rx="2"/>

                                <path d="M7 10h10"/>
                                <path d="M7 14h5"/>

                            </svg>

                        </div>


                        <div>

                            <span>
                                Total
                            </span>

                            <strong>
                                L {{ number_format(
                                    $compra->total,
                                    2
                                ) }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ============================================
                 BOTONES
            ============================================= --}}

            <div class="form-actions">

                <a href="{{ route(
                    'compras.show',
                    $compra->id
                ) }}"
                   class="btn btn-secondary">

                    Cancelar

                </a>


                <button type="submit"
                        class="btn btn-primary">

                    <svg width="18" height="18"
                         viewBox="0 0 24 24"
                         fill="none"
                         stroke="currentColor"
                         stroke-width="2">

                        <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2Z"/>

                        <path d="M17 21v-8H7v8"/>

                        <path d="M7 3v5h8"/>

                    </svg>

                    Guardar cambios

                </button>

            </div>

        </form>

    </div>


    <style>

        /* ============================================
           CONTENEDOR
        ============================================ */

        .compras-edit-page {

            max-width: 1200px;

            margin: 0 auto;

            padding: 45px 32px 32px;

            color: #172033;

        }


        /* ============================================
           HEADER
        ============================================ */

        .page-header {

            background:
                linear-gradient(
                    135deg,
                    #111827,
                    #1e293b
                );

            border-radius: 18px;

            padding: 30px 32px;

            color: white;

            display: flex;

            justify-content: space-between;

            align-items: flex-end;

            gap: 25px;

            margin-bottom: 20px;

            box-shadow:
                0 12px 30px
                rgba(15, 23, 42, .12);

        }


        .header-left {

            min-width: 0;

        }


        .back-button {

            display: inline-flex;

            align-items: center;

            gap: 8px;

            background:
                rgba(255,255,255,.10);

            border:
                1px solid
                rgba(255,255,255,.18);

            color: white;

            text-decoration: none;

            font-size: 13px;

            font-weight: 700;

            padding: 9px 13px;

            border-radius: 9px;

            margin-bottom: 20px;

            transition: .2s;

        }


        .back-button:hover {

            background:
                rgba(255,255,255,.18);

            transform:
                translateX(-2px);

        }


        .header-brand {

            display: block;

            font-size: 11px;

            font-weight: 700;

            letter-spacing: 2px;

            color: #94a3b8;

            margin-bottom: 6px;

        }


        .page-header h1 {

            margin: 0;

            font-size: 30px;

            font-weight: 800;

        }


        .page-header p {

            margin: 8px 0 0;

            color: #cbd5e1;

            font-size: 14px;

        }


        .page-header p strong {

            color: white;

        }


        .header-number {

            display: flex;

            flex-direction: column;

            align-items: flex-end;

        }


        .header-number span {

            font-size: 10px;

            font-weight: 800;

            letter-spacing: 1px;

            color: #94a3b8;

        }


        .header-number strong {

            font-size: 22px;

            color: white;

        }


        /* ============================================
           ADVERTENCIA
        ============================================ */

        .warning-card {

            display: flex;

            align-items: flex-start;

            gap: 14px;

            background: #fffbeb;

            border: 1px solid #fde68a;

            border-radius: 14px;

            padding: 18px 20px;

            margin-bottom: 20px;

        }


        .warning-icon {

            width: 42px;

            height: 42px;

            border-radius: 10px;

            background: #fef3c7;

            color: #92400e;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

        }


        .warning-card strong {

            display: block;

            color: #78350f;

            font-size: 14px;

            margin-bottom: 5px;

        }


        .warning-card p {

            margin: 0;

            color: #92400e;

            font-size: 13px;

            line-height: 1.6;

        }


        /* ============================================
           ERRORES
        ============================================ */

        .errors-card {

            background: #fef2f2;

            border: 1px solid #fecaca;

            border-radius: 14px;

            padding: 18px 20px;

            margin-bottom: 20px;

            color: #991b1b;

        }


        .errors-title {

            display: flex;

            align-items: center;

            gap: 8px;

            font-weight: 800;

            font-size: 14px;

            margin-bottom: 8px;

        }


        .errors-card ul {

            margin: 0;

            padding-left: 28px;

            font-size: 13px;

        }


        .errors-card li {

            margin: 4px 0;

        }


        /* ============================================
           FORMULARIO
        ============================================ */

        .form-card {

            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 17px;

            overflow: hidden;

            box-shadow:
                0 5px 18px
                rgba(15,23,42,.05);

            margin-bottom: 20px;

        }


        .card-header {

            padding: 24px;

            border-bottom:
                1px solid #e5e7eb;

        }


        .section-label {

            display: block;

            color: #64748b;

            text-transform: uppercase;

            letter-spacing: .8px;

            font-size: 11px;

            font-weight: 800;

            margin-bottom: 5px;

        }


        .card-header h2,
        .summary-header h2 {

            margin: 0;

            font-size: 19px;

            color: #172033;

        }


        .card-header p {

            margin: 7px 0 0;

            color: #64748b;

            font-size: 13px;

        }


        .form-body {

            padding: 25px;

        }


        .form-grid {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 22px;

        }


        .field {

            min-width: 0;

        }


        .field label {

            display: block;

            color: #334155;

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 8px;

        }


        .required {

            color: #dc2626;

        }


        .input-wrapper {

            position: relative;

        }


        .input-wrapper > svg {

            position: absolute;

            left: 13px;

            top: 50%;

            transform:
                translateY(-50%);

            color: #64748b;

            pointer-events: none;

        }


        .input-wrapper input,
        .input-wrapper select {

            width: 100%;

            height: 46px;

            box-sizing: border-box;

            border:
                1px solid #dbe2ea;

            border-radius: 10px;

            background: white;

            color: #172033;

            padding:
                0 14px 0 42px;

            font-size: 14px;

            outline: none;

            transition: .2s;

        }


        .input-wrapper input:focus,
        .input-wrapper select:focus {

            border-color: #2563eb;

            box-shadow:
                0 0 0 3px
                rgba(37,99,235,.10);

        }


        .readonly-field {

            height: 46px;

            box-sizing: border-box;

            border:
                1px solid #e5e7eb;

            border-radius: 10px;

            background: #f8fafc;

            color: #475569;

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 0 14px;

            font-size: 14px;

            font-weight: 700;

        }


        .readonly-field svg {

            color: #64748b;

        }


        .field small {

            display: block;

            color: #94a3b8;

            font-size: 11px;

            margin-top: 6px;

        }


        .field-error {

            display: block;

            color: #dc2626;

            font-size: 11px;

            margin-top: 6px;

        }


        /* ============================================
           RESUMEN
        ============================================ */

        .summary-card {

            background: white;

            border:
                1px solid #e5e7eb;

            border-radius: 17px;

            box-shadow:
                0 5px 18px
                rgba(15,23,42,.05);

            margin-bottom: 20px;

            overflow: hidden;

        }


        .summary-header {

            padding: 22px 24px;

            border-bottom:
                1px solid #e5e7eb;

        }


        .summary-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 0;

        }


        .summary-item {

            padding: 22px 24px;

            display: flex;

            align-items: center;

            gap: 13px;

            border-right:
                1px solid #e5e7eb;

        }


        .summary-item:last-child {

            border-right: none;

        }


        .summary-icon {

            width: 42px;

            height: 42px;

            border-radius: 10px;

            background: #eef2ff;

            color: #1e3a8a;

            display: flex;

            align-items: center;

            justify-content: center;

            flex-shrink: 0;

        }


        .summary-item span {

            display: block;

            color: #64748b;

            font-size: 12px;

            margin-bottom: 4px;

        }


        .summary-item strong {

            display: block;

            color: #172033;

            font-size: 15px;

        }


        .total-item strong {

            color: #1e3a8a;

            font-size: 18px;

        }


        /* ============================================
           BOTONES
        ============================================ */

        .form-actions {

            display: flex;

            justify-content: flex-end;

            gap: 12px;

            padding-bottom: 10px;

        }


        .btn {

            min-height: 45px;

            padding: 0 17px;

            border-radius: 10px;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            font-size: 14px;

            font-weight: 700;

            text-decoration: none;

            border: none;

            cursor: pointer;

            transition: .2s;

        }


        .btn-secondary {

            background: white;

            color: #475569;

            border:
                1px solid #dbe2ea;

        }


        .btn-secondary:hover {

            background: #f8fafc;

        }


        .btn-primary {

            background: #2563eb;

            color: white;

            box-shadow:
                0 6px 14px
                rgba(37,99,235,.20);

        }


        .btn-primary:hover {

            background: #1d4ed8;

            transform:
                translateY(-1px);

        }


        /* ============================================
           RESPONSIVE
        ============================================ */

        @media (max-width: 850px) {

            .compras-edit-page {

                padding:
                    30px 18px 20px;

            }


            .page-header {

                flex-direction: column;

                align-items: flex-start;

            }


            .header-number {

                align-items: flex-start;

            }


            .form-grid {

                grid-template-columns: 1fr;

            }


            .summary-grid {

                grid-template-columns: 1fr;

            }


            .summary-item {

                border-right: none;

                border-bottom:
                    1px solid #e5e7eb;

            }


            .summary-item:last-child {

                border-bottom: none;

            }

        }


        @media (max-width: 550px) {

            .page-header {

                padding: 22px;

            }


            .page-header h1 {

                font-size: 25px;

            }


            .form-body {

                padding: 20px;

            }


            .form-actions {

                flex-direction: column-reverse;

            }


            .form-actions .btn {

                width: 100%;

            }

        }

    </style>

</x-app-layout>