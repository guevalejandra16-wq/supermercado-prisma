<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();

            $table->foreignId('proveedor_id')
                ->constrained('proveedores')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->dateTime('fecha');
            $table->string('numero_compra', 30)->unique();

            $table->decimal('subtotal', 10, 2);
            $table->decimal('impuesto', 10, 2)->default(0);
            $table->decimal('total', 10, 2);

            $table->string('estado', 30)->default('COMPLETADA');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};