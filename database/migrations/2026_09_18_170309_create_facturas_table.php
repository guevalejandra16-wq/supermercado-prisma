<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('venta_id')
                ->unique()
                ->constrained('ventas')
                ->cascadeOnDelete();

            $table->string('numero_factura', 30)->unique();
            $table->dateTime('fecha');

            $table->decimal('subtotal', 10, 2);
            $table->decimal('descuento', 10, 2)->default(0);
            $table->decimal('impuesto', 10, 2)->default(0);
            $table->decimal('total', 10, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};