<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Venta extends Model
{
    protected $table = 'ventas';

    protected $fillable = [
        'cliente_id',
        'user_id',
        'numero_venta',
        'fecha',
        'subtotal',
        'descuento',
        'impuesto',
        'total',
        'metodo_pago',
        'efectivo_recibido',
        'cambio',
        'estado',
    ];

    protected $casts = [
        'fecha' => 'datetime',
        'subtotal' => 'decimal:2',
        'descuento' => 'decimal:2',
        'impuesto' => 'decimal:2',
        'total' => 'decimal:2',
        'efectivo_recibido' => 'decimal:2',
        'cambio' => 'decimal:2',
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(DetalleVenta::class, 'venta_id');
    }

    public function factura(): HasOne
    {
        return $this->hasOne(Factura::class, 'venta_id');
    }
}