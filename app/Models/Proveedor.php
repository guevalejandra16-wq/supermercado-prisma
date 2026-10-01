<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proveedor extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'rtn',
        'telefono',
        'correo',
        'contacto',
        'direccion',
        'estado',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function productos(): HasMany
    {
        return $this->hasMany(Producto::class, 'proveedor_id');
    }

    public function compras(): HasMany
    {
        return $this->hasMany(Compra::class, 'proveedor_id');
    }
}