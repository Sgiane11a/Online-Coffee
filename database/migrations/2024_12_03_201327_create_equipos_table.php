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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del equipo
            $table->enum('type', ['computadora', 'laptop']); // Tipo: computadora o laptop
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->string('image_url')->nullable();
            $table->string('image_public_id')->nullable(); // Ruta de la imagen
            $table->boolean('disponible')->default(true); // Estado de disponibilidad
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
