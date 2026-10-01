<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Privilege extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'modulo',
        'estado',
    ];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'privilege_role');
    }
}