<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Compra extends Model
{
    protected $table = 'compras';

    protected $fillable = [
        'proveedor_id',
        'user_id',
        'fecha',
        'numero_compra',
        'subtotal',
        'impuesto',
        'total',
        'estado',
    ];

    protected $casts = [
        'fecha' => 'datetime',
        'subtotal' => 'decimal:2',
        'impuesto' => 'decimal:2',
        'total' => 'decimal:2',
    ];

    public function proveedor(): BelongsTo
    {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }

    public function usuario(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function detalles(): HasMany
    {
        return $this->hasMany(DetalleCompra::class, 'compra_id');
    }
}