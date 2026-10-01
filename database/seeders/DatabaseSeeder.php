<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Privilege;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Crear roles
        $this->call([
            RoleSeeder::class,
            PrivilegeSeeder::class,
            UserSeeder::class,
        ]);

        // Obtener roles
        $administrador = Role::where('nombre', 'Administrador')->first();
        $inventario = Role::where('nombre', 'Encargado de Inventario')->first();
        $cajero = Role::where('nombre', 'Cajero')->first();

        // Obtener privilegios
        $todos = Privilege::pluck('id');

        // Administrador: todos los privilegios
        $administrador->privileges()->sync($todos);

        // Encargado de Inventario
        $inventario->privileges()->sync(
            Privilege::whereIn('modulo', [
                'Productos',
                'Categorías',
                'Proveedores',
                'Compras',
                'Inventario',
            ])->pluck('id')
        );

        // Cajero
        $cajero->privileges()->sync(
            Privilege::whereIn('modulo', [
                'Clientes',
                'Ventas',
                'Facturas',
            ])->pluck('id')
        );
    }
}