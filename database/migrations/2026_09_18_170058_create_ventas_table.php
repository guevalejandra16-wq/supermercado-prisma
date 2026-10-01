<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cliente_id')
                ->nullable()
                ->constrained('clientes')
                ->nullOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('numero_venta', 30)->unique();
            $table->dateTime('fecha');

            $table->decimal('subtotal', 10, 2);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('impuesto', 10, 2)->default(0);
            $table->decimal('total', 10, 2);

            $table->string('metodo_pago', 30);
            $table->decimal('efectivo_recibido', 10, 2)->default(0);
            $table->decimal('cambio', 10, 2)->default(0);

            $table->string('estado', 30)->default('COMPLETADA');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};