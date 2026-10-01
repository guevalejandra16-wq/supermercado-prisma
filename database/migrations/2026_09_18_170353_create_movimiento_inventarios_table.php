<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('movimientos_inventario', function (Blueprint $table) {
            $table->id();

            $table->foreignId('producto_id')
                ->constrained('productos')
                ->cascadeOnDelete();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->string('tipo', 20);
            $table->integer('cantidad');
            $table->string('motivo', 255)->nullable();
            $table->string('referencia', 50)->nullable();
            $table->dateTime('fecha');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('movimientos_inventario');
    }
};