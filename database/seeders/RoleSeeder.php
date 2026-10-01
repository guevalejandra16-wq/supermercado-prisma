<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::create([
            'nombre' => 'Administrador',
            'descripcion' => 'Acceso completo al sistema.',
            'estado' => true,
        ]);

        Role::create([
            'nombre' => 'Encargado de Inventario',
            'descripcion' => 'Gestiona productos, categorías, proveedores, compras e inventario.',
            'estado' => true,
        ]);

        Role::create([
            'nombre' => 'Cajero',
            'descripcion' => 'Gestiona clientes, ventas y facturación.',
            'estado' => true,
        ]);
    }
}