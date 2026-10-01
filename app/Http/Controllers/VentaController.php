<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Factura;
use App\Models\MovimientoInventario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class VentaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LISTADO DE VENTAS
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $ventas = Venta::with([
            'cliente',
            'usuario'
        ])
            ->orderBy('id', 'desc')
            ->get();

        return view('ventas.index', compact('ventas'));
    }


    /*
    |--------------------------------------------------------------------------
    | FORMULARIO DE NUEVA VENTA
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $clientes = Cliente::where('estado', true)
            ->orderBy('nombre')
            ->orderBy('apellido')
            ->get();

        $productos = Producto::where('estado', true)
            ->where('stock', '>', 0)
            ->orderBy('nombre')
            ->get();

        return view('ventas.create', compact(
            'clientes',
            'productos'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | REGISTRAR VENTA + FACTURA
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([

            'cliente_id' => [
                'nullable',
                'exists:clientes,id'
            ],

            'fecha' => [
                'required',
                'date'
            ],

            'descuento' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            /*
             * El usuario introduce el porcentaje.
             * Ejemplo: 15 = 15%.
             */
            'impuesto_porcentaje' => [
                'required',
                'numeric',
                'min:0',
                'max:100'
            ],

            'metodo_pago' => [
                'required',
                'in:EFECTIVO,TARJETA,TRANSFERENCIA'
            ],

            'efectivo_recibido' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            'detalles' => [
                'required',
                'array',
                'min:1'
            ],

            'detalles.*.producto_id' => [
                'required',
                'exists:productos,id'
            ],

            'detalles.*.cantidad' => [
                'required',
                'integer',
                'min:1'
            ],

            'detalles.*.precio' => [
                'required',
                'numeric',
                'min:0'
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | VARIABLES INICIALES
        |--------------------------------------------------------------------------
        */

        $descuento = $validated['descuento'] ?? 0;

        $impuestoPorcentaje =
            $validated['impuesto_porcentaje'];

        $metodoPago =
            $validated['metodo_pago'];

        $efectivoRecibido =
            $validated['efectivo_recibido'] ?? 0;


        /*
        |--------------------------------------------------------------------------
        | TRANSACCIÓN
        |--------------------------------------------------------------------------
        */

        $factura = DB::transaction(function () use (
            $validated,
            $descuento,
            $impuestoPorcentaje,
            $metodoPago,
            $efectivoRecibido
        ) {

            /*
            |--------------------------------------------------------------------------
            | CALCULAR SUBTOTAL
            |--------------------------------------------------------------------------
            */

            $subtotal = 0;


            foreach ($validated['detalles'] as $detalle) {

                $producto = Producto::findOrFail(
                    $detalle['producto_id']
                );


                /*
                |--------------------------------------------------------------------------
                | VERIFICAR STOCK
                |--------------------------------------------------------------------------
                */

                if (
                    $producto->stock <
                    $detalle['cantidad']
                ) {

                    throw ValidationException::withMessages([

                        'detalles' =>
                            'No hay suficiente stock de "' .
                            $producto->nombre .
                            '". Stock disponible: ' .
                            $producto->stock .
                            '.'

                    ]);

                }


                /*
                |--------------------------------------------------------------------------
                | SUBTOTAL
                |--------------------------------------------------------------------------
                */

                $subtotalDetalle =
                    $detalle['cantidad'] *
                    $detalle['precio'];

                $subtotal +=
                    $subtotalDetalle;
            }


            /*
            |--------------------------------------------------------------------------
            | VALIDAR DESCUENTO
            |--------------------------------------------------------------------------
            */

            if ($descuento > $subtotal) {

                throw ValidationException::withMessages([

                    'descuento' =>
                        'El descuento no puede ser mayor que el subtotal.'

                ]);

            }


            /*
            |--------------------------------------------------------------------------
            | BASE IMPONIBLE
            |--------------------------------------------------------------------------
            */

            $baseImponible =
                max(
                    0,
                    $subtotal - $descuento
                );


            /*
            |--------------------------------------------------------------------------
            | CALCULAR IMPUESTO
            |--------------------------------------------------------------------------
            |
            | Ejemplo:
            |
            | Base = L 100
            | Impuesto = 15%
            |
            | 100 × 15 / 100 = L 15
            |
            */

            $impuesto =
                $baseImponible *
                ($impuestoPorcentaje / 100);


            /*
            |--------------------------------------------------------------------------
            | TOTAL
            |--------------------------------------------------------------------------
            */

            $total =
                $baseImponible +
                $impuesto;


            /*
            |--------------------------------------------------------------------------
            | VALIDAR EFECTIVO
            |--------------------------------------------------------------------------
            */

            if (
                $metodoPago === 'EFECTIVO' &&
                $efectivoRecibido < $total
            ) {

                throw ValidationException::withMessages([

                    'efectivo_recibido' =>
                        'El efectivo recibido no puede ser menor que el total de la venta.'

                ]);

            }


            /*
            |--------------------------------------------------------------------------
            | CALCULAR CAMBIO
            |--------------------------------------------------------------------------
            */

            $cambio = 0;


            if ($metodoPago === 'EFECTIVO') {

                $cambio =
                    $efectivoRecibido -
                    $total;
            }


            /*
            |--------------------------------------------------------------------------
            | GENERAR NÚMERO DE VENTA
            |--------------------------------------------------------------------------
            */

            $ultimoId =
                Venta::orderBy(
                    'id',
                    'desc'
                )->value('id') ?? 0;


            $numeroVenta =
                'VEN-' .
                str_pad(
                    $ultimoId + 1,
                    6,
                    '0',
                    STR_PAD_LEFT
                );


            /*
            |--------------------------------------------------------------------------
            | CREAR VENTA
            |--------------------------------------------------------------------------
            */

            $venta = Venta::create([

                'cliente_id' =>
                    $validated['cliente_id'] ?? null,

                'user_id' =>
                    auth()->id(),

                'numero_venta' =>
                    $numeroVenta,

                'fecha' =>
                    $validated['fecha'],

                'subtotal' =>
                    $subtotal,

                'descuento' =>
                    $descuento,

                /*
                 * Aquí se guarda el MONTO del impuesto,
                 * no el porcentaje.
                 */
                'impuesto' =>
                    $impuesto,

                'total' =>
                    $total,

                'metodo_pago' =>
                    $metodoPago,

                'efectivo_recibido' =>
                    $efectivoRecibido,

                'cambio' =>
                    $cambio,

                'estado' =>
                    'COMPLETADA',
            ]);


            /*
            |--------------------------------------------------------------------------
            | DETALLES + STOCK + MOVIMIENTO
            |--------------------------------------------------------------------------
            */

            foreach ($validated['detalles'] as $detalle) {

                $producto =
                    Producto::findOrFail(
                        $detalle['producto_id']
                    );


                $subtotalDetalle =
                    $detalle['cantidad'] *
                    $detalle['precio'];


                /*
                |--------------------------------------------------------------------------
                | DETALLE DE VENTA
                |--------------------------------------------------------------------------
                */

                DetalleVenta::create([

                    'venta_id' =>
                        $venta->id,

                    'producto_id' =>
                        $producto->id,

                    'cantidad' =>
                        $detalle['cantidad'],

                    'precio' =>
                        $detalle['precio'],

                    'descuento' =>
                        0,

                    'subtotal' =>
                        $subtotalDetalle,
                ]);


                /*
                |--------------------------------------------------------------------------
                | DESCONTAR STOCK
                |--------------------------------------------------------------------------
                */

                $producto->decrement(
                    'stock',
                    $detalle['cantidad']
                );


                /*
                |--------------------------------------------------------------------------
                | REGISTRAR MOVIMIENTO
                |--------------------------------------------------------------------------
                */

                MovimientoInventario::create([

                    'producto_id' =>
                        $producto->id,

                    'user_id' =>
                        auth()->id(),

                    'tipo' =>
                        'SALIDA',

                    'cantidad' =>
                        $detalle['cantidad'],

                    'motivo' =>
                        'Venta de productos',

                    'referencia' =>
                        $numeroVenta,

                    'fecha' =>
                        $validated['fecha'],
                ]);
            }


            /*
            |--------------------------------------------------------------------------
            | GENERAR NÚMERO DE FACTURA
            |--------------------------------------------------------------------------
            */

            $ultimoIdFactura =
                Factura::orderBy(
                    'id',
                    'desc'
                )->value('id') ?? 0;


            $numeroFactura =
                'FAC-' .
                str_pad(
                    $ultimoIdFactura + 1,
                    6,
                    '0',
                    STR_PAD_LEFT
                );


            /*
            |--------------------------------------------------------------------------
            | CREAR FACTURA AUTOMÁTICAMENTE
            |--------------------------------------------------------------------------
            */

            $factura = Factura::create([

                'venta_id' =>
                    $venta->id,

                'numero_factura' =>
                    $numeroFactura,

                'fecha' =>
                    $validated['fecha'],

                'subtotal' =>
                    $subtotal,

                'descuento' =>
                    $descuento,

                /*
                 * Se guarda el monto calculado.
                 */
                'impuesto' =>
                    $impuesto,

                'total' =>
                    $total,
            ]);


            /*
            |--------------------------------------------------------------------------
            | DEVOLVER FACTURA
            |--------------------------------------------------------------------------
            */

            return $factura;
        });


        /*
        |--------------------------------------------------------------------------
        | REDIRECCIÓN
        |--------------------------------------------------------------------------
        |
        | La venta y la factura ya existen.
        | Ahora llevamos directamente a la factura.
        |
        */

        return redirect()
            ->route(
                'facturas.show',
                $factura->id
            )
            ->with(
                'success',
                'Venta registrada y factura generada correctamente.'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | MOSTRAR VENTA
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $venta = Venta::with([

            'cliente',

            'usuario',

            'detalles.producto',

            'factura'

        ])->findOrFail($id);


        return view(
            'ventas.show',
            compact('venta')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | ELIMINAR VENTA
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        DB::transaction(function () use ($id) {

            $venta = Venta::with(
                'detalles'
            )->findOrFail($id);


            /*
            |--------------------------------------------------------------------------
            | RESTAURAR STOCK
            |--------------------------------------------------------------------------
            */

            foreach ($venta->detalles as $detalle) {

                $producto =
                    Producto::find(
                        $detalle->producto_id
                    );


                if ($producto) {

                    $producto->increment(
                        'stock',
                        $detalle->cantidad
                    );


                    /*
                    |--------------------------------------------------------------------------
                    | MOVIMIENTO DE REVERSIÓN
                    |--------------------------------------------------------------------------
                    */

                    MovimientoInventario::create([

                        'producto_id' =>
                            $producto->id,

                        'user_id' =>
                            auth()->id(),

                        'tipo' =>
                            'ENTRADA',

                        'cantidad' =>
                            $detalle->cantidad,

                        'motivo' =>
                            'Reversión de venta eliminada',

                        'referencia' =>
                            $venta->numero_venta,

                        'fecha' =>
                            now(),
                    ]);
                }
            }


            /*
            |--------------------------------------------------------------------------
            | ELIMINAR FACTURA
            |--------------------------------------------------------------------------
            */

            Factura::where(
                'venta_id',
                $venta->id
            )->delete();


            /*
            |--------------------------------------------------------------------------
            | ELIMINAR DETALLES
            |--------------------------------------------------------------------------
            */

            DetalleVenta::where(
                'venta_id',
                $venta->id
            )->delete();


            /*
            |--------------------------------------------------------------------------
            | ELIMINAR VENTA
            |--------------------------------------------------------------------------
            */

            $venta->delete();
        });


        return redirect()
            ->route('ventas.index')
            ->with(
                'success',
                'Venta eliminada y stock restaurado correctamente.'
            );
    }
}