<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('codigo', 30)->unique();
        $table->string('nombre', 150);
        $table->text('descripcion')->nullable();

        $table->foreignId('categoria_id')
            ->constrained('categorias')
            ->cascadeOnDelete();

        $table->foreignId('proveedor_id')
            ->constrained('proveedores')
            ->cascadeOnDelete();

        $table->decimal('precio_compra', 10, 2);
        $table->decimal('precio_venta', 10, 2);
        $table->decimal('impuesto_porcentaje', 5, 2)->default(0);

        $table->integer('stock')->default(0);
        $table->integer('stock_minimo')->default(5);

        $table->date('fecha_vencimiento')->nullable();

        $table->boolean('estado')->default(true);
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('productos');
}
};
