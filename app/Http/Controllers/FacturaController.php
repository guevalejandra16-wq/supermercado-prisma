<?php

namespace App\Http\Controllers;

use App\Models\Factura;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::with([
            'venta.cliente',
            'venta.usuario'
        ])
            ->orderBy('id', 'desc')
            ->get();

        return view('facturas.index', compact('facturas'));
    }

    public function show($id)
    {
        $factura = Factura::with([
            'venta.cliente',
            'venta.usuario',
            'venta.detalles.producto'
        ])->findOrFail($id);

        return view('facturas.show', compact('factura'));
    }

    public function print($id)
    {
        $factura = Factura::with([
            'venta.cliente',
            'venta.usuario',
            'venta.detalles.producto'
        ])->findOrFail($id);

        return view('facturas.print', compact('factura'));
    }
}