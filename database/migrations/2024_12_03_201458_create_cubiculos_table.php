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
        Schema::create('cubiculos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre'); // Nombre del cubículo
            $table->unsignedInteger('aforo')->nullable(); // Aforo del cubículo
            $table->text('descripcion')->nullable();
            $table->string('image_url')->nullable();
            $table->string('image_public_id')->nullable(); // Descripción opcional
            $table->boolean('disponible')->default(true); // Estado de disponibilidad
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cubiculos');
    }
};
