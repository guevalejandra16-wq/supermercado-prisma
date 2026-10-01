<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Campos que se pueden guardar.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'estado',
    ];


    /**
     * Campos ocultos.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Conversión de datos.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'estado' => 'boolean',
        ];
    }


    /**
     * Roles del usuario.
     *
     * Relación muchos a muchos:
     * users <-> roles
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            Role::class,
            'role_user',
            'user_id',
            'role_id'
        );
    }


    /**
     * Ventas realizadas por el usuario.
     */
    public function ventas(): HasMany
    {
        return $this->hasMany(
            Venta::class,
            'user_id'
        );
    }


    /**
     * Compras registradas por el usuario.
     */
    public function compras(): HasMany
    {
        return $this->hasMany(
            Compra::class,
            'user_id'
        );
    }


    /**
     * Movimientos de inventario realizados
     * por el usuario.
     */
    public function movimientosInventario(): HasMany
    {
        return $this->hasMany(
            MovimientoInventario::class,
            'user_id'
        );
    }


    /**
     * Comprobar si el usuario tiene un rol.
     */
    public function hasRole(string $roleName): bool
    {
        return $this->roles()
            ->where('nombre', $roleName)
            ->where('estado', true)
            ->exists();
    }


    /**
     * Comprobar si el usuario tiene un privilegio.
     */
    public function hasPrivilege(string $privilegeName): bool
    {
        return $this->roles()
            ->where('roles.estado', true)
            ->whereHas('privileges', function ($query) use ($privilegeName) {

                $query->where('nombre', $privilegeName)
                      ->where('estado', true);

            })
            ->exists();
    }
}