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
        Schema::create('sorteos', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_premio')->constrained('premios')->onDelete('cascade');
            $table->dateTime('fecha_sorteo');
            $table->string('estado', 50)->default('pendiente');  // Cambiado para indicar estado del sorteo
            $table->boolean('activo')->default(true);  // Nuevo campo estado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sorteos');
    }
};
