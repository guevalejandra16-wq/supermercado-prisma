<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\MovimientoInventarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Página principal
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Rutas protegidas
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {


    /*
    |--------------------------------------------------------------------------
    | Productos
    |--------------------------------------------------------------------------
    */

    Route::resource('productos', ProductoController::class)
        ->middlewareFor(
            ['index', 'show'],
            'privilege:productos.ver'
        )
        ->middlewareFor(
            ['create', 'store'],
            'privilege:productos.crear'
        )
        ->middlewareFor(
            ['edit', 'update'],
            'privilege:productos.editar'
        )
        ->middlewareFor(
            'destroy',
            'privilege:productos.eliminar'
        );


    /*
    |--------------------------------------------------------------------------
    | Categorías
    |--------------------------------------------------------------------------
    */

    Route::resource('categorias', CategoriaController::class)
        ->middlewareFor(
            ['index', 'show'],
            'privilege:categorias.ver'
        )
        ->middlewareFor(
            ['create', 'store'],
            'privilege:categorias.crear'
        )
        ->middlewareFor(
            ['edit', 'update'],
            'privilege:categorias.editar'
        )
        ->middlewareFor(
            'destroy',
            'privilege:categorias.eliminar'
        );


    /*
    |--------------------------------------------------------------------------
    | Proveedores
    |--------------------------------------------------------------------------
    */

    Route::resource('proveedores', ProveedorController::class)
        ->middlewareFor(
            ['index', 'show'],
            'privilege:proveedores.ver'
        )
        ->middlewareFor(
            ['create', 'store'],
            'privilege:proveedores.crear'
        )
        ->middlewareFor(
            ['edit', 'update'],
            'privilege:proveedores.editar'
        )
        ->middlewareFor(
            'destroy',
            'privilege:proveedores.eliminar'
        );


    /*
    |--------------------------------------------------------------------------
    | Clientes
    |--------------------------------------------------------------------------
    */

    Route::resource('clientes', ClienteController::class)
        ->middlewareFor(
            ['index', 'show'],
            'privilege:clientes.ver'
        )
        ->middlewareFor(
            ['create', 'store'],
            'privilege:clientes.crear'
        )
        ->middlewareFor(
            ['edit', 'update'],
            'privilege:clientes.editar'
        )
        ->middlewareFor(
            'destroy',
            'privilege:clientes.eliminar'
        );


    /*
    |--------------------------------------------------------------------------
    | Compras
    |--------------------------------------------------------------------------
    */

    Route::resource('compras', CompraController::class)
        ->middlewareFor(
            ['index', 'show'],
            'privilege:compras.ver'
        )
        ->middlewareFor(
            ['create', 'store'],
            'privilege:compras.crear'
        )
        ->middlewareFor(
            ['edit', 'update'],
            'privilege:compras.editar'
        )
        ->middlewareFor(
            'destroy',
            'privilege:compras.eliminar'
        );


    /*
    |--------------------------------------------------------------------------
    | Inventario
    |--------------------------------------------------------------------------
    */

    Route::resource('inventario', MovimientoInventarioController::class)
        ->only([
            'index',
            'create',
            'store',
            'show'
        ])
        ->middlewareFor(
            ['index', 'show'],
            'privilege:inventario.ver'
        )
        ->middlewareFor(
            ['create', 'store'],
            'privilege:inventario.movimientos'
        );


    /*
    |--------------------------------------------------------------------------
    | Ventas
    |--------------------------------------------------------------------------
    */

    Route::resource('ventas', VentaController::class)
        ->middlewareFor(
            ['index', 'show'],
            'privilege:ventas.ver'
        )
        ->middlewareFor(
            ['create', 'store'],
            'privilege:ventas.crear'
        )
        ->middlewareFor(
            ['edit', 'update'],
            'privilege:ventas.editar'
        )
        ->middlewareFor(
            'destroy',
            'privilege:ventas.eliminar'
        );


    /*
    |--------------------------------------------------------------------------
    | Facturas
    |--------------------------------------------------------------------------
    */

    Route::resource('facturas', FacturaController::class)
        ->only([
            'index',
            'show'
        ])
        ->middlewareFor(
            ['index', 'show'],
            'privilege:facturas.ver'
        );


    Route::get(
        'facturas/{id}/print',
        [FacturaController::class, 'print']
    )
        ->middleware('privilege:facturas.imprimir')
        ->name('facturas.print');


    /*
    |--------------------------------------------------------------------------
    | Usuarios
    |--------------------------------------------------------------------------
    */

    Route::resource('usuarios', UserController::class)
        ->middlewareFor(
            ['index', 'show'],
            'privilege:usuarios.ver'
        )
        ->middlewareFor(
            ['create', 'store'],
            'privilege:usuarios.crear'
        )
        ->middlewareFor(
            ['edit', 'update'],
            'privilege:usuarios.editar'
        )
        ->middlewareFor(
            'destroy',
            'privilege:usuarios.eliminar'
        );


    /*
    |--------------------------------------------------------------------------
    | Roles
    |--------------------------------------------------------------------------
    */

    Route::resource('roles', RoleController::class)
        ->middlewareFor(
            ['index', 'show'],
            'privilege:roles.ver'
        )
        ->middlewareFor(
            ['create', 'store'],
            'privilege:roles.crear'
        )
        ->middlewareFor(
            ['edit', 'update'],
            'privilege:roles.editar'
        )
        ->middlewareFor(
            'destroy',
            'privilege:roles.eliminar'
        );


    /*
    |--------------------------------------------------------------------------
    | Reportes
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/reportes/ventas',
        [ReporteController::class, 'ventas']
    )
        ->middleware('privilege:reportes.ventas')
        ->name('reportes.ventas');


    Route::get(
        '/reportes/ventas/imprimir',
        [ReporteController::class, 'imprimirVentas']
    )
        ->middleware('privilege:reportes.ventas')
        ->name('reportes.ventas.imprimir');


    Route::get(
        '/reportes/compras',
        [ReporteController::class, 'compras']
    )
        ->middleware('privilege:reportes.compras')
        ->name('reportes.compras');


    Route::get(
        '/reportes/compras/imprimir',
        [ReporteController::class, 'imprimirCompras']
    )
        ->middleware('privilege:reportes.compras')
        ->name('reportes.compras.imprimir');


    Route::get(
        '/reportes/inventario',
        [ReporteController::class, 'inventario']
    )
        ->middleware('privilege:reportes.inventario')
        ->name('reportes.inventario');


    Route::get(
        '/reportes/inventario/imprimir',
        [ReporteController::class, 'imprimirInventario']
    )
        ->middleware('privilege:reportes.inventario')
        ->name('reportes.inventario.imprimir');

});


/*
|--------------------------------------------------------------------------
| Perfil
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');


    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');


    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| Autenticación
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';