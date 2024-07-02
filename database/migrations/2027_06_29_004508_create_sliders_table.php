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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id('id');
            $table->string('titulo', 100);
            $table->text('descripcion')->nullable();
            $table->string('imagen_url', 255);
            $table->integer('orden')->default(0);
            $table->boolean('activo')->default(true);  // Nuevo campo estado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
