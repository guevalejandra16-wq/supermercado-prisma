<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Privilege;

class PrivilegeSeeder extends Seeder
{
    public function run(): void
    {
        $privilegios = [
            // Usuarios
            ['nombre' => 'usuarios.ver', 'descripcion' => 'Ver usuarios', 'modulo' => 'Usuarios'],
            ['nombre' => 'usuarios.crear', 'descripcion' => 'Crear usuarios', 'modulo' => 'Usuarios'],
            ['nombre' => 'usuarios.editar', 'descripcion' => 'Editar usuarios', 'modulo' => 'Usuarios'],
            ['nombre' => 'usuarios.eliminar', 'descripcion' => 'Eliminar usuarios', 'modulo' => 'Usuarios'],

            // Roles y privilegios
            ['nombre' => 'roles.ver', 'descripcion' => 'Ver roles', 'modulo' => 'Roles'],
            ['nombre' => 'roles.crear', 'descripcion' => 'Crear roles', 'modulo' => 'Roles'],
            ['nombre' => 'roles.editar', 'descripcion' => 'Editar roles', 'modulo' => 'Roles'],
            ['nombre' => 'roles.eliminar', 'descripcion' => 'Eliminar roles', 'modulo' => 'Roles'],

            // Productos
            ['nombre' => 'productos.ver', 'descripcion' => 'Ver productos', 'modulo' => 'Productos'],
            ['nombre' => 'productos.crear', 'descripcion' => 'Crear productos', 'modulo' => 'Productos'],
            ['nombre' => 'productos.editar', 'descripcion' => 'Editar productos', 'modulo' => 'Productos'],
            ['nombre' => 'productos.eliminar', 'descripcion' => 'Eliminar productos', 'modulo' => 'Productos'],

            // Categorías
            ['nombre' => 'categorias.ver', 'descripcion' => 'Ver categorías', 'modulo' => 'Categorías'],
            ['nombre' => 'categorias.crear', 'descripcion' => 'Crear categorías', 'modulo' => 'Categorías'],
            ['nombre' => 'categorias.editar', 'descripcion' => 'Editar categorías', 'modulo' => 'Categorías'],
            ['nombre' => 'categorias.eliminar', 'descripcion' => 'Eliminar categorías', 'modulo' => 'Categorías'],

            // Proveedores
            ['nombre' => 'proveedores.ver', 'descripcion' => 'Ver proveedores', 'modulo' => 'Proveedores'],
            ['nombre' => 'proveedores.crear', 'descripcion' => 'Crear proveedores', 'modulo' => 'Proveedores'],
            ['nombre' => 'proveedores.editar', 'descripcion' => 'Editar proveedores', 'modulo' => 'Proveedores'],
            ['nombre' => 'proveedores.eliminar', 'descripcion' => 'Eliminar proveedores', 'modulo' => 'Proveedores'],

            // Clientes
            ['nombre' => 'clientes.ver', 'descripcion' => 'Ver clientes', 'modulo' => 'Clientes'],
            ['nombre' => 'clientes.crear', 'descripcion' => 'Crear clientes', 'modulo' => 'Clientes'],
            ['nombre' => 'clientes.editar', 'descripcion' => 'Editar clientes', 'modulo' => 'Clientes'],
            ['nombre' => 'clientes.eliminar', 'descripcion' => 'Eliminar clientes', 'modulo' => 'Clientes'],

            // Compras
            ['nombre' => 'compras.ver', 'descripcion' => 'Ver compras', 'modulo' => 'Compras'],
            ['nombre' => 'compras.crear', 'descripcion' => 'Registrar compras', 'modulo' => 'Compras'],
            ['nombre' => 'compras.editar', 'descripcion' => 'Editar compras', 'modulo' => 'Compras'],
            ['nombre' => 'compras.eliminar', 'descripcion' => 'Eliminar compras', 'modulo' => 'Compras'],

            // Ventas
            ['nombre' => 'ventas.ver', 'descripcion' => 'Ver ventas', 'modulo' => 'Ventas'],
            ['nombre' => 'ventas.crear', 'descripcion' => 'Registrar ventas', 'modulo' => 'Ventas'],
            ['nombre' => 'ventas.editar', 'descripcion' => 'Editar ventas', 'modulo' => 'Ventas'],
            ['nombre' => 'ventas.eliminar', 'descripcion' => 'Eliminar ventas', 'modulo' => 'Ventas'],

            // Facturas
            ['nombre' => 'facturas.ver', 'descripcion' => 'Ver facturas', 'modulo' => 'Facturas'],
            ['nombre' => 'facturas.imprimir', 'descripcion' => 'Imprimir facturas', 'modulo' => 'Facturas'],
            ['nombre' => 'facturas.reimprimir', 'descripcion' => 'Reimprimir facturas', 'modulo' => 'Facturas'],

            // Inventario
            ['nombre' => 'inventario.ver', 'descripcion' => 'Ver inventario', 'modulo' => 'Inventario'],
            ['nombre' => 'inventario.movimientos', 'descripcion' => 'Ver movimientos de inventario', 'modulo' => 'Inventario'],
            ['nombre' => 'inventario.stock_bajo', 'descripcion' => 'Consultar productos con stock bajo', 'modulo' => 'Inventario'],

            // Reportes
            ['nombre' => 'reportes.ventas', 'descripcion' => 'Consultar reportes de ventas', 'modulo' => 'Reportes'],
            ['nombre' => 'reportes.compras', 'descripcion' => 'Consultar reportes de compras', 'modulo' => 'Reportes'],
            ['nombre' => 'reportes.inventario', 'descripcion' => 'Consultar reportes de inventario', 'modulo' => 'Reportes'],
        ];

        foreach ($privilegios as $privilegio) {
            Privilege::create($privilegio + ['estado' => true]);
        }
    }
}