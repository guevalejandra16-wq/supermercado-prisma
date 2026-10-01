<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Compra;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function ventas(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $query = Venta::with([
            'cliente',
            'usuario',
            'detalles.producto'
        ])->orderBy('fecha', 'desc');

        if ($fechaInicio) {
            $query->whereDate('fecha', '>=', $fechaInicio);
        }

        if ($fechaFin) {
            $query->whereDate('fecha', '<=', $fechaFin);
        }

        $ventas = $query->get();

        $totalVentas = $ventas->count();

        $subtotal = $ventas->sum('subtotal');

        $descuentos = $ventas->sum('descuento');

        $impuestos = $ventas->sum('impuesto');

        $total = $ventas->sum('total');

        return view('reportes.ventas', compact(
            'ventas',
            'fechaInicio',
            'fechaFin',
            'totalVentas',
            'subtotal',
            'descuentos',
            'impuestos',
            'total'
        ));
    }


    public function imprimirVentas(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $query = Venta::with([
            'cliente',
            'usuario',
            'detalles.producto'
        ])->orderBy('fecha', 'desc');

        if ($fechaInicio) {
            $query->whereDate('fecha', '>=', $fechaInicio);
        }

        if ($fechaFin) {
            $query->whereDate('fecha', '<=', $fechaFin);
        }

        $ventas = $query->get();

        $totalVentas = $ventas->count();

        $subtotal = $ventas->sum('subtotal');

        $descuentos = $ventas->sum('descuento');

        $impuestos = $ventas->sum('impuesto');

        $total = $ventas->sum('total');

        return view('reportes.ventas-print', compact(
            'ventas',
            'fechaInicio',
            'fechaFin',
            'totalVentas',
            'subtotal',
            'descuentos',
            'impuestos',
            'total'
        ));
    }


    public function compras(Request $request)
    {
        $fechaInicio = $request->input('fecha_inicio');
        $fechaFin = $request->input('fecha_fin');

        $query = Compra::with([
            'proveedor',
            'usuario',
            'detalles.producto'
        ])->orderBy('fecha', 'desc');

        if ($fechaInicio) {
            $query->whereDate('fecha', '>=', $fechaInicio);
        }

        if ($fechaFin) {
            $query->whereDate('fecha', '<=', $fechaFin);
        }

        $compras = $query->get();

        $totalCompras = $compras->count();

        $subtotal = $compras->sum('subtotal');

        $impuestos = $compras->sum('impuesto');

        $total = $compras->sum('total');

        return view('reportes.compras', compact(
            'compras',
            'fechaInicio',
            'fechaFin',
            'totalCompras',
            'subtotal',
            'impuestos',
            'total'
        ));
    }

    public function imprimirCompras(Request $request)
{
    $fechaInicio = $request->input('fecha_inicio');
    $fechaFin = $request->input('fecha_fin');

    $query = Compra::with([
        'proveedor',
        'usuario',
        'detalles.producto'
    ])->orderBy('fecha', 'desc');

    if ($fechaInicio) {
        $query->whereDate('fecha', '>=', $fechaInicio);
    }

    if ($fechaFin) {
        $query->whereDate('fecha', '<=', $fechaFin);
    }

    $compras = $query->get();

    $totalCompras = $compras->count();
    $subtotal = $compras->sum('subtotal');
    $impuestos = $compras->sum('impuesto');
    $total = $compras->sum('total');

    return view('reportes.compras-print', compact(
        'compras',
        'fechaInicio',
        'fechaFin',
        'totalCompras',
        'subtotal',
        'impuestos',
        'total'
    ));
}

public function inventario(Request $request)
{
    $categoriaId = $request->input('categoria_id');
    $estadoStock = $request->input('estado_stock');

    $query = \App\Models\Producto::with([
        'categoria',
        'proveedor',
    ])
        ->orderBy('nombre');

    if ($categoriaId) {
        $query->where('categoria_id', $categoriaId);
    }

    $productos = $query->get();

    $productos = $productos->map(function ($producto) {

        if ($producto->stock <= 0) {
            $estado = 'AGOTADO';
        } elseif ($producto->stock <= $producto->stock_minimo) {
            $estado = 'STOCK BAJO';
        } else {
            $estado = 'DISPONIBLE';
        }

        $producto->estado_stock = $estado;

        return $producto;
    });

    if ($estadoStock) {
        $productos = $productos->filter(
            function ($producto) use ($estadoStock) {
                return $producto->estado_stock === $estadoStock;
            }
        );
    }

    $totalProductos = $productos->count();

    $totalUnidades = $productos->sum('stock');

    $productosAgotados = $productos
        ->where('estado_stock', 'AGOTADO')
        ->count();

    $productosStockBajo = $productos
        ->where('estado_stock', 'STOCK BAJO')
        ->count();

    $productosDisponibles = $productos
        ->where('estado_stock', 'DISPONIBLE')
        ->count();

    $categorias = \App\Models\Categoria::where('estado', true)
        ->orderBy('nombre')
        ->get();

    return view('reportes.inventario', compact(
        'productos',
        'categorias',
        'categoriaId',
        'estadoStock',
        'totalProductos',
        'totalUnidades',
        'productosAgotados',
        'productosStockBajo',
        'productosDisponibles'
    ));
}


public function imprimirInventario(Request $request)
{
    $categoriaId = $request->input('categoria_id');
    $estadoStock = $request->input('estado_stock');

    $query = \App\Models\Producto::with([
        'categoria',
        'proveedor',
    ])
        ->orderBy('nombre');

    if ($categoriaId) {
        $query->where('categoria_id', $categoriaId);
    }

    $productos = $query->get();

    $productos = $productos->map(function ($producto) {

        if ($producto->stock <= 0) {
            $estado = 'AGOTADO';
        } elseif ($producto->stock <= $producto->stock_minimo) {
            $estado = 'STOCK BAJO';
        } else {
            $estado = 'DISPONIBLE';
        }

        $producto->estado_stock = $estado;

        return $producto;
    });

    if ($estadoStock) {
        $productos = $productos->filter(
            function ($producto) use ($estadoStock) {
                return $producto->estado_stock === $estadoStock;
            }
        );
    }

    $totalProductos = $productos->count();

    $totalUnidades = $productos->sum('stock');

    $productosAgotados = $productos
        ->where('estado_stock', 'AGOTADO')
        ->count();

    $productosStockBajo = $productos
        ->where('estado_stock', 'STOCK BAJO')
        ->count();

    $productosDisponibles = $productos
        ->where('estado_stock', 'DISPONIBLE')
        ->count();

    return view('reportes.inventario-print', compact(
        'productos',
        'categoriaId',
        'estadoStock',
        'totalProductos',
        'totalUnidades',
        'productosAgotados',
        'productosStockBajo',
        'productosDisponibles'
    ));
}
}